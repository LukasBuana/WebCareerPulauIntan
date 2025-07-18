<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PhpOffice\PhpWord\TemplateProcessor;
use Illuminate\Support\Facades\Storage;
use App\Models\Applicants\Applicant; // Import model Applicant
use Carbon\Carbon; // Import Carbon untuk format tanggal
use Illuminate\Support\Str; // Add this for Str::endsWith

class WordProcessorController extends Controller
{
    // Ubah nama method menjadi lebih spesifik, dan terima Applicant ID
    public function printApplicationWord(Applicant $applicant) // Gunakan Route Model Binding
    {
        // Path ke template .docx Anda
        $templatePath = public_path('templates/testing1.docx'); // Pastikan nama file template sesuai

        // Pastikan template processor dapat memuat template
        try {
            $templateProcessor = new TemplateProcessor($templatePath);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Gagal memuat template Word: ' . $e->getMessage()], 500);
        }

        // --- Mengambil Data dari Model Applicant dan Relasinya ---
        // Load semua relasi yang diperlukan untuk mengisi template
        $applicant->load([
            'dependents', 'familyMembers', 'contactPersons', 'educationHistory',
            'organizationalExperience', 'trainingCourses', 'languages',
            'computerSkills', 'publications', 'workExperience', 'workAchievements',
            'healthDeclaration'
        ]);

        // Siapkan data untuk placeholder sederhana
        $dataToFill = [
            'full_name' => strtoupper($applicant->full_name ?? ''), // Ubah ke huruf besar jika perlu
            'jk' => $applicant->gender == 'L' ? 'Laki-laki' : ($applicant->gender == 'P' ? 'Perempuan' : ''),
            'place_birth' => strtoupper($applicant->place_of_birth ?? ''),
            'date_birth' => $applicant->date_of_birth ? Carbon::parse($applicant->date_of_birth)->format('d M Y') : '',
            'address_ktp' => strtoupper($applicant->permanent_address_ktp ?? ''),
            'address_now' => strtoupper($applicant->current_address ?? ''),
            'phone' => $applicant->mobile_phone_number ?? '', // Gunakan mobile_phone_number
            'email' => strtoupper($applicant->email_address ?? ''),
            'parents_address' => strtoupper($applicant->parents_address ?? ''),
            'religion' => strtoupper($applicant->religion ?? ''),
            'no_ktp' => $applicant->id_passport_number ?? '',
            'blood_type' => $applicant->blood_type ?? '',

            // Status Pernikahan (checkbox/radio logic)
            'c1' => ($applicant->marital_status == 'Belum menikah') ? 'X' : '',
            'c2' => ($applicant->marital_status == 'Menikah') ? 'X' : '',
            'married_since_date' => ($applicant->marital_status == 'Menikah' && $applicant->married_since_date) ? Carbon::parse($applicant->married_since_date)->format('d-m-Y') : '',
            'c3' => ($applicant->marital_status == 'Janda-Duda') ? 'X' : '',
            'deforce_since_date' => ($applicant->marital_status == 'Janda-Duda' && $applicant->widowed_since_date) ? Carbon::parse($applicant->widowed_since_date)->format('d-m-Y') : '',

            'bpjs_health' => $applicant->bpjs_health_number ?? '',
            'bpjs_work' => $applicant->bpjs_employment_number ?? '', // Asumsi ini adalah bpjs_employment_number
            'npwp' => $applicant->npwp_number ?? '',
            'sim' => $applicant->license_number ?? '',
            'sim_expired_date' => $applicant->license_expiry_date ? Carbon::parse($applicant->license_expiry_date)->format('d/m/Y') : '',
            'information' => strtoupper($applicant->job_vacancy_source ?? ''),
        ];

        // --- Isi Placeholder Sederhana ---
        foreach ($dataToFill as $key => $value) {
            $templateProcessor->setValue($key, $value);
        }

        // --- Handle Image (foto_profil) ---
        // Pastikan placeholder di Word adalah ${foto_profil}
        if ($applicant->profile_image) {
            // Decode base64 image
            $imageData = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $applicant->profile_image));
            $imageExtension = explode('/', explode(':', substr($applicant->profile_image, 0, strpos($applicant->profile_image, ';')))[1])[1];
            
