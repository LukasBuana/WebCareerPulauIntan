<?php

namespace App\Http\Controllers\Applicants;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Applicants\Applicant;
// Import semua model terkait yang diperlukan untuk form dinamis (Dependent, FamilyMember, dll)
use App\Models\Applicants\Dependent;
use App\Models\Applicants\FamilyMember;
use App\Models\ContactPerson;
use App\Models\Applicants\EducationHistory;
use App\Models\Applicants\OrganizationalExperience;
use App\Models\Applicants\TrainingCourse;
use App\Models\Applicants\Language;
use App\Models\Applicants\ComputerSkill;
use App\Models\Applicants\Publication;
use App\Models\Applicants\WorkExperience;
use App\Models\Applicants\WorkAchievement;
use App\Models\Applicants\HealthDeclaration;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon; // Import Carbon for date formatting

use Illuminate\Support\Facades\DB; // Add this for database transactions
use Illuminate\Support\Str; // Add this for Str::endsWith

class ApplicantController extends Controller
{
    public function showMyBiodataForm()
    {
        $user = Auth::user();
        $applicant = $user->applicant;

        if (!$applicant) {
            $applicant = new Applicant();
            $applicant->user_id = $user->id;
            $applicant->email_address = $user->email;
            $applicant->full_name = $user->name;
        } else {
            // Load all necessary relationships for dynamic forms
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

        }

        // Untuk mengisi dropdown select (misal: education_level di form)
        $educationLevels = ['SMA/SMK', 'D1', 'D2', 'D3', 'D4', 'S1', 'S2', 'S3'];
        $experienceLevels = ['Entry Level', 'Junior', 'Mid', 'Senior', 'Lead', 'Manager'];
        $maritalStatuses = ['Belum menikah', 'Menikah', 'Janda-Duda'];

        $dependentsData = $applicant->dependents->map(function ($dep) {
            return [
                'name' => $dep->name,
                'relationship' => $dep->relationship,
                'gender' => $dep->gender,
                'place_of_birth' => $dep->place_of_birth,
                'date_of_birth' => $dep->date_of_birth ? Carbon::parse($dep->date_of_birth)->format('Y-m-d') : null,
                'education' => $dep->education,
                'occupation' => $dep->occupation,
            ];
        })->toArray();

        $familyMembersData = $applicant->familyMembers->map(function ($fm) {
            return [
                'name' => $fm->name,
                'relationship' => $fm->relationship,
                'gender' => $fm->gender,
                'place_of_birth' => $fm->place_of_birth,
                'date_of_birth' => $fm->date_of_birth ? Carbon::parse($fm->date_of_birth)->format('Y-m-d') : null,
                'education' => $fm->education,
                'occupation' => $fm->occupation,
            ];
        })->toArray();
        $fixedContactPersonsData = [];
        $contactPersons = $applicant->contactPersons->sortBy('id')->values(); // Ensure consistent order

        // Initialize with default empty slots
        for ($i = 0; $i < 4; $i++) {
            $fixedContactPersonsData[$i] = [
                'id' => null, // Will be used for update/delete later
                'type' => null, // Will be set in blade as hidden field or managed
                'name' => null,
                'gender' => null,
                'address' => null,
                'phone_no' => null,
                'relationship' => null,
                'occupation' => null,
            ];
            // Pre-set types as per your requirement (2 Keluarga, 2 Teman)
            if ($i < 2) {
                $fixedContactPersonsData[$i]['type'] = 'Keluarga';
            } else {
                $fixedContactPersonsData[$i]['type'] = 'Teman';
            }
        }

        // Populate existing data into the fixed slots
        foreach ($contactPersons as $index => $cp) {
            if ($index < 4) { // Only take up to 4 existing contacts
                $fixedContactPersonsData[$index] = [
                    'id' => $cp->id, // Important for updating existing records
                    'type' => $cp->type,
                    'name' => $cp->name,
                    'gender' => $cp->gender,
                    'address' => $cp->address,
                    'phone_no' => $cp->phone_no,
                    'relationship' => $cp->relationship,
                    'occupation' => $cp->occupation,
                ];
            }
        }
        $educationHistoryData = $applicant->educationHistory->map(function ($eh) {
            return $eh->only(['level_of_education', 'institution', 'period_start_year', 'period_end_year', 'major', 'grade']);
        })->toArray();
        $organizationalExperienceData = $applicant->organizationalExperience->map(function ($oe) {
            return $oe->only(['organization_name', 'title_in_organization', 'period']);
        })->toArray();
        $trainingCoursesData = $applicant->trainingCourses->map(function ($tc) {
            return $tc->only(['training_course_name', 'year', 'held_by', 'grade']);
        })->toArray();
        $languagesData = $applicant->languages->map(function ($lang) {
            return $lang->only(['language_name', 'listening_proficiency', 'reading_proficiency', 'speaking_proficiency', 'written_proficiency']);
        })->toArray();
        $computerSkillsData = $applicant->computerSkills->map(function ($cs) {
            return $cs->only(['skill_name', 'proficiency']);
        })->toArray();
        $publicationsData = $applicant->publications->map(function ($pub) {
            return $pub->only(['title', 'type']);
        })->toArray();
        $workExperienceData = $applicant->workExperience->map(function ($we) {
            return $we->only(['company_name', 'period_start_date', 'period_end_date', 'company_address', 'company_phone_number', 'first_role_title', 'last_role_title', 'direct_supervisor_name', 'resignation_reason', 'last_salary']);
        })->toArray();
        $workAchievementsData = $applicant->workAchievements->map(function ($wa) {
            return $wa->only(['achievement_description', 'year']);
        })->toArray();
        $healthDeclarationData = $applicant->healthDeclaration ? $applicant->healthDeclaration->only([
            'weight_kg',
            'height_cm',
            'has_medical_condition',
            'medical_condition_explanation',
            'resigned_due_to_health',
            'resigned_due_to_health_explanation',
            'failed_pre_employment_exam',
            'failed_pre_employment_exam_explanation',
            'undergoing_treatment_or_surgery',
            'treatment_or_surgery_explanation',
            'under_medical_supervision',
            'medical_supervision_explanation',
            'on_regular_medication',
            'regular_medication_explanation',
            'has_allergies',
            'allergies_explanation',
            'absent_due_to_health_12_months',
            'absent_due_to_health_explanation',
            'had_accident',
            'accident_explanation',
            'is_pregnant',
            'pregnancy_week',
            'declaration_agreed',
            'declaration_date'
        ]) : null;


        return view('applicant.profile.index', compact(
            'applicant',
            'educationLevels',
            'experienceLevels',
            'maritalStatuses', // Make sure this is passed if used
            'dependentsData',
            'familyMembersData',
            'fixedContactPersonsData',
            'educationHistoryData',
            'organizationalExperienceData',
            'trainingCoursesData',
            'languagesData',
            'computerSkillsData',
            'publicationsData',
            'workExperienceData',
            'workAchievementsData',
            'healthDeclarationData'
        ));
    }

