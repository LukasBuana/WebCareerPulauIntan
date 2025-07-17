<?php

namespace App\Models\Applicants;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Jobs\JobApplication;
class Applicant extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'applicants';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'full_name',
        'gender',
        'place_of_birth',
        'date_of_birth',
        'permanent_address_ktp',
        'permanent_postal_code_ktp',
        'current_address',
        'current_postal_code',
        'phone_number',
        'mobile_phone_number',
        'email_address',
        'parents_address',
        'parents_postal_code',
        'religion',
        'id_passport_number',
        'blood_type',
        'marital_status',
        'married_since_date',
        'widowed_since_date',
        'license_number',
        'license_expiry_date',
        'bpjs_number',
        'npwp_number',
        'job_vacancy_source',
        'emergency_contact_name',
        'emergency_contact_address',
        'emergency_contact_phone',
        'emergency_contact_relationship',
        'last_job_duties_responsibilities',
        'last_job_org_structure',
        'applied_before',
        'applied_before_date',
        'applied_before_position',
        'applying_other_company',
        'other_company_position',
        'under_contract',
        'has_part_time_job',
        'part_time_job_details',
        'object_previous_employer_contact',
        'has_acquaintance_in_company',
        'acquaintance_details',
        'undergone_psych_exam',
        'psych_exam_details',
        'involved_police_case',
        'willing_to_be_located_as_needed',
        'accept_company_salary_standard',
        'comply_company_rules',
        'willing_to_take_psych_exam',
        'willing_to_take_medical_checkup',
        'willing_to_work_out_of_town',
        'willing_to_transfer',
        'willing_to_be_demoted',
        'application_influenced_by',
        'mastered_assignments_competencies',
        'desired_position',
        'expected_salary',
        'why_interested_in_company',
        'unsuitable_jobs',
        'start_work_date_if_accepted',
        'contribution_to_company',
        'declaration_agreement',
        'declaration_date',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'date_of_birth' => 'date',
        'married_since_date' => 'date',
        'widowed_since_date' => 'date',
        'license_expiry_date' => 'date',
        'applied_before' => 'boolean',
        'applied_before_date' => 'date',
        'applying_other_company' => 'boolean',
        'under_contract' => 'boolean',
        'has_part_time_job' => 'boolean',
        'object_previous_employer_contact' => 'boolean',
        'has_acquaintance_in_company' => 'boolean',
        'undergone_psych_exam' => 'boolean',
        'involved_police_case' => 'boolean',
        'willing_to_be_located_as_needed' => 'boolean',
        'accept_company_salary_standard' => 'boolean',
        'comply_company_rules' => 'boolean',
        'willing_to_take_psych_exam' => 'boolean',
        'willing_to_take_medical_checkup' => 'boolean',
        'willing_to_work_out_of_town' => 'boolean',
        'willing_to_transfer' => 'boolean',
        'willing_to_be_demoted' => 'boolean',
        'start_work_date_if_accepted' => 'date',
        'declaration_agreement' => 'boolean',
        'declaration_date' => 'date',
    ];

    // --- Relasi Eloquent ---

    /**
     * Get the user that owns the applicant record.
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * Get the dependent family members for the applicant.
     */
    public function dependents()
    {
        return $this->hasMany(Dependent::class, 'applicant_id');
    }

    /**
     * Get the other family members for the applicant.
     */
    public function familyMembers()
    {
        return $this->hasMany(FamilyMember::class, 'applicant_id');
    }

    /**
     * Get the contact persons for the applicant.
     */
    public function contactPersons()
    {
        return $this->hasMany(ContactPerson::class, 'applicant_id');
    }

    /**
     * Get the education history for the applicant.
     */
    public function educationHistory()
    {
        return $this->hasMany(EducationHistory::class, 'applicant_id');
    }

    /**
     * Get the organizational experience for the applicant.
     */
    public function organizationalExperience()
    {
        return $this->hasMany(OrganizationalExperience::class, 'applicant_id');
    }

    /**
     * Get the training and courses for the applicant.
     */
    public function trainingCourses()
    {
        return $this->hasMany(TrainingCourse::class, 'applicant_id');
    }

    /**
     * Get the languages for the applicant.
     */
    public function languages()
    {
        return $this->hasMany(Language::class, 'applicant_id');
    }

    /**
     * Get the computer skills for the applicant.
     */
    public function computerSkills()
    {
        return $this->hasMany(ComputerSkill::class, 'applicant_id');
    }

    /**
     * Get the publications for the applicant.
     */
    public function publications()
    {
        return $this->hasMany(Publication::class, 'applicant_id');
    }

    /**
     * Get the work experience for the applicant.
     */
    public function workExperience()
    {
        return $this->hasMany(WorkExperience::class, 'applicant_id');
    }

    /**
     * Get the work achievements for the applicant.
     */
    public function workAchievements()
    {
        return $this->hasMany(WorkAchievement::class, 'applicant_id');
    }

    /**
     * Get the health declaration for the applicant.
     */
    public function healthDeclaration()
    {
        return $this->hasOne(HealthDeclaration::class, 'applicant_id');
    }

    /**
     * Get the job applications made by the applicant.
     */
    public function jobApplications()
    {
        return $this->hasMany(JobApplication::class, 'applicant_id');
    }
}