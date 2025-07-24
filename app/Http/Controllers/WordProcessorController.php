<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PhpOffice\PhpWord\TemplateProcessor;
use Illuminate\Support\Facades\Storage;
use App\Models\Applicants\Applicant;
use Carbon\Carbon;
use Illuminate\Support\Str;
use PhpOffice\PhpWord\Element\TextRun; // Pastikan ini di-import

class WordProcessorController extends Controller
{
    public function printApplicationWord(Applicant $applicant)
    {
        $templatePath = public_path('templates/testing8.docx');

        try {
            $templateProcessor = new TemplateProcessor($templatePath);
        } catch (\Exception $e) {
            \Log::error('Gagal memuat template Word: ' . $e->getMessage());
            return back()->with('error', 'Terjadi kesalahan saat memuat template dokumen. Silakan coba lagi nanti.');
        }

        $applicant->load([
            'dependents',
            'familyMembers',
            'contactPersons',
            'educationHistory',
            'organizationalExperience',
            'trainingCourses',
            'languages',
            'computerSkills',
            'publications',
            'workExperience',
            'workAchievements',
            'healthDeclaration'
        ]);

        $dataToFill = [
            'full_name' => strtoupper($applicant->full_name ?? ''),
            'jk' => $applicant->gender == 'L' ? 'L' : ($applicant->gender == 'P' ? 'P' : ''),
            'place_birth' => strtoupper($applicant->place_of_birth ?? ''),
            'date_birth' => $applicant->date_of_birth ? Carbon::parse($applicant->date_of_birth)->format('d M Y') : '',
            'address_ktp' => strtoupper($applicant->permanent_address_ktp ?? ''),
            'address_now' => strtoupper($applicant->current_address ?? ''),
            'phone' => $applicant->mobile_phone_number ?? '',
            'email' => str($applicant->email_address ?? ''),
            'parents_address' => strtoupper($applicant->parents_address ?? ''),
            'religion' => strtoupper($applicant->religion ?? ''),
            'no_ktp' => $applicant->id_passport_number ?? '',
            'blood_type' => $applicant->blood_type ?? '',

            'c1' => ($applicant->marital_status == 'Belum menikah') ? '✓' : '',
            'c2' => ($applicant->marital_status == 'Menikah') ? '✓' : '',
            'married_since_date' => ($applicant->marital_status == 'Menikah' && $applicant->married_since_date) ? Carbon::parse($applicant->married_since_date)->format('d-m-Y') : '',
            'c3' => ($applicant->marital_status == 'Janda-Duda') ? '✓' : '',
            'deforce_since_date' => ($applicant->marital_status == 'Janda-Duda' && $applicant->widowed_since_date) ? Carbon::parse($applicant->widowed_since_date)->format('d-m-Y') : '',

            'bpjs_health' => $applicant->bpjs_health_number ?? '',
            'bpjs_work' => $applicant->bpjs_employment_number ?? '',
            'npwp' => $applicant->npwp_number ?? '',
            'sim' => $applicant->license_number ?? '',
            'sim_expired_date' => $applicant->license_expiry_date ? Carbon::parse($applicant->license_expiry_date)->format('d/m/Y') : '',
            'information' => strtoupper($applicant->job_vacancy_source ?? ''),

            'emercontact' => strtoupper($applicant->emergency_contact_name ?? ''),
            'emerrelation' => strtoupper($applicant->emergency_contact_relationship ?? ''),
            'emeraddress_contact' => strtoupper($applicant->emergency_contact_address ?? ''),
            'emerphone_contact' => $applicant->emergency_contact_phone ?? '',
        ];

        foreach ($dataToFill as $key => $value) {
            $templateProcessor->setValue($key, $value);
        }

        if ($applicant->profile_image) { // $applicant->profile_image now holds the file path
            try {
                // Get the full path to the image in local storage
                // The 'public' disk root is typically storage_path('app/public')
                $fullLocalPath = Storage::disk('public')->path($applicant->profile_image);

                // Check if the file actually exists on disk before trying to use it
                if (!file_exists($fullLocalPath)) {
                    throw new \Exception("Profile image file not found on disk: " . $fullLocalPath);
                }

                $templateProcessor->setImageValue('foto_profil', [
                    'path' => $fullLocalPath,
                    'width' => 105,
                    'height' => 120,
                    'ratio' => true
                ]);
                // No need to unlink $tempImagePath as we are using the original stored file
            } catch (\Exception $e) {
                \Log::warning('Failed to process profile image for applicant ' . ($applicant->id ?? 'N/A') . ': ' . $e->getMessage());
                // If there's an error (e.g., file not found), set the placeholder text
                $templateProcessor->setValue('foto_profil', 'Tidak ada foto');
            }
        } else {
            // If $applicant->profile_image is null or empty, set placeholder text
            $templateProcessor->setValue('foto_profil', 'Tidak ada foto');
        }

        // --- Isi Fixed Rows for Dependent Data (Spouse and Children) ---
        // Spouse
        $spouse = $applicant->dependents->firstWhere(function ($dep) {
            return ($dep->relationship === 'Suami/Istri');
        });

        $templateProcessor->setValue('couple', strtoupper($spouse?->name ?? ''));
        $templateProcessor->setValue('jkt', ($spouse?->gender ?? '') == 'L' ? 'L' : (($spouse?->gender ?? '') == 'P' ? 'P' : ''));
        // Modified pdob for spouse
        $spousePlaceOfBirth = $spouse?->place_of_birth ?? '';
        $spouseDateOfBirth = $spouse?->date_of_birth;
        $formattedSpouseDate = $spouseDateOfBirth ? Carbon::parse($spouseDateOfBirth)->format('d M Y') : '';
        $spousePdobOutput = '';
        if (!empty($spousePlaceOfBirth) && !empty($formattedSpouseDate)) {
            $spousePdobOutput = $spousePlaceOfBirth . ', ' . $formattedSpouseDate;
        } elseif (!empty($spousePlaceOfBirth)) {
            $spousePdobOutput = $spousePlaceOfBirth;
        } elseif (!empty($formattedSpouseDate)) {
            $spousePdobOutput = $formattedSpouseDate;
        }
        $templateProcessor->setValue('pdob', strtoupper($spousePdobOutput));

        $templateProcessor->setValue('edu', strtoupper($spouse?->education ?? ''));
        $templateProcessor->setValue('work', strtoupper($spouse?->occupation ?? ''));

        // Children (Directly mapping to Anak1, Anak2, Anak3, Anak4 relationships)
        $child1 = $applicant->dependents->firstWhere('relationship', 'Anak1');
        $child2 = $applicant->dependents->firstWhere('relationship', 'Anak2');
        $child3 = $applicant->dependents->firstWhere('relationship', 'Anak3');
        $child4 = $applicant->dependents->firstWhere('relationship', 'Anak4');

        // Helper function to format place and date of birth
        $formatPdob = function ($place, $date) {
            $formattedDate = $date ? Carbon::parse($date)->format('d M Y') : '';
            if (!empty($place) && !empty($formattedDate)) {
                return $place . ', ' . $formattedDate;
            } elseif (!empty($place)) {
                return $place;
            } elseif (!empty($formattedDate)) {
                return $formattedDate;
            }
            return '';
        };

        // Map child 1
        $templateProcessor->setValue("child1", strtoupper($child1?->name ?? ''));
        $templateProcessor->setValue("jkt1", ($child1?->gender ?? '') == 'L' ? 'L' : (($child1?->gender ?? '') == 'P' ? 'P' : ''));
        $templateProcessor->setValue("pdob1", strtoupper($formatPdob($child1?->place_of_birth, $child1?->date_of_birth)));
        $templateProcessor->setValue("edu1", strtoupper($child1?->education ?? ''));
        $templateProcessor->setValue("work1", strtoupper($child1?->occupation ?? ''));

        // Map child 2
        $templateProcessor->setValue("child2", strtoupper($child2?->name ?? ''));
        $templateProcessor->setValue("jkt2", ($child2?->gender ?? '') == 'L' ? 'L' : (($child2?->gender ?? '') == 'P' ? 'P' : ''));
        $templateProcessor->setValue("pdob2", strtoupper($formatPdob($child2?->place_of_birth, $child2?->date_of_birth)));
        $templateProcessor->setValue("edu2", strtoupper($child2?->education ?? ''));
        $templateProcessor->setValue("work2", strtoupper($child2?->occupation ?? ''));

        // Map child 3
        $templateProcessor->setValue("child3", strtoupper($child3?->name ?? ''));
        $templateProcessor->setValue("jkt3", ($child3?->gender ?? '') == 'L' ? 'L' : (($child3?->gender ?? '') == 'P' ? 'P' : ''));
        $templateProcessor->setValue("pdob3", strtoupper($formatPdob($child3?->place_of_birth, $child3?->date_of_birth)));
        $templateProcessor->setValue("edu3", strtoupper($child3?->education ?? ''));
        $templateProcessor->setValue("work3", strtoupper($child3?->occupation ?? ''));

        // Map child 4
        $templateProcessor->setValue("child4", strtoupper($child4?->name ?? ''));
        $templateProcessor->setValue("jkt4", ($child4?->gender ?? '') == 'L' ? 'L' : (($child4?->gender ?? '') == 'P' ? 'P' : ''));
        $templateProcessor->setValue("pdob4", strtoupper($formatPdob($child4?->place_of_birth, $child4?->date_of_birth)));
        $templateProcessor->setValue("edu4", strtoupper($child4?->education ?? ''));
        $templateProcessor->setValue("work4", strtoupper($child4?->occupation ?? ''));



        // --- Susunan keluarga (Father, Mother, Siblings) ---
        $father = $applicant->familyMembers->firstWhere('relationship', 'Ayah');
        $mother = $applicant->familyMembers->firstWhere('relationship', 'Ibu');
        $sibling1 = $applicant->familyMembers->firstWhere('relationship', 'Anak1');
        $sibling2 = $applicant->familyMembers->firstWhere('relationship', 'Anak2');
        $sibling3 = $applicant->familyMembers->firstWhere('relationship', 'Anak3');
        $sibling4 = $applicant->familyMembers->firstWhere('relationship', 'Anak4');


        // Father
        $templateProcessor->setValue('father', strtoupper($father?->name ?? ''));
        $templateProcessor->setValue('jkf', ($father?->gender ?? '') == 'L' ? 'L' : (($father?->gender ?? '') == 'P' ? 'P' : ''));
        $fatherDateOfBirth = $father?->date_of_birth;
        $templateProcessor->setValue('pdobf', strtoupper($formatPdob($father?->place_of_birth, $father?->date_of_birth)));
        $templateProcessor->setValue('eduf', strtoupper($father?->education ?? ''));
        $templateProcessor->setValue('workf', strtoupper($father?->occupation ?? ''));

        // Mother
        $templateProcessor->setValue('mother', strtoupper($mother?->name ?? ''));
        $templateProcessor->setValue('jkm', ($mother?->gender ?? '') == 'L' ? 'L' : (($mother?->gender ?? '') == 'P' ? 'P' : ''));
        $motherDateOfBirth = $mother?->date_of_birth;
        $templateProcessor->setValue('pdobm', strtoupper($formatPdob($mother?->place_of_birth, $mother?->date_of_birth)));
        $templateProcessor->setValue('edum', strtoupper($mother?->education ?? ''));
        $templateProcessor->setValue('workm', strtoupper($mother?->occupation ?? ''));


        $templateProcessor->setValue("kid1", strtoupper($sibling1?->name ?? ''));
        $templateProcessor->setValue("jkk1", ($sibling1?->gender ?? '') == 'L' ? 'L' : (($sibling1?->gender ?? '') == 'P' ? 'P' : ''));
        $templateProcessor->setValue("pdobk1", strtoupper($formatPdob($sibling1?->place_of_birth, $sibling1?->date_of_birth)));
        $templateProcessor->setValue("eduk1", strtoupper($sibling1?->education ?? ''));
        $templateProcessor->setValue("workk1", strtoupper($sibling1?->occupation ?? ''));

        $templateProcessor->setValue("kid2", strtoupper($sibling2?->name ?? ''));
        $templateProcessor->setValue("jkk2", ($sibling2?->gender ?? '') == 'L' ? 'L' : (($sibling2?->gender ?? '') == 'P' ? 'P' : ''));
        $templateProcessor->setValue("pdobk2", strtoupper($formatPdob($sibling2?->place_of_birth, $sibling2?->date_of_birth)));
        $templateProcessor->setValue("eduk2", strtoupper($sibling2?->education ?? ''));
        $templateProcessor->setValue("workk2", strtoupper($sibling2?->occupation ?? ''));


        $templateProcessor->setValue("kid3", strtoupper($sibling3?->name ?? ''));
        $templateProcessor->setValue("jkk3", ($sibling3?->gender ?? '') == 'L' ? 'L' : (($sibling3?->gender ?? '') == 'P' ? 'P' : ''));
        $templateProcessor->setValue("pdobk3", strtoupper($formatPdob($sibling3?->place_of_birth, $sibling3?->date_of_birth)));
        $templateProcessor->setValue("eduk3", strtoupper($sibling3?->education ?? ''));
        $templateProcessor->setValue("workk3", strtoupper($sibling3?->occupation ?? ''));


        $templateProcessor->setValue("kid4", strtoupper($sibling4?->name ?? ''));
        $templateProcessor->setValue("jkk4", ($sibling4?->gender ?? '') == 'L' ? 'L' : (($sibling4?->gender ?? '') == 'P' ? 'P' : ''));
        $templateProcessor->setValue("pdobk4", strtoupper($formatPdob($sibling4?->place_of_birth, $sibling4?->date_of_birth)));
        $templateProcessor->setValue("eduk4", strtoupper($sibling4?->education ?? ''));
        $templateProcessor->setValue("workk4", strtoupper($sibling4?->occupation ?? ''));



        // --- Kontak Person (Fixed 4 entries) ---
        $fixedContacts = $applicant->contactPersons->values();

        for ($i = 0; $i < 4; $i++) {
            $contact = $fixedContacts->get($i);
            $suffix = ($i + 1);

            $templateProcessor->setValue("contact{$suffix}", strtoupper($contact?->name ?? ''));
            $templateProcessor->setValue("jkc{$suffix}", ($contact?->gender ?? '') == 'L' ? 'L' : (($contact?->gender ?? '') == 'P' ? 'P' : ''));
            $templateProcessor->setValue("address_contact{$suffix}", strtoupper($contact?->address ?? ''));
            $templateProcessor->setValue("phone_contact{$suffix}", $contact?->phone_no ?? '');
            $templateProcessor->setValue("relation{$suffix}", strtoupper($contact?->relationship ?? ''));
            $templateProcessor->setValue("workc{$suffix}", strtoupper($contact?->occupation ?? ''));
        }

        // --- Dynamic Section: Education History ---
        // --- Dynamic Section: Education History (Populating fixed placeholders) --- 
        $sma = $applicant->educationHistory->firstWhere('level_of_education', 'SMA/SMK');
        $diploma = $applicant->educationHistory->firstWhere('level_of_education', 'D3'); // Assuming 'D3' for Diploma, adjust if different
        $universitas = $applicant->educationHistory->firstWhere('level_of_education', 'S1');
        $master = $applicant->educationHistory->firstWhere('level_of_education', 'S2');

        // Helper function to format education period
        $formatPeriod = function ($startYear, $endYear) {
            $period = '';
            if (!empty($startYear) && !empty($endYear)) {
                $period = $startYear . '-' . $endYear;
            } elseif (!empty($startYear)) {
                $period = $startYear . '-';
            } elseif (!empty($endYear)) {
                $period = '-' . $endYear;
            }
            return $period;
        };

        $templateProcessor->setValue('sma', strtoupper($sma->institution ?? ''));
        $templateProcessor->setValue('psma', $formatPeriod($sma->period_start_year ?? '', $sma->period_end_year ?? ''));
        $templateProcessor->setValue('msma', strtoupper($sma->major ?? ''));
        $templateProcessor->setValue('gsma', strtoupper($sma->grade ?? ''));

        $templateProcessor->setValue('diploma', strtoupper($diploma->institution ?? ''));
        $templateProcessor->setValue('pdiploma', $formatPeriod($diploma->period_start_year ?? '', $diploma->period_end_year ?? ''));
        $templateProcessor->setValue('mdiploma', strtoupper($diploma->major ?? ''));
        $templateProcessor->setValue('gdiploma', strtoupper($diploma->grade ?? ''));

        $templateProcessor->setValue('universitas', strtoupper($universitas->institution ?? ''));
        $templateProcessor->setValue('puniversitas', $formatPeriod($universitas->period_start_year ?? '', $universitas->period_end_year ?? ''));
        $templateProcessor->setValue('muniversitas', strtoupper($universitas->major ?? ''));
        $templateProcessor->setValue('guniversitas', strtoupper($universitas->grade ?? ''));

        $templateProcessor->setValue('master', strtoupper($master->institution ?? ''));
        $templateProcessor->setValue('pmaster', $formatPeriod($master->period_start_year ?? '', $master->period_end_year ?? ''));
        $templateProcessor->setValue('mmaster', strtoupper($master->major ?? ''));
        $templateProcessor->setValue('gmaster', strtoupper($master->grade ?? ''));


        $organization = $applicant->organizationalExperience->values();

        for ($i = 0; $i < 4; $i++) {
            $organisasi = $organization->get($i);
            $suffix = ($i + 1);

            $templateProcessor->setValue("organization{$suffix}", strtoupper($organisasi?->organization_name ?? ''));
            $templateProcessor->setValue("titleorganization{$suffix}", strtoupper($organisasi?->title_in_organization ?? ''));
            $templateProcessor->setValue("periodorganization{$suffix}", strtoupper($organisasi?->period ?? ''));
        }

        $course = $applicant->trainingCourses->values();

        for ($i = 0; $i < 4; $i++) {
            $kursus = $course->get($i);
            $suffix = ($i + 1);

            $templateProcessor->setValue("course{$suffix}", strtoupper($kursus?->training_course_name ?? ''));
            $templateProcessor->setValue("cyear{$suffix}", strtoupper($kursus?->year	 ?? ''));
            $templateProcessor->setValue("held{$suffix}", strtoupper($kursus?->held_by ?? ''));
            $templateProcessor->setValue("gc{$suffix}", strtoupper($kursus?->grade ?? ''));

        }

        $language = $applicant->languages->values();

        for ($i = 0; $i < 4; $i++) {
            $bahasa = $language->get($i);
            $suffix = ($i + 1);

            $templateProcessor->setValue("bahasa{$suffix}", strtoupper($bahasa?->language_name ?? ''));
            $templateProcessor->setValue("listen{$suffix}", strtoupper($bahasa?->listening_proficiency	 ?? ''));
            $templateProcessor->setValue("read{$suffix}", strtoupper($bahasa?->reading_proficiency ?? ''));
            $templateProcessor->setValue("speak{$suffix}", strtoupper($bahasa?->speaking_proficiency ?? ''));
            $templateProcessor->setValue("written{$suffix}", strtoupper($bahasa?->written_proficiency ?? ''));

        }
         $skills = $applicant->computerSkills->values();

        for ($i = 0; $i < 9; $i++) {
            $skill = $skills->get($i);
            $suffix = ($i + 1);

            $templateProcessor->setValue("skill{$suffix}", strtoupper($skill?->proficiency ?? ''));
            $templateProcessor->setValue("nama_skill{$suffix}", strtoupper($skill?->skill_name	 ?? ''));

        }


        $publications = $applicant->publications->values();

for ($i = 0; $i < 2; $i++) { // Loop untuk 2 publikasi
    $publikasi = $publications->get($i);
    $suffix = ($i + 1); // Untuk nama placeholder: publikasiLengkap1, publikasiLengkap2

    $fullPublicationTextRun = new TextRun(); // Membuat SATU TextRun untuk judul + tipe

    // Ambil judul publikasi
    $publicationTitle = $publikasi?->publication_title ?? '';
    // Ambil tipe publikasi
    $publicationType = $publikasi?->publication_type ?? ''; // Pastikan string kosong jika null

    // --- Logika Pengisian TextRun ---

    // 1. Tambahkan judul (selalu dengan underline)
    if (!empty($publicationTitle)) {
        $fullPublicationTextRun->addText(strtoupper($publicationTitle), ['underline' => 'single']);
    } else {
        // Jika judul kosong, tambahkan spasi non-breaking agar underline tetap berpotensi menyambung
        // (ini opsional, tergantung seberapa Anda ingin underline muncul jika judul kosong)
        // Jika tidak ingin ada underline sama sekali jika judul kosong, cukup addText('')
        $fullPublicationTextRun->addText('');
    }

    // 2. Tambahkan spasi pemisah antara judul dan tipe (jika tipe ada)
    // Ini penting agar ada pemisah visual
    if (!empty($publicationTitle) && !empty($publicationType)) {
        // Tambahkan spasi di antara judul dan tipe. Perhatikan style:
        // Jika Anda ingin spasi ini juga di-underline, tambahkan style 'underline' => 'single'
        // Jika tidak, biarkan kosong. Untuk "menyambung", spasi juga harus di-underline.
        $fullPublicationTextRun->addText(' ', ['underline' => 'single']); // Spasi dengan underline
    }

    // 3. Tambahkan tipe publikasi (dengan kurung, tanpa underline)
    if (!empty($publicationType)) {
        $fullPublicationTextRun->addText('(' . strtoupper($publicationType) . ')',['underline' => 'single']); // Tanpa style underline
    }


    // --- Mengisi placeholder tunggal di template Word ---
    // Pastikan nama placeholder ini sesuai dengan yang Anda buat di Langkah 1
    $templateProcessor->setComplexValue("publikasilengkap{$suffix}", $fullPublicationTextRun);
}

      
        // --- Dynamic Section: Work Experience ---
        if ($applicant->workExperience->isNotEmpty()) {
            $workExpDataForWord = $applicant->workExperience->map(function ($work) {
                return [
                    'company' => strtoupper($work->company_name ?? ''),
                    'period_start' => $work->period_start_date ? Carbon::parse($work->period_start_date)->format('d M Y') : '',
                    'period_end' => $work->period_end_date ? Carbon::parse($work->period_end_date)->format('d M Y') : 'Sekarang',
                    'company_addr' => strtoupper($work->company_address ?? ''),
                    'company_phone' => $work->company_phone_number ?? '',
                    'first_role' => strtoupper($work->first_role_title ?? ''),
                    'last_role' => strtoupper($work->last_role_title ?? ''),
                    'supervisor' => strtoupper($work->direct_supervisor_name ?? ''),
                    'resign_reason' => strtoupper($work->resignation_reason ?? ''),
                    'last_salary_val' => $work->last_salary ?? '',
                ];
            })->toArray();
            $templateProcessor->cloneRowAndSetValues('work_experience_row', $workExpDataForWord);
        } else {
            $templateProcessor->deleteBlock('work_experience_row');
        }

        // --- Dynamic Section: Work Achievements ---
        if ($applicant->workAchievements->isNotEmpty()) {
            $achievementDataForWord = $applicant->workAchievements->map(function ($ach) {
                return [
                    'ach_desc' => strtoupper($ach->achievement_description ?? ''),
                    'ach_year' => $ach->year ?? '',
                ];
            })->toArray();
            $templateProcessor->cloneRowAndSetValues('achievement_row', $achievementDataForWord);
        } else {
            $templateProcessor->deleteBlock('achievement_row');
        }

        // --- Health Declaration (Single record) ---
        $healthDeclaration = $applicant->healthDeclaration;
        $templateProcessor->setValue('weight_kg', $healthDeclaration?->weight_kg ?? '');
        $templateProcessor->setValue('height_cm', $healthDeclaration?->height_cm ?? '');
        $templateProcessor->setValue('has_medical_condition', ($healthDeclaration?->has_medical_condition ?? null) === 1 ? '✓' : '');
        $templateProcessor->setValue('medical_condition_explanation', strtoupper($healthDeclaration?->medical_condition_explanation ?? ''));
        $templateProcessor->setValue('resigned_due_to_health', ($healthDeclaration?->resigned_due_to_health ?? null) === 1 ? '✓' : '');
        $templateProcessor->setValue('resigned_due_to_health_explanation', strtoupper($healthDeclaration?->resigned_due_to_health_explanation ?? ''));
        $templateProcessor->setValue('failed_pre_employment_exam', ($healthDeclaration?->failed_pre_employment_exam ?? null) === 1 ? '✓' : '');
        $templateProcessor->setValue('failed_pre_employment_exam_explanation', strtoupper($healthDeclaration?->failed_pre_employment_exam_explanation ?? ''));
        $templateProcessor->setValue('undergoing_treatment_or_surgery', ($healthDeclaration?->undergoing_treatment_or_surgery ?? null) === 1 ? '✓' : '');
        $templateProcessor->setValue('treatment_or_surgery_explanation', strtoupper($healthDeclaration?->treatment_or_surgery_explanation ?? ''));
        $templateProcessor->setValue('under_medical_supervision', ($healthDeclaration?->under_medical_supervision ?? null) === 1 ? '✓' : '');
        $templateProcessor->setValue('medical_supervision_explanation', strtoupper($healthDeclaration?->medical_supervision_explanation ?? ''));
        $templateProcessor->setValue('on_regular_medication', ($healthDeclaration?->on_regular_medication ?? null) === 1 ? '✓' : '');
        $templateProcessor->setValue('regular_medication_explanation', strtoupper($healthDeclaration?->regular_medication_explanation ?? ''));
        $templateProcessor->setValue('has_allergies', ($healthDeclaration?->has_allergies ?? null) === 1 ? '✓' : '');
        $templateProcessor->setValue('allergies_explanation', strtoupper($healthDeclaration?->allergies_explanation ?? ''));
        $templateProcessor->setValue('absent_due_to_health_12_months', ($healthDeclaration?->absent_due_to_health_12_months ?? null) === 1 ? '✓' : '');
        $templateProcessor->setValue('absent_due_to_health_explanation', strtoupper($healthDeclaration?->absent_due_to_health_explanation ?? ''));
        $templateProcessor->setValue('had_accident', ($healthDeclaration?->had_accident ?? null) === 1 ? '✓' : '');
        $templateProcessor->setValue('accident_explanation', strtoupper($healthDeclaration?->accident_explanation ?? ''));
        $templateProcessor->setValue('is_pregnant', ($healthDeclaration?->is_pregnant ?? null) === 1 ? '✓' : '');
        $templateProcessor->setValue('pregnancy_week', $healthDeclaration?->pregnancy_week ?? '');
        $templateProcessor->setValue('declaration_agreed_health', ($healthDeclaration?->declaration_agreed ?? null) === 1 ? '✓' : '');
        $templateProcessor->setValue('declaration_date_health', $healthDeclaration?->declaration_date ? Carbon::parse($healthDeclaration->declaration_date)->format('d M Y') : '');

        // --- Simpan dan Berikan File Word ---
        $outputFileName = 'form_aplikasi_karyawan_' . Str::slug($applicant->full_name ?? 'untitled') . '_' . time() . '.docx';
        $outputPath = storage_path('app/public/' . $outputFileName);

        try {
            $templateProcessor->saveAs($outputPath);
        } catch (\Exception $e) {
            \Log::error('Gagal menyimpan file Word: ' . $e->getMessage());
            return back()->with('error', 'Terjadi kesalahan saat menyimpan dokumen Word. Silakan coba lagi nanti.');
        }

        return response()->download($outputPath)->deleteFileAfterSend(true);
    }
}