    /**
     * Store a newly created biodata for the authenticated user.
     */
    public function storeMyBiodata(Request $request)
    {
        $user = Auth::user();
        if ($user->applicant) {
            // If applicant data exists, delegate to update method
            return $this->updateMyBiodata($request);
        }

        $rules = $this->validationRules($user->id);
        $request->validate($rules);

        DB::beginTransaction();
        try {
            $profileImageBase64 = null;
            if ($request->hasFile('profile_image')) {
                $file = $request->file('profile_image');
                $mimeType = $file->getMimeType();
                $base64Data = base64_encode(file_get_contents($file->getRealPath()));
                $profileImageBase64 = "data:{$mimeType};base64,{$base64Data}";
            }

            $applicantData = $request->except([
                '_token',
                '_method',
                'profile_image',
                'dependents',
                'family_members',
                'contact_persons',
                'education_history',
                'organizational_experience',
                'training_courses',
                'languages',
                'computer_skills',
                'publications',
                'work_experience',
                'work_achievements',
                'health_declaration'
            ]);

            // Handle boolean fields from checkboxes/radios explicitly for main applicant data
            $booleanFields = [
                'applied_before',
                'applying_other_company',
                'under_contract',
                'has_part_time_job',
                'object_previous_employer_contact',
                'has_acquaintance_in_company',
                'undergone_psych_exam',
                'involved_police_case',
                'willing_to_be_located_as_needed',
                'accept_company_salary_standard',
                'comply_company_rules',
                'willing_to_take_psych_exam',
                'willing_to_take_medical_checkup',
                'willing_to_work_out_of_town',
                'willing_to_transfer',
                'willing_to_be_demoted',
                'declaration_agreement' // Assuming this is part of main applicant data
            ];
            foreach ($booleanFields as $field) {
                $applicantData[$field] = $request->has($field) ? 1 : 0;
            }

            $applicantData['user_id'] = $user->id;
            $applicantData['email_address'] = $user->email;
            $applicantData['full_name'] = $user->name; // Use user's name as initial value
            $applicantData['profile_image'] = $profileImageBase64;

            $applicant = Applicant::create($applicantData);

            $this->syncApplicantNestedData($request, $applicant);

            DB::commit();
            return response()->json(['message' => 'Biodata berhasil disimpan!', 'redirect' => route('my_biodata.form')]);
        } catch (\Illuminate\Validation\ValidationException $e) {
            DB::rollBack();
            return response()->json([
                'message' => 'Validasi gagal.',
                'errors' => $e->errors()
            ], 422);
        } catch (\Exception $e) {
            DB::rollBack();
            \Log::error('Error storing biodata: ' . $e->getMessage());
            return response()->json(['message' => 'Terjadi kesalahan saat menyimpan biodata. Silakan coba lagi.'], 500);
        }
    }

    /**
     * Update existing biodata for the authenticated user.
     */
    public function updateMyBiodata(Request $request)
    {
        $user = Auth::user();
        $applicant = $user->applicant;

        if (!$applicant) {
            // If no applicant data exists, delegate to store method
            return $this->storeMyBiodata($request);
        }

        $rules = $this->validationRules($user->id, $applicant->id);
        $request->validate($rules); // This will throw ValidationException on failure

        DB::beginTransaction();
        try {
            $profileImageBase64 = $applicant->profile_image; // Keep old image if no new one
            if ($request->hasFile('profile_image')) {
                $file = $request->file('profile_image');
                $mimeType = $file->getMimeType();
                $base64Data = base64_encode(file_get_contents($file->getRealPath()));
                $profileImageBase64 = "data:{$mimeType};base64,{$base64Data}";
            }

            $applicantData = $request->except([
                '_token',
                '_method',
                'profile_image',
                'dependents',
                'family_members',
                'contact_persons',
                'education_history',
                'organizational_experience',
                'training_courses',
                'languages',
                'computer_skills',
                'publications',
                'work_experience',
                'work_achievements',
                'health_declaration'
            ]);

            // Handle boolean fields from checkboxes/radios explicitly for main applicant data
            $booleanFields = [
                'applied_before',
                'applying_other_company',
                'under_contract',
                'has_part_time_job',
                'object_previous_employer_contact',
                'has_acquaintance_in_company',
                'undergone_psych_exam',
                'involved_police_case',
                'willing_to_be_located_as_needed',
                'accept_company_salary_standard',
                'comply_company_rules',
                'willing_to_take_psych_exam',
                'willing_to_take_medical_checkup',
                'willing_to_work_out_of_town',
                'willing_to_transfer',
                'willing_to_be_demoted',
                'declaration_agreement'
            ];
            foreach ($booleanFields as $field) {
                $applicantData[$field] = $request->has($field) ? 1 : 0;
            }
            $applicantData['profile_image'] = $profileImageBase64;

            $applicant->update($applicantData);

            $this->syncApplicantNestedData($request, $applicant);

            DB::commit();
            return response()->json(['message' => 'Biodata berhasil diperbarui!', 'redirect' => route('my_biodata.form')]);
        } catch (\Illuminate\Validation\ValidationException $e) {
            DB::rollBack();
            return response()->json([
                'message' => 'Validasi gagal.',
                'errors' => $e->errors()
            ], 422);
        } catch (\Exception $e) {
            DB::rollBack();
            \Log::error('Error updating biodata: ' . $e->getMessage());
            return response()->json(['message' => 'Terjadi kesalahan saat memperbarui biodata. Silakan coba lagi.'], 500);
        }
    }


