<?php

namespace App\Http\Controllers;

use App\Models\Property;
use App\Models\PropertyImage;
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
        $query = $request->input('q');
        $properties = [];

        if ($query) {
            $properties = Property::where('nama', 'like', "%$query%")
                ->orWhere('alamat', 'like', "%$query%")
                ->get();
        }

        return view('Main-user.pencarianLelang', compact('properties', 'query'));
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
        // Images
        if ($request->hasFile('images')) {
            $mainImageIndex = $request->input('main_image', 0);
            foreach ($request->file('images') as $index => $image) {
                $imageName = time() . '_' . $index . '.' . $image->getClientOriginalExtension();
                $imagePath = $image->storeAs('property_images', $imageName, 'public');
                PropertyImage::create([
                    'property_id' => $property->id,
                    'image_url' => $imagePath,
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

            // Images validation
            'images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'main_image' => 'nullable|integer',
            'delete_images' => 'nullable|array',
            'delete_images.*' => 'integer|exists:property_images,id',

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
                $imagesToDelete = PropertyImage::whereIn('id', $request->input('delete_images'))->get();
                foreach ($imagesToDelete as $image) {
                    Storage::disk('public')->delete($image->image_url);
                    $image->delete();
                }
            }

            // Handle new image uploads
            if ($request->hasFile('images')) {
                $mainImageIndex = $request->input('main_image', 0);

                foreach ($request->file('images') as $index => $image) {
                    $imageName = time() . '_' . $index . '.' . $image->getClientOriginalExtension();
                    $imagePath = $image->storeAs('property_images', $imageName, 'public');

                    PropertyImage::create([
                        'property_id' => $property->id,
                        'image_url' => $imagePath,
                        'is_main' => $index == $mainImageIndex
                    ]);

                    Log::info('Upload gambar', ['image' => $imagePath]);
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

            // Delete associated images from storage
            foreach ($property->images as $image) {
                Storage::disk('public')->delete($image->image_url);
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
}
