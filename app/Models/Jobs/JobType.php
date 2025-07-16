<?php

namespace App\Models\Jobs;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobType extends Model
{
    use HasFactory;

    protected $table = 'job_types';

    protected $fillable = [
        'name',
    ];

    /**
     * Get the jobs for the job type.
     */
    public function jobs()
    {
        return $this->hasMany(Job::class, 'job_type_id');
    }
}