    /**
     * Saves data for a specific section via AJAX.
     */
    public function saveSectionData(Request $request, $sectionName)
    {
        $user = Auth::user();
        $applicant = $user->applicant;
if (!Auth::check()) {
        // This response will be JSON, preventing the frontend SyntaxError
        return response()->json(['message' => 'Unauthorized. Please log in again.'], 401);
    }
        // Create applicant if not exists
        if (!$applicant) {
            $applicant = Applicant::create([
                'user_id' => $user->id,
                'email_address' => $user->email,
                'full_name' => $user->name,
            ]);
        }

        $rules = $this->getSectionValidationRules($sectionName, $applicant->id);

        try {
            // Validate only the fields present in the request for this section
            $validatedData = $request->validate($rules);

            DB::beginTransaction();

            switch ($sectionName) {
                case 'informasiUtama':
                    $applicantData = $request->only([
                        'full_name',
                        'mobile_phone_number',
                        'place_of_birth',
                        'date_of_birth',
                        'blood_type'
                    ]);
                    // Handle profile image separately as it's a file upload
                    if ($request->hasFile('profile_image')) {
                        $file = $request->file('profile_image');
                        $mimeType = $file->getMimeType();
                        $base64Data = base64_encode(file_get_contents($file->getRealPath()));
                        $applicantData['profile_image'] = "data:{$mimeType};base64,{$base64Data}";
                    } elseif ($request->has('profile_image_cleared') && $request->input('profile_image_cleared') === '1') {
                        // Logic to clear image if user explicitly removes it
                        $applicantData['profile_image'] = null;
                    }
                    $applicant->update($applicantData);
                    break;

                case 'informasiAlamat':
                    $applicant->update($request->only([
                        'permanent_address_ktp',
                        'permanent_postal_code_ktp',
                        'current_address',
                        'current_postal_code',
                        'parents_address',
                        'parents_postal_code'
                    ]));
                    break;

                case 'nomorIdentitas':
                    $applicant->update($request->only([
                        'id_passport_number',
                        'npwp_number',
                        'bpjs_health_number',
                        'license_number',
                        'license_expiry_date',
                        'bpjs_employment_number'
                    ]));
                    break;

                case 'detailPribadiLainnya':
                    $applicant->update($request->only([
                        'gender',
                        'religion',
                        'marital_status',
                        'married_since_date',
                        'widowed_since_date'
                    ]));
                    // Explicitly handle married_since_date and widowed_since_date based on marital_status
                    if ($request->input('marital_status') !== 'Menikah') {
                        $applicant->update(['married_since_date' => null]);
                    }
                    if ($request->input('marital_status') !== 'Janda-Duda') {
                        $applicant->update(['widowed_since_date' => null]);
                    }
                    break;

                case 'sumberLowongan':
                    $applicant->update($request->only(['job_vacancy_source']));
                    break;

                // --- Add cases for other sections that might have specific saving logic or dynamic inputs ---
                // For dynamic sections, you would typically delete existing and re-create.
                // Example for dependents:
                case 'dependents':
                    $this->syncSectionHasMany($applicant, 'dependents', $request->input('dependents'), [
                        'name',
                        'relationship',
                        'gender',
                        'place_of_birth',
                        'date_of_birth',
                        'education',
                        'occupation'
                    ]);

                case 'darurat':
                    $applicant->update($request->only([
                        'emergency_contact_name',
                        'emergency_contact_address',
                        'emergency_contact_phone',
                        'emergency_contact_relationship'
                    ]));
                    break;
                case 'family_members':
                    $this->syncSectionHasMany($applicant, 'familyMembers', $request->input('family_members'), [
                        'name',
                        'relationship',
                        'gender',
                        'place_of_birth',
                        'date_of_birth',
                        'education',
                        'occupation'
                    ]);
                    break;
                case 'contact_persons':
                    $this->syncFixedContactPersons($applicant, $request->input('fixed_contact_persons'));
                    break;
                case 'education_history':
                    $this->syncSectionHasMany($applicant, 'educationHistory', $request->input('education_history'), [
                        'level_of_education',
                        'institution',
                        'period_start_year',
                        'period_end_year',
                        'major',
                        'grade'
                    ]);
                    break;
                case 'organizational_experience':
                    $this->syncSectionHasMany($applicant, 'organizationalExperience', $request->input('organizational_experience'), [
                        'organization_name',
                        'title_in_organization',
                        'period'
                    ]);
                    break;
                case 'training_courses':
                    $this->syncSectionHasMany($applicant, 'trainingCourses', $request->input('training_courses'), [
                        'training_course_name',
                        'year',
                        'held_by',
                        'grade'
                    ]);
                    break;
                case 'languages':
                    $this->syncSectionHasMany($applicant, 'languages', $request->input('languages'), [
                        'language_name',
                        'listening_proficiency',
                        'reading_proficiency',
                        'speaking_proficiency',
                        'written_proficiency'
                    ]);
                    break;
                case 'computer_skills':
                    $this->syncSectionHasMany($applicant, 'computerSkills', $request->input('computer_skills'), [
                        'skill_name',
                        'proficiency'
                    ]);
                    break;
                case 'publications':
                    $this->syncSectionHasMany($applicant, 'publications', $request->input('publications'), [
                        'title',
                        'type'
                    ]);
                    break;
                case 'work_experience':
                    $this->syncSectionHasMany($applicant, 'workExperience', $request->input('work_experience'), [
                        'company_name',
                        'period_start_date',
                        'period_end_date',
                        'company_address',
                        'company_phone_number',
                        'first_role_title',
                        'last_role_title',
                        'direct_supervisor_name',
                        'resignation_reason',
                        'last_salary'
                    ]);
                    break;
                case 'work_achievements':
                    $this->syncSectionHasMany($applicant, 'workAchievements', $request->input('work_achievements'), [
                        'achievement_description',
                        'year'
                    ]);
                    break;
                case 'health_declaration':
                    $healthData = $request->only([
                        'weight_kg',
                        'height_cm',
                        'has_medical_condition',
                        'medical_condition_explanation',
                        'resigned_due_to_health',
                        'resigned_due_to_health_explanation',
                        'failed_pre_employment_exam',
                        'failed_pre_employment_exam_explanation',
                        'undergoing_treatment_or_surgery',
                        'treatment_or_surgery_explanation',
                        'under_medical_supervision',
                        'medical_supervision_explanation',
                        'on_regular_medication',
                        'regular_medication_explanation',
                        'has_allergies',
                        'allergies_explanation',
                        'absent_due_to_health_12_months',
                        'absent_due_to_health_explanation',
                        'had_accident',
                        'accident_explanation',
                        'is_pregnant',
                        'pregnancy_week',
                        'declaration_agreed',
                        'declaration_date'
                    ]);
                    // Handle booleans for health data 
                    $healthBooleanFields = [
                        'has_medical_condition',
                        'resigned_due_to_health',
                        'failed_pre_employment_exam',
                        'undergoing_treatment_or_surgery',
                        'under_medical_supervision',
                        'on_regular_medication',
                        'has_allergies',
                        'absent_due_to_health_12_months',
                        'had_accident',
                        'is_pregnant',
                        'declaration_agreed'
                    ];
                    foreach ($healthBooleanFields as $field) {
                        $healthData[$field] = $request->has($field) ? 1 : 0;
                    }

                    if (array_filter($healthData)) { // Only create/update if there's actual data 
                        $applicant->healthDeclaration()->updateOrCreate(
                            ['applicant_id' => $applicant->id], // Find by applicant_id
                            $healthData
                        );
                    } else if ($applicant->healthDeclaration) {
                        $applicant->healthDeclaration()->delete(); // Delete if all fields are empty 
                    }
                    break;
                default:
                    return response()->json(['message' => 'Section not found or not supported for AJAX save.'], 400);
            }

            DB::commit();
            return response()->json(['message' => 'Data section berhasil disimpan!']);

        } catch (\Illuminate\Validation\ValidationException $e) {
            DB::rollBack();
            return response()->json([
                'message' => 'Validasi gagal.',
                'errors' => $e->errors()
            ], 422);
        } catch (\Exception $e) {
            DB::rollBack();
            \Log::error('Error saving section ' . $sectionName . ': ' . $e->getMessage());
            return response()->json(['message' => 'Terjadi kesalahan saat menyimpan data section. Silakan coba lagi.'], 500);
        }
    }

