<?php

namespace App\Http\Controllers\Job;
use App\Http\Controllers\Controller;

use App\Models\Jobs\Job; // Import model Job
use App\Models\Jobs\JobCategory; // Import model JobCategory
use App\Models\Jobs\JobLocation; // Import model JobLocation
use App\Models\Jobs\JobType; // Import model JobType
use App\Models\Jobs\Skill; // Import model Skill (untuk tags jika diperlukan)
use Illuminate\Http\Request;

class JobListingController extends Controller
{
    public function index(Request $request)
    {
        $jobsQuery = Job::with(['category', 'location', 'type', 'poster', 'skills'])
                        ->where('status', 'Published');

        // Filter berdasarkan kata kunci
        if ($request->filled('keyword')) {
            $keyword = $request->input('keyword');
            $jobsQuery->where(function($query) use ($keyword) {
                $query->where('title', 'like', '%' . $keyword . '%')
                      ->orWhere('description', 'like', '%' . $keyword . '%')
                      ->orWhere('responsibilities', 'like', '%' . $keyword . '%')
                      ->orWhere('qualifications', 'like', '%' . $keyword . '%')
                      ->orWhereHas('skills', function($q) use ($keyword) {
                          $q->where('name', 'like', '%' . $keyword . '%');
                      })
                      ->orWhereHas('poster', function($q) use ($keyword) {
                          $q->where('name', 'like', '%' . $keyword . '%');
                      });
            });
        }

        // Filter berdasarkan kategori
        if ($request->filled('category')) {
            $categoryName = $request->input('category');
            $jobsQuery->whereHas('category', function($q) use ($categoryName) {
                $q->where('name', $categoryName);
            });
        }

        // Filter berdasarkan lokasi
        if ($request->filled('location')) {
            $locationName = $request->input('location');
            $jobsQuery->whereHas('location', function($q) use ($locationName) {
                $q->where('name', $locationName);
            });
        }

        // Filter berdasarkan pendidikan
        if ($request->filled('education')) {
            $educationLevel = $request->input('education');
            $jobsQuery->where('education_level', $educationLevel);
        }

        // Filter berdasarkan pengalaman
        if ($request->filled('experience')) {
            $experienceLevel = $request->input('experience');
            $jobsQuery->where('experience_level', $experienceLevel);
        }

        // Filter berdasarkan tipe pekerjaan (jika ada dropdown tipe di frontend)
        if ($request->filled('type')) {
            $typeName = $request->input('type');
            $jobsQuery->whereHas('type', function($q) use ($typeName) {
                $q->where('name', $typeName);
            });
        }

        // Filter berdasarkan tag (jika ada filter tag di frontend)
        if ($request->filled('tag')) {
            $tagName = $request->input('tag');
            $jobsQuery->whereHas('skills', function($q) use ($tagName) {
                $q->where('name', $tagName);
            });
        }

        $jobs = $jobsQuery->latest()->get(); // Ambil hasil akhir lowongan yang sudah difilter

        // Data untuk dropdown filter di halaman job.blade.php
        $categories = JobCategory::orderBy('name')->get();
        $locations = JobLocation::orderBy('name')->get();
        $jobTypes = JobType::orderBy('name')->get();
        $educationLevels = Job::where('status', 'Published')->distinct()->pluck('education_level')->filter()->sort()->toArray();
        $experienceLevels = Job::where('status', 'Published')->distinct()->pluck('experience_level')->filter()->sort()->toArray();
        $allUniqueTags = Skill::orderBy('name')->pluck('name')->toArray();

        return view('jobs.index', compact(
            'jobs',
            'categories',
            'locations',
            'jobTypes',
            'educationLevels',
            'experienceLevels',
            'allUniqueTags',
            'request' // Penting: Kirim objek request ke view untuk mengisi kembali filter UI
        ));
    }
}