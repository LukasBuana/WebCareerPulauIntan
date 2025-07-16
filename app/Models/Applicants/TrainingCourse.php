<?php

namespace App\Models\Applicants;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TrainingCourse extends Model
{
    use HasFactory;

    protected $table = 'training_courses';

    protected $fillable = [
        'applicant_id',
        'training_course_name',
        'year',
        'held_by',
        'grade',
    ];

    /**
     * Get the applicant that owns the training course.
     */
    public function applicant()
    {
        return $this->belongsTo(Applicant::class, 'applicant_id');
    }
}