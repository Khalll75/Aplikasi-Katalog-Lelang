<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

class AdminUserVerificationController extends Controller
{
    public function index()
    {
        $users = User::where('is_verified', false)->get();
        return view('admin.unverified-users', compact('users'));
    }

    public function verify($id): RedirectResponse
    {
        $user = User::findOrFail($id);
        $user->is_verified = true;
        $user->save();
        return redirect()->route('admin.users.unverified')->with('success', 'User berhasil diverifikasi!');
    }
}
