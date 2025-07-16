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
        $jobs = Job::with(['category', 'location', 'type', 'skills'])
                    ->where('status', 'Published')
                    ->latest()
                    ->get();

        $categories = JobCategory::orderBy('name')->get();
        $locations = JobLocation::orderBy('name')->get();
        $jobTypes = JobType::orderBy('name')->get();
        $allUniqueTags = Skill::orderBy('name')->pluck('name')->toArray();

        return view('beranda.detail_lowongan', compact(
            'jobs',
            'categories',
            'locations',
            'jobTypes',
            'allUniqueTags'
        ));
    }
}