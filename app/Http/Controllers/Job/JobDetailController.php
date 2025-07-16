<?php

namespace App\Http\Controllers\Job;
use App\Http\Controllers\Controller;

use App\Models\Jobs\Job; // Import model Job
use Illuminate\Http\Request;
use Carbon\Carbon; // Untuk memformat tanggal

class JobDetailController extends Controller
{
    /**
     * Display the specified job details.
     *
     * @param  \App\Models\Jobs\Job  $job
     * @return \Illuminate\View\View
     */
    public function show(Job $job)
    {
        // Memuat semua relasi yang diperlukan untuk tampilan detail
        $job->load([
            'category',
            'location',
            'type',
            'poster', // User yang memposting
            'requirements', // Persyaratan pekerjaan (hasMany)
            'benefits',     // Manfaat pekerjaan (hasMany)
            'skills'        // Keterampilan yang dibutuhkan (belongsToMany)
        ]);

        // Opsional: Tingkatkan jumlah views_count setiap kali lowongan dilihat
        $job->increment('views_count');

        return view('beranda.detail_lowongan', compact('job'));
    }
}