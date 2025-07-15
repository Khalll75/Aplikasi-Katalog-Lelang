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

class PropertyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $properties = Property::with([
            'images',
            'lelangSchedule',
            'pointsOfInterest',
            'contactPersons'
        ])->paginate(10);

        return view('Main-user.dashboard', compact('properties'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Property $property)
    {
        $property->load([
            'images',
            'lelangSchedule',
            'pointsOfInterest',
            'contactPersons'
        ]);

        return view('Main-user.propertiDetail', compact('property'));
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
                $q->where('nama', 'like', "%{$search}%")
                  ->orWhere('alamat', 'like', "%{$search}%")
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
        $query = Property::with(['images', 'lelangSchedule']);

        // Kategori Lot
        if ($request->filled('kategori_lot')) {
            $query->where('kategori_lot', $request->kategori_lot);
        }

        // Keyword
        if ($request->filled('q')) {
            $q = $request->q;
            $query->where(function ($sub) use ($q) {
                $sub->where('nama', 'like', "%{$q}%")
                    ->orWhere('alamat', 'like', "%{$q}%")
                    ->orWhere('kode_aset', 'like', "%{$q}%");
            });
        }

        // Harga
        if ($request->filled('harga_min')) {
            $query->whereHas('lelangSchedule', function ($q) use ($request) {
                $q->where('harga_limit_akhir', '>=', $request->harga_min);
            });
        }
        if ($request->filled('harga_max')) {
            $query->whereHas('lelangSchedule', function ($q) use ($request) {
                $q->where('harga_limit_akhir', '<=', $request->harga_max);
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

        $query = $query->latest()->paginate(12)->withQueryString();

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
            'nama' => 'required|string|max:255',
            'alamat' => 'required|string',
            'luas_tanah' => 'required|numeric|min:0',
            'luas_bangunan' => 'nullable|numeric|min:0',
            'kamar_tidur' => 'nullable|integer|min:0',
            'kamar_mandi' => 'nullable|integer|min:0',
            'listrik' => 'nullable|string|max:255',
            'air' => 'nullable|string|max:255',
            'kondisi' => 'required|array',
            'kategori_lot' => 'required|string',
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
        // Media
        if ($request->hasFile('images')) {
            $mainImageIndex = $request->input('main_image', 0);
            foreach ($request->file('images') as $index => $file) {
                $fileName = time() . '_' . $index . '.' . $file->getClientOriginalExtension();
                $filePath = $file->storeAs('property_media', $fileName, 'public');

                // Determine media type based on file extension
                $extension = strtolower($file->getClientOriginalExtension());
                $mediaType = in_array($extension, ['jpg', 'jpeg', 'png', 'gif']) ? 'image' : 'video';

                PropertyMedia::create([
                    'property_id' => $property->id,
                    'media_url' => $filePath,
                    'media_type' => $mediaType,
                    'format' => $file->getClientOriginalExtension(),
                    'is_main' => $index == $mainImageIndex
                ]);
            }
        }
        // Lelang Schedule
        if ($request->filled('tanggal_lelang') || $request->filled('lokasi_lelang') || $request->filled('harga_limit_awal') || $request->filled('harga_limit_akhir')) {
            LelangSchedule::create([
                'property_id' => $property->id,
                'tanggal' => $request->input('tanggal_lelang'),
                'lokasi' => $request->input('lokasi_lelang'),
                'harga_limit_awal' => $request->input('harga_limit_awal'),
                'harga_limit_akhir' => $request->input('harga_limit_akhir'),
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
        // Validate the request
        $validatedData = $request->validate([
            'kode_aset' => 'required|string|max:255|unique:properties,kode_aset,' . $property->id,
            'nama' => 'required|string|max:255',
            'alamat' => 'required|string',
            'luas_tanah' => 'required|numeric|min:0',
            'luas_bangunan' => 'nullable|numeric|min:0',
            'kamar_tidur' => 'nullable|integer|min:0',
            'kamar_mandi' => 'nullable|integer|min:0',
            'listrik' => 'nullable|string|max:255',
            'air' => 'nullable|string|max:255',
            'kondisi' => 'required',
            'kategori_lot' => 'required|in:rumah,ruko,tanah',

            // Media validation
            'images.*' => 'nullable|file|mimes:jpeg,png,jpg,gif,mp4,mov,avi|max:10240',
            'main_image' => 'nullable|integer',
            'delete_images' => 'nullable|array',
            'delete_images.*' => 'integer|exists:property_media,id',

            // Lelang Schedule validation
            'tanggal_lelang' => 'nullable|date',
            'lokasi_lelang' => 'nullable|string|max:255',
            'harga_limit_awal' => 'nullable|numeric|min:0',
            'harga_limit_akhir' => 'nullable|numeric|min:0',

            // Points of Interest validation
            'points_of_interest.*' => 'nullable|string|max:500',
            'delete_points' => 'nullable|array',
            'delete_points.*' => 'integer|exists:point_of_interests,id',

            // Contact Persons validation
            'contact_persons.*.nama' => 'nullable|string|max:255',
            'contact_persons.*.no_hp' => 'nullable|string|max:20',
            'delete_contacts' => 'nullable|array',
            'delete_contacts.*' => 'integer|exists:contact_people,id',
        ]);

        try {
            DB::beginTransaction();

            // Update the property
            $property->update([
                'kode_aset' => $validatedData['kode_aset'],
                'nama' => $validatedData['nama'],
                'alamat' => $validatedData['alamat'],
                'luas_tanah' => $validatedData['luas_tanah'],
                'luas_bangunan' => $validatedData['luas_bangunan'] ?? null,
                'kamar_tidur' => $validatedData['kamar_tidur'] ?? null,
                'kamar_mandi' => $validatedData['kamar_mandi'] ?? null,
                'listrik' => $validatedData['listrik'] ?? null,
                'air' => $validatedData['air'] ?? null,
                'kondisi' => is_array($validatedData['kondisi']) ? implode('/', $validatedData['kondisi']) : $validatedData['kondisi'],
                'kategori_lot' => $validatedData['kategori_lot'],
            ]);

            // Handle image deletions
            if ($request->filled('delete_images')) {
                $imagesToDelete = PropertyMedia::whereIn('id', $request->input('delete_images'))->get();
                foreach ($imagesToDelete as $image) {
                    Storage::disk('public')->delete($image->media_url);
                    $image->delete();
                }
            }

            // Handle new media uploads
            if ($request->hasFile('images')) {
                $mainImageIndex = $request->input('main_image', 0);

                foreach ($request->file('images') as $index => $file) {
                    $fileName = time() . '_' . $index . '.' . $file->getClientOriginalExtension();
                    $filePath = $file->storeAs('property_media', $fileName, 'public');

                    // Determine media type based on file extension
                    $extension = strtolower($file->getClientOriginalExtension());
                    $mediaType = in_array($extension, ['jpg', 'jpeg', 'png', 'gif']) ? 'image' : 'video';

                    PropertyMedia::create([
                        'property_id' => $property->id,
                        'media_url' => $filePath,
                        'media_type' => $mediaType,
                        'format' => $file->getClientOriginalExtension(),
                        'is_main' => $index == $mainImageIndex
                    ]);

                    Log::info('Upload media', ['media' => $filePath, 'type' => $mediaType]);
                }
            }

            // Update lelang schedule
            if ($request->filled('tanggal_lelang') || $request->filled('lokasi_lelang') || $request->filled('harga_limit_awal') || $request->filled('harga_limit_akhir')) {
                $property->lelangSchedule()->updateOrCreate(
                    ['property_id' => $property->id],
                    [
                        'tanggal' => $request->input('tanggal_lelang'),
                        'lokasi' => $request->input('lokasi_lelang'),
                        'harga_limit_awal' => $request->input('harga_limit_awal'),
                        'harga_limit_akhir' => $request->input('harga_limit_akhir'),
                    ]
                );
            } else {
                $property->lelangSchedule()->delete();
            }

            // Handle points of interest deletions
            if ($request->filled('delete_points')) {
                PointOfInterest::whereIn('id', $request->input('delete_points'))->delete();
            }

            // Update points of interest
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

            // Handle contact persons deletions
            if ($request->filled('delete_contacts')) {
                ContactPerson::whereIn('id', $request->input('delete_contacts'))->delete();
            }

            // Update contact persons
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

            DB::commit();

        return redirect()->route('properties.index')
            ->with('success', 'Property updated successfully.');

        } catch (\Exception $e) {
            DB::rollback();

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
    public function adminLelangIndex()
    {
        $lelangs = \App\Models\LelangSchedule::with('property')->orderByDesc('tanggal')->paginate(15);
        return view('admin.lelang-index', compact('lelangs'));
    }

    public function edit(Property $property)
    {
        // tampilkan form edit property
        return view('admin.property-edit', compact('property'));
    }

}
