<?php

namespace App\Models\Applicants;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WorkAchievement extends Model
{
    use HasFactory;

    protected $table = 'work_achievements';

    protected $fillable = [
        'applicant_id',
        'achievement_description',
        'achievement_year',
    ];

    /**
     * Get the applicant that owns the work achievement.
     */
    public function applicant()
    {
        return $this->belongsTo(Applicant::class, 'applicant_id');
    }
}