    /**
     * Helper to get validation rules for a specific section.
     */
    protected function getSectionValidationRules($sectionName, $applicantId)
    {
        $allRules = $this->validationRules(Auth::id(), $applicantId);
        $sectionRules = [];

        switch ($sectionName) {
            case 'informasiUtama':
                $sectionRules = [
                    'full_name' => $allRules['full_name'],
                    'mobile_phone_number' => $allRules['mobile_phone_number'],
                    'place_of_birth' => $allRules['place_of_birth'],
                    'date_of_birth' => $allRules['date_of_birth'],
                    'blood_type' => $allRules['blood_type'],
                    'profile_image' => $allRules['profile_image'],
                ];
                break;
            case 'informasiAlamat':
                $sectionRules = [
                    'permanent_address_ktp' => $allRules['permanent_address_ktp'],
                    'permanent_postal_code_ktp' => $allRules['permanent_postal_code_ktp'],
                    'current_address' => $allRules['current_address'],
                    'current_postal_code' => $allRules['current_postal_code'],
                    'parents_address' => $allRules['parents_address'],
                    'parents_postal_code' => $allRules['parents_postal_code'],
                ];
                break;
            case 'nomorIdentitas':
                $sectionRules = [
                    'id_passport_number' => $allRules['id_passport_number'],
                    'npwp_number' => $allRules['npwp_number'],
                    'bpjs_health_number' => $allRules['bpjs_health_number'],
                    'license_number' => $allRules['license_number'],
                    'license_expiry_date' => $allRules['license_expiry_date'],
                    'bpjs_employment_number' => $allRules['bpjs_employment_number'],
                ];
                break;
            case 'detailPribadiLainnya':
                $sectionRules = [
                    'gender' => $allRules['gender'],
                    'religion' => $allRules['religion'],
                    'marital_status' => $allRules['marital_status'],
                    'married_since_date' => $allRules['married_since_date'],
                    'widowed_since_date' => $allRules['widowed_since_date'],
                ];
                break;
            case 'sumberLowongan':
                $sectionRules = [
                    'job_vacancy_source' => $allRules['job_vacancy_source'],
                ];
                break;
            case 'dependents':
                $sectionRules = [
                    'dependents' => $allRules['dependents'],
                    'dependents.*.name' => 'required|string|max:255', // Changed to required
                    'dependents.*.relationship' => 'required|string|max:100', // Changed to required
                    'dependents.*.gender' => 'required|in:L,P', // Changed to required
                    'dependents.*.place_of_birth' => 'nullable|string|max:100',
                    'dependents.*.date_of_birth' => 'nullable|date',
                    'dependents.*.education' => 'nullable|string|max:100',
                    'dependents.*.occupation' => 'nullable|string|max:100',
                ];
                break;
            case 'family_members':
                $sectionRules = [
                    'family_members' => $allRules['family_members'],
                    'family_members.*.name' => 'required|string|max:255', // Changed to required
                    'family_members.*.relationship' => 'required|string|max:100', // Changed to required
                    'family_members.*.gender' => 'required|in:L,P', // Changed to required
                    'family_members.*.place_of_birth' => 'nullable|string|max:100',
                    'family_members.*.date_of_birth' => 'nullable|date',
                    'family_members.*.education' => 'nullable|string|max:100',
                    'family_members.*.occupation' => 'nullable|string|max:100',
                ];
                break;

            case 'darurat':
                $sectionRules = [
                    'emergency_contact_name' => $allRules['emergency_contact_name'],
                    'emergency_contact_address' => $allRules['emergency_contact_address'],
                    'emergency_contact_phone' => $allRules['emergency_contact_phone'],
                    'emergency_contact_relationship' => $allRules['emergency_contact_relationship'],
                ];
                break;
            case 'contact_persons':
                $sectionRules = [
                    'contact_persons' => $allRules['contact_persons'],
                    'contact_persons.*.type' => 'required|in:Keluarga,Teman', // Changed to required
                    'contact_persons.*.name' => 'required|string|max:255', // Changed to required
                    'contact_persons.*.gender' => 'required|in:L,P', // Changed to required
                    'contact_persons.*.address' => 'required|string', // Changed to required
                    'contact_persons.*.phone_no' => 'required|string|max:20', // Changed to required
                    'contact_persons.*.relationship' => 'required|string|max:100', // Changed to required
                    'contact_persons.*.occupation' => 'required|string|max:100', // Changed to required
                ];
                break;
            case 'education_history':
                $sectionRules = [
                    'education_history' => $allRules['education_history'],
                    'education_history.*.level_of_education' => 'required|string|max:100', // Changed to required
                    'education_history.*.institution' => 'required|string|max:255', // Changed to required
                    'education_history.*.period_start_year' => 'required|integer|min:1900|max:' . date('Y'), // Changed to required
                    'education_history.*.period_end_year' => 'required|integer|min:1900|max:' . date('Y'), // Changed to required
                    'education_history.*.major' => 'nullable|string|max:255',
                    'education_history.*.grade' => 'nullable|string|max:50',
                ];
                break;
            case 'organizational_experience':
                $sectionRules = [
                    'organizational_experience' => $allRules['organizational_experience'],
                    'organizational_experience.*.organization_name' => 'required|string|max:255', // Changed to required
                    'organizational_experience.*.title_in_organization' => 'nullable|string|max:255',
                    'organizational_experience.*.period' => 'nullable|string|max:100',
                ];
                break;
            case 'training_courses':
                $sectionRules = [
                    'training_courses' => $allRules['training_courses'],
                    'training_courses.*.training_course_name' => 'required|string|max:255', // Changed to required
                    'training_courses.*.year' => 'required|integer|min:1900|max:' . date('Y'), // Changed to required
                    'training_courses.*.held_by' => 'nullable|string|max:255',
                    'training_courses.*.grade' => 'nullable|string|max:50',
                ];
                break;
            case 'languages':
                $sectionRules = [
                    'languages' => $allRules['languages'],
                    'languages.*.language_name' => 'required|string|max:100', // Changed to required
                    'languages.*.listening_proficiency' => 'required|in:Baik Sekali,Baik,Cukup,Kurang', // Changed to required
                    'languages.*.reading_proficiency' => 'required|in:Baik Sekali,Baik,Cukup,Kurang', // Changed to required
                    'languages.*.speaking_proficiency' => 'required|in:Baik Sekali,Baik,Cukup,Kurang', // Changed to required
                    'languages.*.written_proficiency' => 'required|in:Baik Sekali,Baik,Cukup,Kurang', // Changed to required
                ];
                break;
            case 'computer_skills':
                $sectionRules = [
                    'computer_skills' => $allRules['computer_skills'],
                    'computer_skills.*.skill_name' => 'required|string|max:100', // Changed to required
                    'computer_skills.*.proficiency' => 'required|in:Baik Sekali,Baik,Cukup,Kurang', // Changed to required
                ];
                break;
            case 'publications':
                $sectionRules = [
                    'publications' => $allRules['publications'],
                    'publications.*.title' => 'required|string', // Changed to required
                    'publications.*.type' => 'nullable|string|max:100',
                ];
                break;
            case 'work_experience':
                $sectionRules = [
                    'work_experience' => $allRules['work_experience'],
                    'work_experience.*.company_name' => 'required|string|max:255', // Changed to required
                    'work_experience.*.period_start_date' => 'required|date', // Changed to required
                    'work_experience.*.period_end_date' => 'nullable|date',
                    'work_experience.*.company_address' => 'nullable|string',
                    'work_experience.*.company_phone_number' => 'nullable|string|max:20',
                    'work_experience.*.first_role_title' => 'required|string|max:255', // Changed to required
                    'work_experience.*.last_role_title' => 'required|string|max:255', // Changed to required
                    'work_experience.*.direct_supervisor_name' => 'nullable|string|max:255',
                    'work_experience.*.resignation_reason' => 'nullable|string',
                    'work_experience.*.last_salary' => 'nullable|string|max:100',
                ];
                break;
            case 'work_achievements':
                $sectionRules = [
                    'work_achievements' => $allRules['work_achievements'],
                    'work_achievements.*.achievement_description' => 'required|string', // Changed to required
                    'work_achievements.*.year' => 'nullable|integer|min:1900|max:' . date('Y'),
                ];
                break;
            case 'health_declaration':
                $sectionRules = [
                    'weight_kg' => $allRules['weight_kg'],
                    'height_cm' => $allRules['height_cm'],
                    'has_medical_condition' => $allRules['has_medical_condition'],
                    'medical_condition_explanation' => $allRules['medical_condition_explanation'],
                    'resigned_due_to_health' => $allRules['resigned_due_to_health'],
                    'resigned_due_to_health_explanation' => $allRules['resigned_due_to_health_explanation'],
                    'failed_pre_employment_exam' => $allRules['failed_pre_employment_exam'],
                    'failed_pre_employment_exam_explanation' => $allRules['failed_pre_employment_exam_explanation'],
                    'undergoing_treatment_or_surgery' => $allRules['undergoing_treatment_or_surgery'],
                    'treatment_or_surgery_explanation' => $allRules['treatment_or_surgery_explanation'],
                    'under_medical_supervision' => $allRules['under_medical_supervision'],
                    'medical_supervision_explanation' => $allRules['medical_supervision_explanation'],
                    'on_regular_medication' => $allRules['on_regular_medication'],
                    'regular_medication_explanation' => $allRules['regular_medication_explanation'],
                    'has_allergies' => $allRules['has_allergies'],
                    'allergies_explanation' => $allRules['allergies_explanation'],
                    'absent_due_to_health_12_months' => $allRules['absent_due_to_health_12_months'],
                    'absent_due_to_health_explanation' => $allRules['absent_due_to_health_explanation'],
                    'had_accident' => $allRules['had_accident'],
                    'accident_explanation' => $allRules['accident_explanation'],
                    'is_pregnant' => $allRules['is_pregnant'],
                    'pregnancy_week' => $allRules['pregnancy_week'],
                    'health_declaration_agreed' => $allRules['health_declaration_agreed'],
                    'health_declaration_date' => $allRules['health_declaration_date'],
                ];
                break;
        }
        return $sectionRules;
    }
    /**
     * Helper method to sync HasMany relationships for a specific section.
     * This will DELETE all existing records for the relationship and RECREATE them
     * based on the provided request data.
     */
    protected function syncSectionHasMany($applicant, $relationName, $requestData, $fieldsToCreate)
    {
        $applicant->$relationName()->delete(); // Delete all existing records for this relation

        if ($requestData && is_array($requestData)) {
            foreach ($requestData as $index => $data) {
                // Ensure there's at least one non-empty field to consider it a valid entry
                if (!empty(array_filter($data))) {
                    $createData = [];
                    foreach ($fieldsToCreate as $field) {
                        $createData[$field] = $data[$field] ?? null;
                    }

                    // Add 'order' to maintain insertion order if needed
                    $createData['order'] = $index + 1;

                    // Special handling for date and year fields
                    foreach ($createData as $key => $val) {
                        if (Str::endsWith($key, '_date') && $val) {
                            $createData[$key] = Carbon::parse($val)->format('Y-m-d');
                        }
                        if (Str::endsWith($key, '_year') && $val) {
                            $createData[$key] = intval($val);
                        }
                    }
                    $applicant->$relationName()->create($createData);
                }
            }
        }
    }

