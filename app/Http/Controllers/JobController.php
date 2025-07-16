<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Job;           // Model Job Anda
use App\Models\JobCategory;   // Model untuk Kategori Pekerjaan
use App\Models\JobLocation;   // Model untuk Lokasi Pekerjaan
use App\Models\JobType;       // Model untuk Tipe Pekerjaan
use App\Models\Skill;        // Model untuk Skill (jika digunakan untuk tag)
// use App\Models\User; // Tidak perlu diimpor di sini jika hanya untuk 'poster' di Job model

class JobController extends Controller
{
    /**
     * Menampilkan daftar semua lowongan pekerjaan.
     * Menyediakan data untuk filter dan kategori.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        // 1. Mengambil semua data pekerjaan dari database.
        //    Eager loading relasi 'category', 'location', 'type', dan 'poster'.
        //    Juga 'skills' jika Anda ingin menampilkannya atau memfilter berdasarkan itu.
        //    Penting: Nama relasi di 'with()' harus sesuai dengan nama method di model Job.php
        $jobs = Job::with(['category', 'location', 'type', 'poster', 'skills'])->get();

        // 2. Mengambil semua kategori pekerjaan untuk dropdown filter dan kartu kategori.
        $categories = JobCategory::all();

        // 3. Mengambil semua lokasi pekerjaan untuk dropdown filter.
        $locations = JobLocation::all();

        // 4. Mengambil semua tipe pekerjaan untuk dropdown filter (misal: Full Time, Part Time).
        $jobTypes = JobType::all();

        // 5. Mengambil semua nama skill unik untuk filter tag (jika ada).
        $allUniqueTags = Skill::pluck('name')->unique()->values()->toArray();

        // 6. Mengambil level pengalaman dan pendidikan yang mungkin ada di database
        //    Atau definisikan secara statis jika ini adalah ENUM atau daftar tetap.
        //    Jika ini kolom string bebas, Anda mungkin perlu mengambil nilai unik dari kolom 'experience_level' dan 'education_level'
        //    dari tabel jobs itu sendiri, atau mendefinisikan secara statis.
        $experienceLevels = ['Fresh Graduate', 'Entry Level', 'Associate', 'Mid-Senior Level', 'Director']; // Contoh statis
        $educationLevels = ['SD', 'SMP', 'SMA/SMK', 'D3', 'S1', 'S2', 'S3']; // Contoh statis

        // 7. Mengirimkan semua data yang sudah diambil ke view Blade.
        return view('beranda.lowongan', compact('jobs', 'categories', 'locations', 'jobTypes', 'allUniqueTags', 'experienceLevels', 'educationLevels'));
    }

    /**
     * Menampilkan detail dari satu lowongan pekerjaan.
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */
    public function showDetail($id)
    {
        // Mengambil detail lowongan pekerjaan berdasarkan ID, dengan eager loading relasi yang relevan
        $job = Job::with(['category', 'location', 'type', 'poster', 'skills'])->findOrFail($id);

        // Mengirimkan data lowongan ke view detail_lowongan.blade.php
        return view('detail_lowongan', compact('job'));
    }
}