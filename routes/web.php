<?php

use Illuminate\Support\Facades\Route;

// Route::view('/', 'welcome');
Route::middleware('auth')->group(function () {
    Route::get('/', App\Livewire\Pages\Home::class)->name('index');
});

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__ . '/auth.php';
