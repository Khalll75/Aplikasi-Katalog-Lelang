<?php

namespace App\Http\Controllers;

use App\Models\Property;
use App\Models\PropertyMedia;
use App\Models\LelangSchedule;
use App\Models\PointOfInterest;
use App\Models\ContactPerson;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;

class PropertyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Eager-load all relationships for dashboard
        $properties = Property::with(['images', 'lelangSchedule', 'pointsOfInterest', 'contactPersons'])
            ->orderByDesc('id')
            ->paginate(10);

        // Get booklet data from JSON
        $booklet = $this->getBookletData();

        return view('Main-user.dashboard', compact('properties', 'booklet'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Property $property)
    {
        // Eager-load all relationships for detail page
        $property->load(['images', 'lelangSchedule', 'pointsOfInterest', 'contactPersons']);
        $address = $property->alamat;
        $gmapLink = 'https://www.google.com/maps?q=' . urlencode($address);
        return view('Main-user.propertiDetail', compact('property', 'address', 'gmapLink'));
    }

    /**
     * Get properties for API or AJAX requests
     */
    public function getProperties(Request $request)
    {
        $query = Property::with([
            'images',
            'lelangSchedule',
            'pointsOfInterest',
            'contactPersons'
        ]);

        // Apply filters if provided
        if ($request->filled('search')) {
            $search = $request->input('search');
            $query->where(function ($q) use ($search) {
                $q->where('alamat', 'like', "%{$search}%")
                  ->orWhere('kode_aset', 'like', "%{$search}%");
            });
        }

        if ($request->filled('kondisi')) {
            $query->where('kondisi', $request->input('kondisi'));
        }

        $properties = $query->paginate($request->input('per_page', 10));

        return response()->json($properties);
    }

    public function search(Request $request)
    {
        $query = Property::with(['images', 'lelangSchedule', 'pointsOfInterest', 'contactPersons']);

        // Kategori Lot
        if ($request->filled('kategori_lot')) {
            $query->where('kategori_lot', $request->kategori_lot);
        }

        // Keyword
        if ($request->filled('q')) {
            $q = $request->q;
            $query->where(function ($sub) use ($q) {
                $sub->where('alamat', 'like', "%{$q}%")
                    ->orWhere('kode_aset', 'like', "%{$q}%");
            });
        }

        // Harga
        if ($request->filled('harga_min')) {
            $query->whereHas('lelangSchedule', function ($q) use ($request) {
                $q->where('limit_lelang', '>=', $request->harga_min);
            });
        }
        if ($request->filled('harga_max')) {
            $query->whereHas('lelangSchedule', function ($q) use ($request) {
                $q->where('limit_lelang', '<=', $request->harga_max);
            });
        }

        // Luas Tanah
        if ($request->filled('luas_tanah_min')) {
            $query->where('luas_tanah', '>=', $request->luas_tanah_min);
        }
        if ($request->filled('luas_tanah_max')) {
            $query->where('luas_tanah', '<=', $request->luas_tanah_max);
        }

        // Luas Bangunan
        if ($request->filled('luas_bangunan_min')) {
            $query->where('luas_bangunan', '>=', $request->luas_bangunan_min);
        }
        if ($request->filled('luas_bangunan_max')) {
            $query->where('luas_bangunan', '<=', $request->luas_bangunan_max);
        }

        // Kamar Tidur
        if ($request->filled('kamar_tidur')) {
            $query->where('kamar_tidur', $request->kamar_tidur);
        }

        // Kamar Mandi
        if ($request->filled('kamar_mandi')) {
            $query->where('kamar_mandi', $request->kamar_mandi);
        }

        // Listrik
        if ($request->filled('listrik')) {
            $query->where('listrik', $request->listrik);
        }

        // Air
        if ($request->filled('air')) {
            $query->where('air', $request->air);
        }

        // Kota/Kabupaten
        if ($request->filled('kota')) {
            $query->where('alamat', 'like', '%' . $request->kota . '%');
        }

        // Kecamatan
        if ($request->filled('kecamatan')) {
            $query->where('alamat', 'like', '%' . $request->kecamatan . '%');
        }

        // Kondisi (array, match any)
        if ($request->filled('kondisi')) {
            $kondisiArr = $request->input('kondisi');
            $query->where(function ($q) use ($kondisiArr) {
                foreach ($kondisiArr as $kondisi) {
                    $q->orWhere('kondisi', 'like', '%' . $kondisi . '%');
                }
            });
        }

        $query = $query->orderByDesc('id')->paginate(12)->withQueryString();

        $kategori_lot = $request->kategori_lot;
        $search = $request->q;

        return view('Main-user.pencarianLelang', compact('query', 'kategori_lot', 'search'));
    }

    public function createStep1()
    {
        return view('admin.property-create-step1');
    }

    public function storeStep1(Request $request)
    {
        $validated = $request->validate([
            'kode_aset' => 'required|string|max:255|unique:properties',
            'alamat' => 'required|string',
            'luas_tanah' => 'nullable|numeric|min:0',
            'luas_bangunan' => 'nullable|numeric|min:0',
            'kamar_tidur' => 'nullable|integer|min:0',
            'kamar_mandi' => 'nullable|integer|min:0',
            'listrik' => 'nullable|string|max:255',
            'air' => 'nullable|string|max:255',
            'kondisi' => 'nullable',
            'kategori_lot' => 'nullable',
        ]);
        $validated['kondisi'] = implode('/', $validated['kondisi']);
        $property = Property::create($validated);
        return redirect()->route('admin.properties.createStep2', $property->id)
            ->with('success', 'Property created! Now add details.');
    }

    public function createStep2(Property $property)
    {
        return view('admin.property-create-step2', compact('property'));
    }

    public function storeStep2(Request $request, Property $property)
    {
        // Validate images
        $request->validate([
            'images.*' => 'nullable|file|mimes:jpeg,png,jpg,gif,mp4,mov,avi|max:10240', // 10MB max
            'main_image' => 'integer|min:0',
            'tanggal_lelang' => 'nullable|date',
            'lokasi_lelang' => 'nullable|string|max:255',
            'limit_lelang' => 'nullable|numeric|min:0',
        ], [
            'images.*.max' => 'Setiap file tidak boleh lebih dari 10MB.',
            'images.*.mimes' => 'Format file harus berupa: jpeg, png, jpg, gif, mp4, mov, atau avi.',
        ]);

        // Media - Upload to Cloudinary for consistency
        if ($request->hasFile('images')) {
            $mainImageIndex = $request->input('main_image', 0);
            foreach ($request->file('images') as $index => $file) {
                // Upload to Cloudinary using the correct method for v3.x
                $upload = Cloudinary::uploadApi()->upload($file->getRealPath(), [
                    'folder' => 'properti'
                ]);
                $secureUrl = $upload['secure_url'];
                $format = $upload['format'];
                $mediaType = in_array(strtolower($format), ['jpg', 'jpeg', 'png', 'gif']) ? 'image' : 'video';

                PropertyMedia::create([
                    'property_id' => $property->id,
                    'media_url' => $secureUrl,
                    'media_type' => $mediaType,
                    'format' => $format,
                    'is_main' => $index == $mainImageIndex
                ]);

                Log::info('Upload media Cloudinary', ['media' => $secureUrl, 'type' => $mediaType]);
            }
        }
        // Lelang Schedule
        if ($request->filled('tanggal_lelang') || $request->filled('lokasi_lelang') || $request->filled('limit_lelang')) {
            LelangSchedule::create([
                'property_id' => $property->id,
                'tanggal' => $request->input('tanggal_lelang'),
                'lokasi' => $request->input('lokasi_lelang'),
                'limit_lelang' => $request->input('limit_lelang'),
            ]);
        }
        // Points of Interest
        if ($request->filled('points_of_interest')) {
            foreach ($request->input('points_of_interest') as $point) {
                if (!empty($point)) {
                    PointOfInterest::create([
                        'property_id' => $property->id,
                        'poin' => $point,
                    ]);
                }
            }
        }
        // Contact Persons
        if ($request->filled('contact_persons')) {
            foreach ($request->input('contact_persons') as $contact) {
                if (!empty($contact['nama']) || !empty($contact['no_hp'])) {
                    ContactPerson::create([
                        'property_id' => $property->id,
                        'nama' => $contact['nama'] ?? null,
                        'no_hp' => $contact['no_hp'] ?? null,
                    ]);
                }
            }
        }
        return redirect()->route('dashboard')->with('success', 'All property details saved!');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Property $property)
    {
        Log::info('Request data', $request->all());
        // Validate the request
        $validatedData = $request->validate([
            'kode_aset' => 'required|string|max:255|unique:properties,kode_aset,' . $property->id,
            'alamat' => 'required|string',
            'luas_tanah' => 'nullable|numeric|min:0',
            'luas_bangunan' => 'nullable|numeric|min:0',
            'kamar_tidur' => 'nullable|integer|min:0',
            'kamar_mandi' => 'nullable|integer|min:0',
            'listrik' => 'nullable|string|max:255',
            'air' => 'nullable|string|max:255',
            'kondisi' => 'nullable',
            'kategori_lot' => 'nullable',

            // Media validation
            'images.*' => 'nullable|file|mimes:jpeg,png,jpg,gif,mp4,mov,avi|max:10240',
            'main_image' => 'nullable',
            'delete_images' => 'nullable|array',
            'delete_images.*' => 'integer|exists:property_media,id',

            // Lelang Schedule validation
            'tanggal_lelang' => 'nullable|date',
            'lokasi_lelang' => 'nullable|string|max:255',
            'limit_lelang' => 'nullable|numeric|min:0',

            // Points of Interest validation
            'points_of_interest.*' => 'nullable|string|max:500',
            'delete_points' => 'nullable|array',
            'delete_points.*' => 'integer|exists:points_of_interest,id',
            'points_of_interest_ids' => 'nullable|array',
            'points_of_interest_ids.*' => 'integer|exists:points_of_interest,id',

            // Contact Persons validation
            'contact_persons.*.nama' => 'nullable|string|max:255',
            'contact_persons.*.no_hp' => 'nullable|string|max:20',
            'delete_contacts' => 'nullable|array',
            'delete_contacts.*' => 'integer|exists:contact_persons,id',
            'contact_persons_ids' => 'nullable|array',
            'contact_persons_ids.*' => 'integer|exists:contact_persons,id',
        ]);

        try {
            DB::beginTransaction();

            // Update the property
            $property->update([
                'kode_aset' => $validatedData['kode_aset'],
                'alamat' => $validatedData['alamat'],
                'luas_tanah' => $validatedData['luas_tanah'] ?? null,
                'luas_bangunan' => $validatedData['luas_bangunan'] ?? null,
                'kamar_tidur' => $validatedData['kamar_tidur'] ?? null,
                'kamar_mandi' => $validatedData['kamar_mandi'] ?? null,
                'listrik' => $validatedData['listrik'] ?? null,
                'air' => $validatedData['air'] ?? null,
                'kondisi' => array_key_exists('kondisi', $validatedData)
                    ? (is_array($validatedData['kondisi']) ? implode('/', $validatedData['kondisi']) : $validatedData['kondisi'])
                    : null,
                'kategori_lot' => $validatedData['kategori_lot'],
            ]);

            // Handle image deletions
            if ($request->filled('delete_images')) {
                $imagesToDelete = PropertyMedia::whereIn('id', $request->input('delete_images'))->get();
                foreach ($imagesToDelete as $image) {
                    // Hapus dari Cloudinary jika media_url adalah URL Cloudinary
                    if (preg_match('/res\.cloudinary\.com/', $image->media_url)) {
                        // Ambil public_id dari URL Cloudinary
                        $publicId = basename(parse_url($image->media_url, PHP_URL_PATH));
                        $publicId = preg_replace('/\.[^.]+$/', '', $publicId); // hapus ekstensi
                        try {
                            Cloudinary::uploadApi()->destroy('properti/' . $publicId);
                        } catch (\Exception $e) {
                            Log::warning('Cloudinary delete failed', ['url' => $image->media_url, 'error' => $e->getMessage()]);
                        }
                    } else {
                        Storage::disk('public')->delete($image->media_url);
                    }
                    $image->delete();
                }
            }

            // Handle new media uploads (Cloudinary)
            if ($request->hasFile('images')) {
                $mainImageIndex = $request->input('main_image', 0);

                foreach ($request->file('images') as $index => $file) {
                    // Upload ke Cloudinary using the correct method for v3.x
                    $upload = Cloudinary::uploadApi()->upload($file->getRealPath(), [
                        'folder' => 'properti'
                    ]);
                    $secureUrl = $upload['secure_url'];
                    $format = $upload['format'];
                    $mediaType = in_array(strtolower($format), ['jpg', 'jpeg', 'png', 'gif']) ? 'image' : 'video';

                    PropertyMedia::create([
                        'property_id' => $property->id,
                        'media_url' => $secureUrl,
                        'media_type' => $mediaType,
                        'format' => $format,
                        'is_main' => $index == $mainImageIndex
                    ]);

                    Log::info('Upload media Cloudinary', ['media' => $secureUrl, 'type' => $mediaType]);
                }
            }

            // Update lelang schedule
            if ($request->filled('tanggal_lelang') || $request->filled('lokasi_lelang') || $request->filled('limit_lelang')) {
                $property->lelangSchedule()->updateOrCreate(
                    ['property_id' => $property->id],
                    [
                        'tanggal' => $request->input('tanggal_lelang'),
                        'lokasi' => $request->input('lokasi_lelang'),
                        'limit_lelang' => $request->input('limit_lelang'),
                    ]
                );
            } else {
                $property->lelangSchedule()->delete();
            }

            // Handle points of interest deletions
            if ($request->filled('delete_points')) {
                PointOfInterest::whereIn('id', $request->input('delete_points'))->delete();
            }

            // Update or create points of interest
            $poiIds = $request->input('points_of_interest_ids', []);
            $poiValues = $request->input('points_of_interest', []);
            foreach ($poiIds as $index => $id) {
                $poi = PointOfInterest::find($id);
                if ($poi && !empty($poiValues[$index])) {
                    $poi->update(['poin' => $poiValues[$index]]);
                }
            }
            // Handle new points (if any extra values without ID)
            if (count($poiValues) > count($poiIds)) {
                for ($i = count($poiIds); $i < count($poiValues); $i++) {
                    if (!empty($poiValues[$i])) {
                        PointOfInterest::create([
                            'property_id' => $property->id,
                            'poin' => $poiValues[$i],
                        ]);
                    }
                }
            }

            // Handle contact persons deletions
            if ($request->filled('delete_contacts')) {
                ContactPerson::whereIn('id', $request->input('delete_contacts'))->delete();
            }

            // Update or create contact persons
            $cpIds = $request->input('contact_persons_ids', []);
            $contactPersons = $request->input('contact_persons', []);
            foreach ($cpIds as $id) {
                if (empty($id) || !isset($contactPersons[$id])) continue; // <-- skip empty IDs
                $cp = ContactPerson::find($id);
                if ($cp) {
                    $cp->update([
                        'nama' => $contactPersons[$id]['nama'] ?? null,
                        'no_hp' => $contactPersons[$id]['no_hp'] ?? null,
                    ]);
                }
            }
            // Handle new contact persons (with key 'new' or 'newX')
            foreach ($contactPersons as $key => $contact) {
                if (strpos($key, 'new') === 0 && (!empty($contact['nama']) || !empty($contact['no_hp']))) {
                    ContactPerson::create([
                        'property_id' => $property->id,
                        'nama' => $contact['nama'] ?? null,
                        'no_hp' => $contact['no_hp'] ?? null,
                    ]);
                }
            }

            DB::commit();

        return redirect()->route('admin.lelang.index')
            ->with('success', 'Property updated successfully.');

        } catch (\Exception $e) {
            DB::rollback();
            Log::error('Update failed', ['exception' => $e]);

            return redirect()->back()
                ->withInput()
                ->with('error', 'Failed to update property: ' . $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Property $property)
    {
        try {
            DB::beginTransaction();

            // Delete associated media from storage
            foreach ($property->media as $media) {
                Storage::disk('public')->delete($media->media_url);
            }

            // Delete the property (cascade will handle related records)
        $property->delete();

            DB::commit();

        return redirect()->route('properties.index')
            ->with('success', 'Property deleted successfully.');

        } catch (\Exception $e) {
            DB::rollback();

            return redirect()->back()
                ->with('error', 'Failed to delete property: ' . $e->getMessage());
    }
}

    /**
     * Admin: Tampilkan daftar lelang beserta properti terkait
     */
    public function adminLelangIndex(Request $request)
    {
        $query = \App\Models\Property::query();

        if ($request->filled('q')) {
            $search = $request->q;
            $query->where(function($q2) use ($search) {
                $q2->where('kode_aset', 'like', "%{$search}%")
                    ->orWhere('kategori_lot', 'like', "%{$search}%")
                    ->orWhereHas('lelangSchedule', function($q3) use ($search) {
                        $q3->where('lokasi', 'like', "%{$search}%");
                    });
            });
        }

        $properties = $query->orderByDesc('id')->paginate(15)->appends($request->all());
        return view('admin.lelang-index', compact('properties'));
    }

    public function edit(Property $property)
    {
        // Fetch unique contact person names
        $contactPersonNames = \App\Models\ContactPerson::query()->distinct()->pluck('nama');
        // Fetch all contact persons (name + no_hp) for JS autocomplete
        $contactPersonData = \App\Models\ContactPerson::query()->select('nama', 'no_hp')->distinct()->get();
        // Fetch unique POIs
        $poiList = \App\Models\PointOfInterest::query()->distinct()->pluck('poin');
        // Fetch unique lokasi lelang
        $lokasiLelangList = \App\Models\LelangSchedule::query()->distinct()->pluck('lokasi');
        // tampilkan form edit property
        return view('admin.property-edit', compact('property', 'contactPersonNames', 'contactPersonData', 'poiList', 'lokasiLelangList'));
    }

    /**
     * Get booklet data from JSON file
     */
    private function getBookletData()
    {
        $filePath = storage_path('app/ctas/booklet.json');

        if (!file_exists($filePath)) {
            // Return default data if file doesn't exist
            return [
                'active' => true,
                'title' => '📚 Booklet Properti',
                'description' => 'Agustus 2025 - Klik untuk download',
                'url' => 'https://bit.ly/BOOKLET_PROPERTY_AGUSTUS_2025'
            ];
        }

        $json = file_get_contents($filePath);
        return json_decode($json, true) ?? [];
    }

    /**
     * Save booklet data to JSON file
     */
    private function saveBookletData($data)
    {
        $filePath = storage_path('app/ctas/booklet.json');
        $directory = dirname($filePath);

        if (!is_dir($directory)) {
            mkdir($directory, 0755, true);
        }

        return file_put_contents($filePath, json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
    }

    /**
     * Show booklet edit form (Admin)
     */
    public function editBooklet()
    {
        $booklet = $this->getBookletData();
        return view('admin.booklet-edit', compact('booklet'));
    }

    /**
     * Update booklet data (Admin)
     */
    public function updateBooklet(Request $request)
    {
        $validated = $request->validate([
            'active' => 'required|boolean',
            'title' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'url' => 'required|url|max:500',
        ]);

        $this->saveBookletData($validated);

        return redirect()->route('admin.booklet.edit')
            ->with('success', 'Booklet berhasil diperbarui!');
    }

}
