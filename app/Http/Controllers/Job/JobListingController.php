<?php

namespace App\Http\Controllers;

use App\Models\Job; // Import model Job
use App\Models\JobCategory; // Import model JobCategory
use App\Models\JobLocation; // Import model JobLocation
use App\Models\JobType; // Import model JobType
use App\Models\Skill; // Import model Skill (untuk tags jika diperlukan)
use Illuminate\Http\Request;

class JobListingController extends Controller
{
    public function index(Request $request)
    {
        // Mengambil semua lowongan pekerjaan dengan relasi yang diperlukan
        // Jika Anda ingin filter, Anda bisa tambahkan logika where() di sini
        $jobs = Job::with(['category', 'location', 'type', 'skills']) // Load relasi
                    ->where('status', 'Published') // Hanya tampilkan yang statusnya 'Published'
                    ->latest() // Urutkan berdasarkan yang terbaru
                    ->get();

        // Mengambil semua kategori untuk filter dropdown
        $categories = JobCategory::orderBy('name')->get();

        // Mengambil semua lokasi untuk filter dropdown
        $locations = JobLocation::orderBy('name')->get();

        // Mengambil semua tipe pekerjaan (Full-time, Part-time, Remote, WFO, WFH)
        $jobTypes = JobType::orderBy('name')->get();

        // Mengambil semua tags/skills unik dari semua pekerjaan
        // Ini mungkin lebih kompleks karena tags di frontend adalah string array
        // Anda bisa mengambilnya dari model Skill atau mengumpulkannya dari pekerjaan
        $allUniqueTags = Skill::orderBy('name')->pluck('name')->toArray();
        // Atau jika tags di job adalah bagian dari deskripsi, Anda perlu mengekstraknya di frontend JS

        // Mengirim data ke view
        return view('job_listings', compact(
            'jobs',
            'categories',
            'locations',
            'jobTypes',
            'allUniqueTags'
        ));
    }
}