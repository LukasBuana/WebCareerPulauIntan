<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\SocialiteController;
use Illuminate\Support\Facades\Auth;

// Rute utama (landing page)
// Rute ini akan selalu menampilkan landing page dan bisa diakses oleh siapa saja.
// Data user akan dikirimkan ke view jika user sudah login.
Route::get('/', function () {
    $user = null; // Inisialisasi variabel user dengan null
    if (Auth::check()) {
        $user = Auth::user(); // Jika sudah login, ambil objek user
    }
    // Kirim variabel user ke view landing
    return view('beranda.landing', compact('user'));
})->name('home'); // Beri nama rute ini 'home' agar mudah direferensikan

// Rute Dashboard
// Rute ini tetap ada dan dilindungi oleh middleware 'auth' dan 'verified'.
// Namun, karena kita akan mengatur HOME di RouteServiceProvider ke '/',
// rute ini tidak akan menjadi tujuan default setelah login.
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Grup rute yang memerlukan autentikasi (misalnya halaman profil)
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Rute untuk Socialite (Google Login)
Route::get('/auth/google/redirect', [SocialiteController::class, 'redirect'])->name('google.redirect');
Route::get('/auth/google/callback', [SocialiteController::class, 'callback'])->name('google.callback');

// Menggunakan file rute autentikasi bawaan Laravel (dari Laravel Breeze/Jetstream)
require __DIR__.'/auth.php';

Route::get('/tentang', function () {
    return view('/tentang');
})->name('tentang');

