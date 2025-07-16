<?php

namespace App\Models\Applicants;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WorkExperience extends Model
{
    use HasFactory;

    protected $table = 'work_experience';

    protected $fillable = [
        'applicant_id',
        'company_name',
        'period_start_date',
        'period_end_date',
        'company_address',
        'company_phone_number',
        'first_role_title',
        'last_role_title',
        'direct_supervisor_name',
        'resignation_reason',
        'last_salary',
    ];

    protected $casts = [
        'period_start_date' => 'date',
        'period_end_date' => 'date',
    ];

    /**
     * Get the applicant that owns the work experience.
     */
    public function applicant()
    {
        return $this->belongsTo(Applicant::class, 'applicant_id');
    }
}