    protected function syncFixedContactPersons($applicant, $requestData)
    {
        // Ensure $requestData is an array, even if empty
        $requestData = is_array($requestData) ? array_values($requestData) : [];

        // Get existing contact persons for this applicant, indexed by ID if possible
        $existingContactPersons = $applicant->contactPersons->keyBy('id');

        $processedIds = []; // To keep track of existing IDs that were updated

        for ($i = 0; $i < 4; $i++) {
            $data = $requestData[$i] ?? []; // Get data for this slot, or an empty array

            // If all fields for this slot are empty, and it corresponds to an existing record, delete it.
            // Check if there's actual data for this slot in the request after trimming
            $hasData = false;
            foreach (['name', 'gender', 'address', 'phone_no', 'relationship', 'occupation'] as $field) {
                if (!empty(trim($data[$field] ?? ''))) {
                    $hasData = true;
                    break;
                }
            }

            // Determine the 'type' based on index (0, 1 for Keluarga; 2, 3 for Teman)
            $type = ($i < 2) ? 'Keluarga' : 'Teman';
            $data['type'] = $type; // Ensure type is always set for the database

            if ($hasData) {
                // Try to find by ID if it exists in the request data
                $contactPersonId = $data['id'] ?? null;
                $contactPerson = null;

                if ($contactPersonId && $existingContactPersons->has($contactPersonId)) {
                    $contactPerson = $existingContactPersons->pull($contactPersonId); // Remove from remaining existing
                    $contactPerson->update($data);
                } else {
                    // Create new if no ID or ID not found
                    $applicant->contactPersons()->create($data);
                }
            } else {
                // If no data for this slot, and it corresponds to an existing record, delete it.
                // This scenario means a user cleared out a previously saved fixed contact.
                $contactPersonId = $data['id'] ?? null;
                if ($contactPersonId && $existingContactPersons->has($contactPersonId)) {
                    $existingContactPersons->pull($contactPersonId)->delete();
                }
            }
        }

        // Any remaining records in $existingContactPersons were not in the requestData (i.e., removed from the form), so delete them.
        foreach ($existingContactPersons as $remainingCp) {
            $remainingCp->delete();
        }
    }

