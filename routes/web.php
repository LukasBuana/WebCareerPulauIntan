<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\SocialiteController;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\AdminJobController; 
use App\Http\Controllers\Admin\AdminNewsController;
use App\Models\Jobs\Job;
use App\Models\Jobs\JobLocation;
use App\Models\Jobs\JobCategory;
use App\Models\Jobs\JobType;
use App\Models\Jobs\Skill;
use App\Models\News;
use App\Http\Controllers\Job\JobDetailController;
use App\Http\Controllers\Job\JobListingController; 
use App\Http\Controllers\News\NewsDetailController;

use Illuminate\Support\Facades\Auth;

// Rute utama (landing page)
// Rute ini akan selalu menampilkan landing page dan bisa diakses oleh siapa saja.
// Data user akan dikirimkan ke view jika user sudah login.
Route::get('/', function () {
    $user = null; // Inisialisasi variabel user dengan null
    if (Auth::check()) {
        $user = Auth::user(); // Jika sudah login, ambil objek user
        
    }

    // --- BAGIAN BARU: Ambil data untuk jobs ---
    $jobs = Job::with(['category', 'location', 'type', 'skills'])
                ->where('status', 'Published')
                ->latest()
                ->get();

    $categories = JobCategory::orderBy('name')->get();
    $locations = JobLocation::orderBy('name')->get();
    $jobTypes = JobType::orderBy('name')->get();
    $allUniqueTags = Skill::orderBy('name')->pluck('name')->toArray();
    $newsArticles = News::latest()->limit(3)->get(); // Ambil 3 berita terbaru

    // --- AKHIR BAGIAN BARU ---

    // Kirim semua variabel ke view landing
    return view('beranda.landing', compact(
        'user',
        'jobs',
        'categories',
        'locations',
        'jobTypes',
        'allUniqueTags',
        'newsArticles',
    ));
})->name('home');



Route::get('/detail_lowongan', function () {
    return view('beranda.detail_lowongan');
});
Route::get('/detail_lowongan/{job}', [JobDetailController::class, 'show'])->name('jobs.show_detail');

Route::get('/berita/{news}', [NewsDetailController::class, 'show'])->name('news.show_detail');

Route::get('/jobs', [JobListingController::class, 'index'])->name('jobs.index'); // <<< TAMBAHKAN INI














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
    Route::get('/auth/google/redirect', [SocialiteController::class, 'redirect'])->name('google.redirect');
    Route::get('/auth/google/callback', [SocialiteController::class, 'callback'])->name('google.callback');

// Rute untuk Socialite (Google Login)
Route::get('/auth/google/redirect', [SocialiteController::class, 'redirect'])->name('google.redirect');
Route::get('/auth/google/callback', [SocialiteController::class, 'callback'])->name('google.callback');

// Menggunakan file rute autentikasi bawaan Laravel (dari Laravel Breeze/Jetstream)
require __DIR__.'/auth.php';

Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {
    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('admin.index');

    // Resource routes for jobs (CRUD)
    // Ini akan otomatis membuat routes: index, create, store, show, edit, update, destroy
    Route::resource('jobs', AdminJobController::class)->names([
        'index'   => 'admin.jobs.index',
        'create'  => 'admin.jobs.create',
        'store'   => 'admin.jobs.store',
        'show'    => 'admin.jobs.show',
        'edit'    => 'admin.jobs.edit',
        'update'  => 'admin.jobs.update',
        'destroy' => 'admin.jobs.destroy',
    ]);
    Route::resource('news', AdminNewsController::class)->names([
        'index'   => 'admin.news.index',
        'create'  => 'admin.news.create',
        'store'   => 'admin.news.store',
        'show'    => 'admin.news.show',
        'edit'    => 'admin.news.edit',
        'update'  => 'admin.news.update',
        'destroy' => 'admin.news.destroy',
    ]);
});

Route::get('/tentang', function () {
    return view('/tentang');
})->name('tentang');






Route::get('/sidebar_user', function () {
    return view('applicant.sidebar_user');
});


Route::get('/index', function () {
    return view('applicant.profile.index');
});

