<?php

namespace App\Models\Applicants;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ComputerSkill extends Model
{
    use HasFactory;

    protected $table = 'computer_skills';

    protected $fillable = [
        'applicant_id',
        'skill_name',
        'proficiency',
    ];

    /**
     * Get the applicant that owns the computer skill.
     */
    public function applicant()
    {
        return $this->belongsTo(Applicant::class, 'applicant_id');
    }
}