    /**
     * Define common validation rules for create and update.
     */
    protected function validationRules($userId, $applicantId = null)
    {
        return [
            'full_name' => 'required|string|max:255',
            'gender' => 'required|in:L,P',
            'place_of_birth' => 'nullable|string|max:100',
            'date_of_birth' => 'nullable|date',
            'permanent_address_ktp' => 'nullable|string',
            'permanent_postal_code_ktp' => 'nullable|string|max:10',
            'current_address' => 'nullable|string',
            'current_postal_code' => 'nullable|string|max:10',
            'phone_number' => 'nullable|string|max:20', // Ensure this field exists in your form if required
            'mobile_phone_number' => 'required|string|max:20', // Changed to required
            'email_address' => 'required|email|max:100|unique:applicants,email_address,' . $applicantId,
            'parents_address' => 'nullable|string',
            'parents_postal_code' => 'nullable|string|max:10',
            'religion' => 'required|string|max:50', // Changed to required
            'id_passport_number' => 'required|string|max:50|unique:applicants,id_passport_number,' . $applicantId, // Changed to required
            'blood_type' => 'required|in:O,AB,A,B', // Changed to required
            'marital_status' => 'required|in:Belum menikah,Menikah,Janda-Duda', // Changed to required
            'married_since_date' => 'nullable|date_format:Y-m-d|required_if:marital_status,Menikah', // Added conditional required
            'widowed_since_date' => 'nullable|date_format:Y-m-d|required_if:marital_status,Janda-Duda', // Added conditional required
            'license_number' => 'nullable|string|max:50',
            'license_expiry_date' => 'nullable|date',
            'bpjs_health_number' => 'nullable|string|max:50', // Assuming bpjs_health_number
            'bpjs_employment_number' => 'nullable|string|max:50', // Assuming bpjs_employment_number
            'npwp_number' => 'nullable|string|max:50',
            'job_vacancy_source' => 'required|string|max:100', // Changed to required
            'emergency_contact_name' => 'nullable|string|max:255',
            'emergency_contact_address' => 'nullable|string',
            'emergency_contact_phone' => 'nullable|string|max:20',
            'emergency_contact_relationship' => 'nullable|string|max:100',
            'last_job_duties_responsibilities' => 'nullable|string',
            'last_job_org_structure' => 'nullable|string',
            'applied_before' => 'nullable|boolean',
            'applied_before_date' => 'nullable|date',
            'applied_before_position' => 'nullable|string|max:100',
            'applying_other_company' => 'nullable|boolean',
            'other_company_position' => 'nullable|string',
            'under_contract' => 'nullable|boolean',
            'has_part_time_job' => 'nullable|boolean',
            'part_time_job_details' => 'nullable|string',
            'object_previous_employer_contact' => 'nullable|boolean',
            'has_acquaintance_in_company' => 'nullable|boolean',
            'acquaintance_details' => 'nullable|string',
            'undergone_psych_exam' => 'nullable|boolean',
            'psych_exam_details' => 'nullable|string',
            'involved_police_case' => 'nullable|boolean',
            'willing_to_be_located_as_needed' => 'nullable|boolean',
            'accept_company_salary_standard' => 'nullable|boolean',
            'comply_company_rules' => 'nullable|boolean',
            'willing_to_take_psych_exam' => 'nullable|boolean',
            'willing_to_take_medical_checkup' => 'nullable|boolean',
            'willing_to_work_out_of_town' => 'nullable|boolean',
            'willing_to_transfer' => 'nullable|boolean',
            'willing_to_be_demoted' => 'nullable|boolean',
            'application_influenced_by' => 'nullable|string|max:255',
            'mastered_assignments_competencies' => 'nullable|string',
            'desired_position' => 'nullable|string|max:100',
            'expected_salary' => 'nullable|string|max:50',
            'why_interested_in_company' => 'nullable|string',
            'unsuitable_jobs' => 'nullable|string',
            'start_work_date_if_accepted' => 'nullable|date',
            'contribution_to_company' => 'nullable|string',
            'declaration_agreement' => 'nullable|boolean',
            'declaration_date' => 'nullable|date',
            // Nested dynamic inputs validation
            'profile_image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048', // Validasi gambar profil
            'dependents' => 'nullable|array',
            'dependents.*.name' => 'nullable|string|max:255',
            'dependents.*.relationship' => 'nullable|string|max:100',
            'dependents.*.gender' => 'nullable|in:L,P',
            'dependents.*.place_of_birth' => 'nullable|string|max:100',
            'dependents.*.date_of_birth' => 'nullable|date',
            'dependents.*.education' => 'nullable|string|max:100',
            'dependents.*.occupation' => 'nullable|string|max:100',

            'family_members' => 'nullable|array',
            'family_members.*.name' => 'nullable|string|max:255',
            'family_members.*.relationship' => 'nullable|string|max:100',
            'family_members.*.gender' => 'nullable|in:L,P',
            'family_members.*.place_of_birth' => 'nullable|string|max:100',
            'family_members.*.date_of_birth' => 'nullable|date',
            'family_members.*.education' => 'nullable|string|max:100',
            'family_members.*.occupation' => 'nullable|string|max:100',

            'contact_persons' => 'nullable|array',
            'contact_persons.*.type' => 'nullable|in:Keluarga,Teman',
            'contact_persons.*.name' => 'nullable|string|max:255',
            'contact_persons.*.gender' => 'nullable|in:L,P',
            'contact_persons.*.address' => 'nullable|string',
            'contact_persons.*.phone_no' => 'nullable|string|max:20',
            'contact_persons.*.relationship' => 'nullable|string|max:100',
            'contact_persons.*.occupation' => 'nullable|string|max:100',

            'education_history' => 'nullable|array',
            'education_history.*.level_of_education' => 'nullable|string|max:100',
            'education_history.*.institution' => 'nullable|string|max:255',
            'education_history.*.period_start_year' => 'nullable|integer|min:1900|max:' . date('Y'),
            'education_history.*.period_end_year' => 'nullable|integer|min:1900|max:' . date('Y'),
            'education_history.*.major' => 'nullable|string|max:255',
            'education_history.*.grade' => 'nullable|string|max:50',

            'organizational_experience' => 'nullable|array',
            'organizational_experience.*.organization_name' => 'nullable|string|max:255',
            'organizational_experience.*.title_in_organization' => 'nullable|string|max:255',
            'organizational_experience.*.period' => 'nullable|string|max:100',

            'training_courses' => 'nullable|array',
            'training_courses.*.training_course_name' => 'nullable|string|max:255',
            'training_courses.*.year' => 'nullable|integer|min:1900|max:' . date('Y'),
            'training_courses.*.held_by' => 'nullable|string|max:255',
            'training_courses.*.grade' => 'nullable|string|max:50',

            'languages' => 'nullable|array',
            'languages.*.language_name' => 'nullable|string|max:100',
            'languages.*.listening_proficiency' => 'nullable|in:Baik Sekali,Baik,Cukup,Kurang',
            'languages.*.reading_proficiency' => 'nullable|in:Baik Sekali,Baik,Cukup,Kurang',
            'languages.*.speaking_proficiency' => 'nullable|in:Baik Sekali,Baik,Cukup,Kurang',
            'languages.*.written_proficiency' => 'nullable|in:Baik Sekali,Baik,Cukup,Kurang',

            'computer_skills' => 'nullable|array',
            'computer_skills.*.skill_name' => 'nullable|string|max:100',
            'computer_skills.*.proficiency' => 'nullable|in:Baik Sekali,Baik,Cukup,Kurang',

            'publications' => 'nullable|array',
            'publications.*.title' => 'nullable|string', // Kolom ini TEXT di DB
            'publications.*.type' => 'nullable|string|max:100',

            'work_experience' => 'nullable|array',
            'work_experience.*.company_name' => 'nullable|string|max:255',
            'work_experience.*.period_start_date' => 'nullable|date',
            'work_experience.*.period_end_date' => 'nullable|date',
            'work_experience.*.company_address' => 'nullable|string',
            'work_experience.*.company_phone_number' => 'nullable|string|max:20',
            'work_experience.*.first_role_title' => 'nullable|string|max:255',
            'work_experience.*.last_role_title' => 'nullable|string|max:255',
            'work_experience.*.direct_supervisor_name' => 'nullable|string|max:255',
            'work_experience.*.resignation_reason' => 'nullable|string',
            'work_experience.*.last_salary' => 'nullable|string|max:100',

            'work_achievements' => 'nullable|array',
            'work_achievements.*.achievement_description' => 'nullable|string',
            'work_achievements.*.year' => 'nullable|integer|min:1900|max:' . date('Y'),

            // Health Declaration is hasOne, so directly on applicantData validation
            'weight_kg' => 'nullable|numeric|min:0',
            'height_cm' => 'nullable|numeric|min:0',
            'has_medical_condition' => 'nullable|boolean',
            'medical_condition_explanation' => 'nullable|string|required_if:has_medical_condition,1',
            'resigned_due_to_health' => 'nullable|boolean',
            'resigned_due_to_health_explanation' => 'nullable|string|required_if:resigned_due_to_health,1',
            'failed_pre_employment_exam' => 'nullable|boolean',
            'failed_pre_employment_exam_explanation' => 'nullable|string|required_if:failed_pre_employment_exam,1',
            'undergoing_treatment_or_surgery' => 'nullable|boolean',
            'treatment_or_surgery_explanation' => 'nullable|string|required_if:undergoing_treatment_or_surgery,1',
            'under_medical_supervision' => 'nullable|boolean',
            'medical_supervision_explanation' => 'nullable|string|required_if:under_medical_supervision,1',
            'on_regular_medication' => 'nullable|boolean',
            'regular_medication_explanation' => 'nullable|string|required_if:on_regular_medication,1',
            'has_allergies' => 'nullable|boolean',
            'allergies_explanation' => 'nullable|string|required_if:has_allergies,1',
            'absent_due_to_health_12_months' => 'nullable|boolean',
            'absent_due_to_health_explanation' => 'nullable|string|required_if:absent_due_to_health_12_months,1',
            'had_accident' => 'nullable|boolean',
            'accident_explanation' => 'nullable|string|required_if:had_accident,1',
            'is_pregnant' => 'nullable|boolean',
            'pregnancy_week' => 'nullable|integer|min:1|required_if:is_pregnant,1',
            'health_declaration_agreed' => 'nullable|boolean', // This seems like the `declaration_agreement` from main table
            'health_declaration_date' => 'nullable|date', // This seems like `declaration_date` from main table
        ];
    }

