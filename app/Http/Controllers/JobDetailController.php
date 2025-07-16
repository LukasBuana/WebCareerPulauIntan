<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Job;           // Model Job Anda
use Carbon\Carbon;            // Untuk memformat tanggal (application_deadline)

class JobDetailController extends Controller
{
    /**
     * Menampilkan detail satu pekerjaan tertentu berdasarkan ID.
     *
     * @param  int  $id  ID pekerjaan yang akan ditampilkan.
     * @return \Illuminate\View\View|\Illuminate\Http\Response
     */
    public function show($id)
    {
        // 1. Mencari pekerjaan berdasarkan ID.
        //    Eager loading semua relasi yang mungkin dibutuhkan di halaman detail:
        //    'category', 'location', 'type', 'poster', 'requirements', 'benefits', 'skills'.
        $job = Job::with(['category', 'location', 'type', 'poster', 'requirements', 'benefits', 'skills'])->find($id);

        // 2. Memeriksa apakah pekerjaan ditemukan.
        if (!$job) {
            abort(404, 'Lowongan pekerjaan tidak ditemukan.');
        }

        // 3. Mengirimkan objek $job (yang sudah berisi semua data terkait) ke view Blade.
        return view('detail_lowongan', compact('job'));
    }
}