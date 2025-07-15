<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Job; // Import model Job
use App\Models\JobCategory; // Import model JobCategory
use App\Models\JobLocation; // Import model JobLocation
use App\Models\JobType; // Import model JobType
use App\Models\Skill; // Import model Skill
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; // Untuk mendapatkan ID user yang memposting

class AdminJobController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Ambil semua data jobs dengan relasi yang diperlukan untuk ditampilkan
        $jobs = Job::with(['category', 'location', 'type', 'poster', 'skills'])
                     ->orderBy('created_at', 'desc')
                     ->paginate(10); // Gunakan paginate untuk pagination

        return view('admin.jobs.index', compact('jobs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Ambil data yang dibutuhkan untuk dropdown di form
        $categories = JobCategory::orderBy('name')->get();
        $locations = JobLocation::orderBy('name')->get();
        $jobTypes = JobType::orderBy('name')->get();
        $skills = Skill::orderBy('name')->get(); // Untuk daftar skill yang bisa dipilih

        return view('admin.jobs.create', compact('categories', 'locations', 'jobTypes', 'skills'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi data
        $request->validate([
            'title' => 'required|string|max:255',
            'job_category_id' => 'required|exists:job_categories,id',
            'job_location_id' => 'required|exists:job_locations,id',
            'job_type_id' => 'nullable|exists:job_types,id',
            'description' => 'required|string',
            'responsibilities' => 'nullable|string',
            'qualifications' => 'nullable|string',
            'min_salary' => 'nullable|numeric|min:0',
            'max_salary' => 'nullable|numeric|min:' . ($request->min_salary ?? 0) . '|gt:min_salary',
            'salary_currency' => 'nullable|string|max:10',
            'experience_level' => 'nullable|in:Entry Level,Junior,Mid,Senior,Lead,Manager',
            'education_level' => 'nullable|string|max:100',
            'application_deadline' => 'nullable|date|after_or_equal:today',
            'status' => 'required|in:Published,Draft,Closed,Archived',
            'is_featured' => 'boolean',
            'skills' => 'array', // Pastikan skills adalah array
            'skills.*' => 'exists:skills,id', // Setiap skill di array harus ada di tabel skills
        ], [
            'max_salary.gt' => 'Maximum salary must be greater than minimum salary.'
        ]);

        $job = Job::create([
            'title' => $request->title,
            'job_category_id' => $request->job_category_id,
            'job_location_id' => $request->job_location_id,
            'job_type_id' => $request->job_type_id,
            'description' => $request->description,
            'responsibilities' => $request->responsibilities,
            'qualifications' => $request->qualifications,
            'min_salary' => $request->min_salary,
            'max_salary' => $request->max_salary,
            'salary_currency' => $request->salary_currency,
            'experience_level' => $request->experience_level,
            'education_level' => $request->education_level,
            'application_deadline' => $request->application_deadline,
            'status' => $request->status,
            'is_featured' => $request->has('is_featured'), // Cek jika checkbox dicentang
            'posted_by_user_id' => Auth::id(), // ID user admin yang sedang login
        ]);

        // Sinkronkan skills untuk relasi many-to-many
        if ($request->has('skills')) {
            $job->skills()->sync($request->input('skills'));
        } else {
            $job->skills()->detach(); // Hapus semua skill jika tidak ada yang dipilih
        }


        return redirect()->route('admin.jobs.index')->with('message', 'Lowongan berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Job $job)
    {
        // Load relasi yang diperlukan jika belum di-load
        $job->load(['category', 'location', 'type', 'poster', 'requirements', 'benefits', 'skills']);
        return view('admin.jobs.show', compact('job'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Job $job)
    {
        $categories = JobCategory::orderBy('name')->get();
        $locations = JobLocation::orderBy('name')->get();
        $jobTypes = JobType::orderBy('name')->get();
        $skills = Skill::orderBy('name')->get();
        // Ambil skill_ids yang terkait dengan job ini untuk menandai di form
        $jobSkills = $job->skills->pluck('id')->toArray();

        return view('admin.jobs.edit', compact('job', 'categories', 'locations', 'jobTypes', 'skills', 'jobSkills'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Job $job)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'job_category_id' => 'required|exists:job_categories,id',
            'job_location_id' => 'required|exists:job_locations,id',
            'job_type_id' => 'nullable|exists:job_types,id',
            'description' => 'required|string',
            'responsibilities' => 'nullable|string',
            'qualifications' => 'nullable|string',
            'min_salary' => 'nullable|numeric|min:0',
            'max_salary' => 'nullable|numeric|min:' . ($request->min_salary ?? 0) . '|gt:min_salary',
            'salary_currency' => 'nullable|string|max:10',
            'experience_level' => 'nullable|in:Entry Level,Junior,Mid,Senior,Lead,Manager',
            'education_level' => 'nullable|string|max:100',
            'application_deadline' => 'nullable|date|after_or_equal:today',
            'status' => 'required|in:Published,Draft,Closed,Archived',
            'is_featured' => 'boolean',
            'skills' => 'array',
            'skills.*' => 'exists:skills,id',
        ], [
            'max_salary.gt' => 'Maximum salary must be greater than minimum salary.'
        ]);

        $job->update([
            'title' => $request->title,
            'job_category_id' => $request->job_category_id,
            'job_location_id' => $request->job_location_id,
            'job_type_id' => $request->job_type_id,
            'description' => $request->description,
            'responsibilities' => $request->responsibilities,
            'qualifications' => $request->qualifications,
            'min_salary' => $request->min_salary,
            'max_salary' => $request->max_salary,
            'salary_currency' => $request->salary_currency,
            'experience_level' => $request->experience_level,
            'education_level' => $request->education_level,
            'application_deadline' => $request->application_deadline,
            'status' => $request->status,
            'is_featured' => $request->has('is_featured'),
        ]);

        // Sinkronkan skills untuk relasi many-to-many
        if ($request->has('skills')) {
            $job->skills()->sync($request->input('skills'));
        } else {
            $job->skills()->detach(); // Hapus semua skill jika tidak ada yang dipilih
        }


        return redirect()->route('admin.jobs.index')->with('message', 'Lowongan berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Job $job)
    {
        $job->delete();
        return redirect()->route('admin.jobs.index')->with('message', 'Lowongan berhasil dihapus!');
    }
}