            // Simpan gambar sementara
            $tempImagePath = tempnam(sys_get_temp_dir(), 'img_') . '.' . $imageExtension;
            file_put_contents($tempImagePath, $imageData);

            // Ganti placeholder dengan gambar
            // Sesuaikan ukuran dan posisi jika diperlukan.
            // Contoh: array('width' => 100, 'height' => 100, 'ratio' => true)
            $templateProcessor->setImageValue('foto_profil', array('path' => $tempImagePath, 'width' => 100, 'height' => 100, 'ratio' => true));

            // Hapus file sementara setelah digunakan
            unlink($tempImagePath);
        } else {
            // Jika tidak ada foto profil, hapus placeholder atau ganti dengan teks kosong
            $templateProcessor->setValue('foto_profil', ''); // Mengganti placeholder dengan string kosong
        }

        // --- Isi Cloning Blocks (Tabel Dinamis) ---
        // Contoh untuk family_members (Tanggungan)
        $dependentsData = $applicant->dependents->map(function($dep) {
            return [
                'family_relationship' => strtoupper($dep->relationship ?? ''),
                'family_name' => strtoupper($dep->name ?? ''),
                'family_gender' => $dep->gender == 'L' ? 'L' : ($dep->gender == 'P' ? 'P' : ''),
                'family_dob' => ($dep->place_of_birth ?? '') . ', ' . ($dep->date_of_birth ? Carbon::parse($dep->date_of_birth)->format('d M Y') : ''),
                'family_education' => strtoupper($dep->education ?? ''),
                'family_occupation' => strtoupper($dep->occupation ?? ''),
            ];
        })->toArray();

        if (!empty($dependentsData)) {
            // Pastikan placeholder block di Word Anda adalah 'dependents_block' atau nama lain yang Anda gunakan
            $templateProcessor->cloneBlock('dependent_row', count($dependentsData), true, false);
            $templateProcessor->cloneRowAndSetValues('dependent_row', $dependentsData);
        } else {
            $templateProcessor->deleteBlock('dependent_row'); // Hapus block jika tidak ada data
        }

        // --- Anda perlu mengulang logika cloning block ini untuk setiap relasi HasMany lainnya ---
        // Contoh:
        // - education_history
        // - organizational_experience
        // - training_courses
        // - languages
        // - computer_skills
        // - publications
        // - work_experience
        // - work_achievements

        // Contoh untuk education_history
        $educationHistoryData = $applicant->educationHistory->map(function($edu) {
            return [
                'edu_level' => strtoupper($edu->level_of_education ?? ''),
                'edu_institution' => strtoupper($edu->institution ?? ''),
                'edu_period' => ($edu->period_start_year ?? '') . '-' . ($edu->period_end_year ?? ''),
                'edu_major' => strtoupper($edu->major ?? ''),
                'edu_grade' => strtoupper($edu->grade ?? ''),
            ];
        })->toArray();

        if (!empty($educationHistoryData)) {
            $templateProcessor->cloneBlock('education_row', count($educationHistoryData), true, false);
            $templateProcessor->cloneRowAndSetValues('education_row', $educationHistoryData);
        } else {
            $templateProcessor->deleteBlock('education_row');
        }

        // ... Lanjutkan untuk semua section dinamis lainnya dengan logika serupa ...
        // Seperti familyMembers, contactPersons, organizationalExperience, trainingCourses, languages, computerSkills, publications, workExperience, workAchievements
        // Pastikan nama block di Word (.docx) sesuai dengan yang Anda gunakan di cloneBlock dan cloneRowAndSetValues

        // --- Simpan dan Berikan File Word ---
        $outputFileName = 'form_aplikasi_karyawan_' . Str::slug($applicant->full_name) . '_' . time() . '.docx';
        $outputPath = storage_path('app/public/' . $outputFileName);

        try {
            $templateProcessor->saveAs($outputPath);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Gagal menyimpan file Word: ' . $e->getMessage()], 500);
        }

        return response()->download($outputPath)->deleteFileAfterSend(true);
    }
}