<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PropertyController;
use App\Http\Controllers\AdminUserVerificationController;
use Illuminate\Support\Facades\Route;

Route::get('/admin', function () {
    return view('welcome');
});

// Public routes
Route::get('/', [PropertyController::class, 'index'])->name('home');
Route::get('/properties/{property}', [PropertyController::class, 'show'])->name('properties.show');
Route::get('/search', [PropertyController::class, 'search'])->name('search');
Route::post('/daftar-user', [\App\Http\Controllers\DaftarUserController::class, 'store'])->name('daftar-user.store');

// Admin routes
Route::get('/dashboard', function () {
    $totalProperties = \App\Models\Property::count();
    $recentProperties = \App\Models\Property::with(['images'])
        ->orderByDesc('id')
        ->take(5)
        ->get();
    $recentActivities = collect();
    foreach($recentProperties as $index => $property) {
        $activityText = 'Properti "' . $property->kode_aset . '" tersedia';
        $timeText = $index === 0 ? 'Baru ditambahkan' : 'Tersedia';
        $recentActivities->push([
            'text' => $activityText,
            'time' => $timeText,
            'type' => 'created'
        ]);
    }
    return view('AdminDashboard', compact('totalProperties', 'recentActivities'));
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth', 'verified'])->prefix('admin')->name('admin.')->group(function () {
    // Step-by-step property creation
    Route::get('properties/create-step1', [PropertyController::class, 'createStep1'])->name('properties.createStep1');
    Route::post('properties/store-step1', [PropertyController::class, 'storeStep1'])->name('properties.storeStep1');
    Route::get('properties/{property}/add-details', [PropertyController::class, 'createStep2'])->name('properties.createStep2');
    Route::post('properties/{property}/store-details', [PropertyController::class, 'storeStep2'])->name('properties.storeStep2');
    Route::get('/users/unverified', [AdminUserVerificationController::class, 'index'])->name('users.unverified');
    Route::post('/users/verify/{id}', [AdminUserVerificationController::class, 'verify'])->name('users.verify');
    Route::get('/lelang', [PropertyController::class, 'adminLelangIndex'])->name('lelang.index');
    Route::get('properties/{property}/edit', [PropertyController::class, 'edit'])->name('properties.edit');
    Route::put('properties/{property}', [PropertyController::class, 'update'])->name('properties.update');
    Route::delete('properties/{property}', [PropertyController::class, 'destroy'])->name('properties.destroy');
    Route::get('/daftar-users', [\App\Http\Controllers\DaftarUserController::class, 'index'])->name('daftar-users');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
