<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DaftarUser;

class DaftarUserController extends Controller
{
    public function store(Request $request)
    {
        // Support JSON body from fetch
        if ($request->isJson()) {
            $request->merge($request->json()->all());
        }
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
        ]);
        DaftarUser::create($validated);
        return response()->json(['success' => true, 'message' => 'Pendaftaran berhasil!']);
    }
}