    /**
     * Syncs nested data for an applicant.
     * This method will DELETE all old nested records and RECREATE them from request data.
     * Use with caution, ensure you have a good reason to delete all old records.
     */
    protected function syncApplicantNestedData(Request $request, Applicant $applicant)
    {
        // Helper to sync hasMany relationships (delete all old, create new ones)
        // This function is now reusable for individual section saves.
        // It's also renamed to avoid confusion with `syncSectionHasMany` which is used for individual sections.
        $this->syncAllDynamicSections($applicant, $request);

        // Health Declaration (hasOne relationship)
        // This needs specific handling as it's not a dynamic list but a single related record.
        $healthData = $request->only([
            'weight_kg',
            'height_cm',
            'has_medical_condition',
            'medical_condition_explanation',
            'resigned_due_to_health',
            'resigned_due_to_health_explanation',
            'failed_pre_employment_exam',
            'failed_pre_employment_exam_explanation',
            'undergoing_treatment_or_surgery',
            'treatment_or_surgery_explanation',
            'under_medical_supervision',
            'medical_supervision_explanation',
            'on_regular_medication',
            'regular_medication_explanation',
            'has_allergies',
            'allergies_explanation',
            'absent_due_to_health_12_months',
            'absent_due_to_health_explanation',
            'had_accident',
            'accident_explanation',
            'is_pregnant',
            'pregnancy_week' // Removed declaration_agreed and declaration_date as they are in Applicant model
        ]);
        // Handle booleans for health data
        $healthBooleanFields = [
            'has_medical_condition',
            'resigned_due_to_health',
            'failed_pre_employment_exam',
            'undergoing_treatment_or_surgery',
            'under_medical_supervision',
            'on_regular_medication',
            'has_allergies',
            'absent_due_to_health_12_months',
            'had_accident',
            'is_pregnant',
        ];
        foreach ($healthBooleanFields as $field) {
            $healthData[$field] = $request->has($field) ? 1 : 0;
        }

        if (array_filter($healthData)) { // Only create/update if there's actual data
            $applicant->healthDeclaration()->updateOrCreate(
                ['applicant_id' => $applicant->id], // Find by applicant_id
                $healthData
            );
        } else if ($applicant->healthDeclaration) {
            $applicant->healthDeclaration()->delete(); // Delete if all fields are empty
        }
    }

