<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    use HasFactory;

    protected $table = 'skills';

    protected $fillable = [
        'name',
    ];

    /**
     * The jobs that have this skill.
     */
    public function jobs()
    {
        return $this->belongsToMany(Job::class, 'job_skill_pivot', 'skill_id', 'job_id')
                    ->withTimestamps();
    }
}