<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PropertyController;
use Illuminate\Support\Facades\Route;

Route::get('/admin', function () {
    return view('welcome');
});

// Public routes
Route::get('/', [PropertyController::class, 'index'])->name('home');
Route::get('/properties/{property}', [PropertyController::class, 'show'])->name('property.show');
Route::get('/search', [PropertyController::class, 'search'])->name('property.search');

// Admin routes
Route::get('/dashboard', function () {
    return view('AdminDashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth', 'verified'])->prefix('admin')->name('admin.')->group(function () {
    // Step-by-step property creation
    Route::get('properties/create-step1', [PropertyController::class, 'createStep1'])->name('properties.createStep1');
    Route::post('properties/store-step1', [PropertyController::class, 'storeStep1'])->name('properties.storeStep1');
    Route::get('properties/{property}/add-details', [PropertyController::class, 'createStep2'])->name('properties.createStep2');
    Route::post('properties/{property}/store-details', [PropertyController::class, 'storeStep2'])->name('properties.storeStep2');
    // ... resource routes jika perlu ...
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
