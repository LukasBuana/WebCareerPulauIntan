<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\SocialiteController;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\AdminJobController;
use App\Http\Controllers\Admin\AdminNewsController;
use App\Http\Controllers\Admin\AdminApplicantController;
use App\Models\Jobs\Job;
use App\Models\Jobs\JobLocation;
use App\Models\Jobs\JobCategory;
use App\Models\Jobs\JobType;
use App\Models\Jobs\Skill;
use App\Models\News;
use App\Http\Controllers\Job\JobDetailController;
use App\Http\Controllers\Job\JobListingController;
use App\Http\Controllers\News\NewsDetailController;
use App\Http\Controllers\News\NewsListingController;
use App\Http\Controllers\Applicants\ApplicantController;
use App\Http\Controllers\WordProcessorController;

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
    $educationLevels = Job::where('status', 'Published') // Hanya dari job yang Published
        ->distinct() // Ambil nilai yang unik saja
        ->pluck('education_level') // Ambil nilai dari kolom 'education_level'
        ->filter() // Hapus nilai null atau kosong
        ->sort() // Urutkan secara alfabetis
        ->toArray(); // Konversi ke array PHP
    // --- AKHIR PENGAMBILAN EDUCATION_LEVEL ---

    // --- CARA MENGAMBIL EXPERIENCE_LEVEL ---
    $experienceLevels = Job::where('status', 'Published') // Hanya dari job yang Published
        ->distinct() // Ambil nilai yang unik saja
        ->pluck('experience_level') // Ambil nilai dari kolom 'experience_level'
        ->filter() // Hapus nilai null atau kosong
        ->sort() // Urutkan secara alfabetis
        ->toArray(); // Konversi ke array PHP
    // --- AKHIR BAGIAN BARU ---

    // Kirim semua variabel ke view landing
    return view('beranda.landing', compact(
        'user',
        'jobs',
        'categories',
        'locations',
        'jobTypes',
        'educationLevels', // <<< TAMBAHKAN VARIABEL INI
        'experienceLevels', // <<< TAMBAHKAN VARIABEL INI
        'allUniqueTags',
        'newsArticles',
    ));
})->name('home');



Route::get('/detail_lowongan', function () {
    return view('beranda.detail_lowongan');
});
Route::get('/detail_lowongan/{job}', [JobDetailController::class, 'show'])->name('jobs.show_detail');

Route::get('/berita/{news}', action: [NewsDetailController::class, 'show'])->name('news.show_detail');

Route::get('/berita', action: [NewsListingController::class, 'index'])->name('news.index');


Route::get('/jobs', [JobListingController::class, 'index'])->name('jobs.index'); // <<< TAMBAHKAN INI














// Rute Dashboard
// Rute ini tetap ada dan dilindungi oleh middleware 'auth' dan 'verified'.
// Namun, karena kita akan mengatur HOME di RouteServiceProvider ke '/',
// rute ini tidak akan menjadi tujuan default setelah login.

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
require __DIR__ . '/auth.php';

Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {
    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('admin.index');

    // Resource routes for jobs (CRUD)
    // Ini akan otomatis membuat routes: index, create, store, show, edit, update, destroy
    Route::resource('jobs', AdminJobController::class)->names([
        'index' => 'admin.jobs.index',
        'create' => 'admin.jobs.create',
        'store' => 'admin.jobs.store',
        'show' => 'admin.jobs.show',
        'edit' => 'admin.jobs.edit',
        'update' => 'admin.jobs.update',
        'destroy' => 'admin.jobs.destroy',
    ]);
    Route::resource('news', AdminNewsController::class)->names([
        'index' => 'admin.news.index',
        'create' => 'admin.news.create',
        'store' => 'admin.news.store',
        'show' => 'admin.news.show',
        'edit' => 'admin.news.edit',
        'update' => 'admin.news.update',
        'destroy' => 'admin.news.destroy',
    ]);

    Route::resource('applicants', AdminApplicantController::class)->names([
        'index' => 'admin.applicants.index',
        'create' => 'admin.applicants.create',
        'store' => 'admin.applicants.store',
        'show' => 'admin.applicants.show',
        'edit' => 'admin.applicants.edit',
        'update' => 'admin.applicants.update',
        'destroy' => 'admin.applicants.destroy',
    ]);

});
// routes/web.php
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    // ...
    Route::get('applicants/{applicant}/print-word', [WordProcessorController::class, 'printApplicationWord'])->name('applicants.print_word');
});

Route::get('/tentang', function () {
    return view('/tentang');
})->name('tentang');






Route::get('/sidebar_user', function () {
    return view('applicant.sidebar_user');
});


Route::middleware(['auth'])->group(function () {
    // Menampilkan form biodata (tetap sama)
    Route::get('/dashboard', [ApplicantController::class, 'showMyBiodataForm'])->name('my_biodata.form');


    Route::post('/dashboard/save-section/{sectionName}', [ApplicantController::class, 'saveSectionData'])->name('my_biodata.save_section');

    // Jika perlu update per bagian juga, bisa pakai PUT, tapi POST cukup untuk save/update di sesi
    // Route::put('/dashboard/update-section/{sectionName}', [ApplicantController::class, 'saveSectionData'])->name('my_biodata.update_section');


    // Rute untuk FINAL submit form biodata (akan mengumpulkan semua data dari sesi/input form)
    // Ini adalah rute target dari <form id="biodataForm"> di Blade
    Route::post('/dashboard-final', [ApplicantController::class, 'storeMyBiodata'])->name('my_biodata.store_final');
    Route::put('/dashboard-final', [ApplicantController::class, 'updateMyBiodata'])->name('my_biodata.update_final'); // Jika mode update

});
