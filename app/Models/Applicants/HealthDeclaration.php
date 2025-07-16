<?php

namespace App\Models\Applicants;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HealthDeclaration extends Model
{
    use HasFactory;

    protected $table = 'health_declarations';

    protected $primaryKey = 'applicant_id'; // Kunci utama adalah foreign key
    public $incrementing = false; // Karena primary key bukan auto-increment

    protected $fillable = [
        'applicant_id',
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
        'health_declaration_agreed',
        'health_declaration_date',
    ];

    protected $casts = [
        'has_medical_condition' => 'boolean',
        'resigned_due_to_health' => 'boolean',
        'failed_pre_employment_exam' => 'boolean',
        'undergoing_treatment_or_surgery' => 'boolean',
        'under_medical_supervision' => 'boolean',
        'on_regular_medication' => 'boolean',
        'has_allergies' => 'boolean',
        'absent_due_to_health_12_months' => 'boolean',
        'had_accident' => 'boolean',
        'is_pregnant' => 'boolean',
        'health_declaration_agreed' => 'boolean',
        'health_declaration_date' => 'date',
    ];

    /**
     * Get the applicant that owns the health declaration.
     */
    public function applicant()
    {
        return $this->belongsTo(Applicant::class, 'applicant_id');
    }
}