    /**
     * Helper to sync all dynamic hasMany relationships.
     */
    protected function syncAllDynamicSections(Applicant $applicant, Request $request)
    {
        $dynamicSectionsMapping = [
            'dependents' => [
                'relation' => 'dependents',
                'fields' => ['name', 'relationship', 'gender', 'place_of_birth', 'date_of_birth', 'education', 'occupation']
            ],
            'family_members' => [
                'relation' => 'familyMembers',
                'fields' => ['name', 'relationship', 'gender', 'place_of_birth', 'date_of_birth', 'education', 'occupation']
            ],
            'education_history' => [
                'relation' => 'educationHistory',
                'fields' => ['level_of_education', 'institution', 'period_start_year', 'period_end_year', 'major', 'grade']
            ],
            'organizational_experience' => [
                'relation' => 'organizationalExperience',
                'fields' => ['organization_name', 'title_in_organization', 'period']
            ],
            'training_courses' => [
                'relation' => 'trainingCourses',
                'fields' => ['training_course_name', 'year', 'held_by', 'grade']
            ],
            'languages' => [
                'relation' => 'languages',
                'fields' => ['language_name', 'listening_proficiency', 'reading_proficiency', 'speaking_proficiency', 'written_proficiency']
            ],
            'computer_skills' => [
                'relation' => 'computerSkills',
                'fields' => ['skill_name', 'proficiency']
            ],
            'publications' => [
                'relation' => 'publications',
                'fields' => ['title', 'type']
            ],
            'work_experience' => [
                'relation' => 'workExperience',
                'fields' => ['company_name', 'period_start_date', 'period_end_date', 'company_address', 'company_phone_number', 'first_role_title', 'last_role_title', 'direct_supervisor_name', 'resignation_reason', 'last_salary']
            ],
            'work_achievements' => [
                'relation' => 'workAchievements',
                'fields' => ['achievement_description', 'year']
            ],
        ];

        foreach ($dynamicSectionsMapping as $requestKey => $map) {
            $relationName = $map['relation'];
            $fieldsToCreate = $map['fields'];

            $this->syncSectionHasMany($applicant, $relationName, $request->input($requestKey), $fieldsToCreate);
        }
        $this->syncFixedContactPersons($applicant, $request->input('fixed_contact_persons'));
        $healthData = $request->only([
            'weight_kg',
            'height_cm',
            'has_medical_condition',
            'medical_condition_explanation',
            'resigned_due_to_health',
            'resigned_due_to_health_explanation',
            'failed_pre_employment_exam',
            'failed_pre_employment_exam_explanation',
            'undergoing_treatment_or_surgery',
            'treatment_or_surgery_explanation',
            'under_medical_supervision',
            'medical_supervision_explanation',
            'on_regular_medication',
            'regular_medication_explanation',
            'has_allergies',
            'allergies_explanation',
            'absent_due_to_health_12_months',
            'absent_due_to_health_explanation',
            'had_accident',
            'accident_explanation',
            'is_pregnant',
            'pregnancy_week'
        ]);
        $healthBooleanFields = [
            'has_medical_condition',
            'resigned_due_to_health',
            'failed_pre_employment_exam',
            'undergoing_treatment_or_surgery',
            'under_medical_supervision',
            'on_regular_medication',
            'has_allergies',
            'absent_due_to_health_12_months',
            'had_accident',
            'is_pregnant',
        ];
        foreach ($healthBooleanFields as $field) {
            $healthData[$field] = $request->has($field) ? 1 : 0;
        }

        if (array_filter($healthData)) {
            $applicant->healthDeclaration()->updateOrCreate(
                ['applicant_id' => $applicant->id],
                $healthData
            );
        } else if ($applicant->healthDeclaration) {
            $applicant->healthDeclaration()->delete();
        }
    }
}