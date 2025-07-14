<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PhpOffice\PhpWord\TemplateProcessor;
use Illuminate\Support\Facades\Storage; // Untuk menyimpan file sementara

class WordProcessorController extends Controller
{
    public function generateApplicationWord()
    {
        // Path ke template .docx Anda
        $templatePath = public_path('/templates/tes.docx');

        // Pastikan template processor dapat memuat template
        try {
            $templateProcessor = new TemplateProcessor($templatePath);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Gagal memuat template Word: ' . $e->getMessage()], 500);
        }

        // --- Data Dummy (Ganti dengan data dari database atau Request) ---
        $formData = [
            'full_name' => 'BUDI SANTOSO',
            'place_date_of_birth' => 'JAKARTA, 12 DESEMBER 1990',
            'address_ktp' => 'JL. MERDEKA NO. 45, RT 01 RW 02, JAKARTA PUSAT, 10110',
            'address_now' => 'JL. KEBON JERUK NO. 10, RT 03 RW 05, JAKARTA BARAT, 11530asssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssss',
            'phone' => '0812-3456-7890',
            'email' => 'BUDI.SANTOSO@EXAMPLE.COM',
            'parents_address' => 'JL. PAHLAWAN NO. 7, SURABAYA, 60271',
            'religion' => 'ISLAM',
            'no_ktp' => '3174xxxxxxxxxxxx',
            'blood_type' => 'O',

            // Untuk status pernikahan, Anda bisa menggunakan logika if/else di sini
            // dan mengisi placeholder sesuai pilihan
            'c1' => 'X', // Centang jika single
            'c2' => '', // Biarkan kosong jika tidak
            'married_since_date' => '01-01-2015',
            'c3' => '', // Biarkan kosong jika tidak
            'deforce_since_date' => '01-01-2020',

            'health' => '0001234567890',
            'work' => 'AKTIF',
            'sim' => '1234567890',
            'sim_expired_date' => '31/12/2030', // Atau pisahkan jadi D, M, Y
            'npwp' => '12.345.678.9-000.123',
            'information' => 'WEBSITE PERUSAHAAN',

            // // Contoh data untuk cloning blocks (tabel)
            // 'family_members_data' => [
            //     ['family_relationship' => 'Suami / Istri (Spouse)', 'family_name' => 'SITI AMINAH', 'family_gender' => 'P', 'family_dob' => 'BANDUNG, 01 JANUARI 1992', 'family_education' => 'S1', 'family_occupation' => 'KARYAWAN SWASTA'],
            //     ['family_relationship' => 'Anak ke 1 (Children)', 'family_name' => 'AHMAD', 'family_gender' => 'L', 'family_dob' => 'JAKARTA, 05 MARET 2018', 'family_education' => 'TK', 'family_occupation' => 'PELAJAR'],
            //     ['family_relationship' => 'Anak ke 2 (Children)', 'family_name' => 'FATIMAH', 'family_gender' => 'P', 'family_dob' => 'JAKARTA, 10 SEPTEMBER 2020', 'family_education' => 'PAUD', 'family_occupation' => 'BALITA'],
            // ],
            // // ... tambahkan data untuk tabel lain seperti 'educational_background_data', 'working_experience_data', dll.
            // 'emergency_contact_name' => 'ANI WIJAYA',
            // 'emergency_contact_address' => 'JL. MELATI NO. 22, JAKARTA SELATAN, 12780',
            // 'emergency_contact_phone' => '0878-1122-3344',
            // 'emergency_contact_relationship' => 'KAKAK',
            
            // // Contoh untuk pertanyaan Ya/Tidak (bagian X. Lain-lain)
            // // Asumsi placeholder di Word: ${q1_answer}, ${q1_explanation}
            // 'q1_answer' => 'TIDAK', // Isi dengan YA atau TIDAK
            // 'q1_explanation' => '',
            // 'q2_answer' => 'YA',
            // 'q2_explanation' => 'PT MAKMUR JAYA, SEBAGAI PROJECT COORDINATOR',
            // // ... dan seterusnya untuk semua pertanyaan
        ];

        // --- Isi Placeholder Sederhana ---
        foreach ($formData as $key => $value) {
            // Hindari mengisi array secara langsung sebagai placeholder
            if (!is_array($value)) {
                $templateProcessor->setValue($key, $value);
            }
        }

        // // --- Isi Cloning Blocks (Tabel Dinamis) ---
        // // Untuk family_members_data
        // if (!empty($formData['family_members_data'])) {
        //     $templateProcessor->cloneBlock('family_member', 0, true, false); // Kloning block, hapus yang kosong jika 0
        //     $templateProcessor->cloneRowAndSetValues('family_member', $formData['family_members_data']);
        // } else {
        //     // Jika tidak ada data, hapus block agar tidak muncul placeholder kosong
        //     $templateProcessor->deleteBlock('family_member');
        // }

        // Anda akan mengulang logika ini untuk setiap tabel yang memiliki cloning blocks:
        // - educational_background_data
        // - organizational_experience_data
        // - training_courses_data
        // - languages_data
        // - contact_persons_data
        // - working_experience_data
        // - achievements_data

        // Contoh untuk tabel Pendidikan:
        /*
        $educationalBackgroundData = [
            ['edu_level' => 'Universitas', 'edu_institution' => 'UNIVERSITAS INDONESIA', 'edu_period' => '2008-2012', 'edu_major' => 'TEKNIK SIPIL', 'edu_grade' => '3.50'],
            ['edu_level' => 'Sekolah Menengah Atas', 'edu_institution' => 'SMA NEGERI 1 JAKARTA', 'edu_period' => '2005-2008', 'edu_major' => 'IPA', 'edu_grade' => '8.8'],
        ];
        if (!empty($educationalBackgroundData)) {
            $templateProcessor->cloneBlock('education_block', 0, true, false);
            $templateProcessor->cloneRowAndSetValues('education_block', $educationalBackgroundData);
        } else {
            $templateProcessor->deleteBlock('education_block');
        }
        */

        // --- Simpan dan Berikan File Word ---
        $outputFileName = 'form_aplikasi_karyawan_terisi_' . time() . '.docx';
        $outputPath = storage_path('app/public/' . $outputFileName);

        try {
            $templateProcessor->saveAs($outputPath);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Gagal menyimpan file Word: ' . $e->getMessage()], 500);
        }

        return response()->download($outputPath)->deleteFileAfterSend(true);
    }
}