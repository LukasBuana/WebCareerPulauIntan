<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\SocialiteController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\WordProcessorController; 

Route::get('/', function () {
    return view('auth/login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
    Route::get('/auth/google/redirect', [SocialiteController::class, 'redirect'])->name('google.redirect');
    Route::get('/auth/google/callback', [SocialiteController::class, 'callback'])->name('google.callback');

Route::get('/word', [WordProcessorController::class, 'generateApplicationWord'])->name('generate.application.word');

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminDashboardController::class, 'index'])->name('admin.index');
});




require __DIR__.'/auth.php';
