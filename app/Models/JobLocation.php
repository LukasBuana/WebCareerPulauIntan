<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobLocation extends Model
{
    use HasFactory;

    protected $table = 'job_locations';

    protected $fillable = [
        'name',
        'city',
        'province',
        'country'
    ];

    /**
     * Get the jobs for the job location.
     */
    public function jobs()
    {
        return $this->hasMany(Job::class, 'job_location_id');
    }
}