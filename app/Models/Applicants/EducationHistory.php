<?php

namespace App\Models\Applicants;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EducationHistory extends Model
{
    use HasFactory;

    protected $table = 'education_history';

    protected $fillable = [
        'applicant_id',
        'level_of_education',
        'institution',
        'period_start_year',
        'period_end_year',
        'major',
        'grade',
    ];

    /**
     * Get the applicant that owns the education history.
     */
    public function applicant()
    {
        return $this->belongsTo(Applicant::class, 'applicant_id');
    }
}