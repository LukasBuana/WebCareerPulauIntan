<?php

namespace App\Models\Jobs;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobBenefit extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'job_benefits';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'job_id',
        'description',
        'order',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'order' => 'integer',
    ];

    // --- Relasi Eloquent ---

    /**
     * Get the job that owns the benefit.
     */
    public function job()
    {
        return $this->belongsTo(Job::class, 'job_id');
    }
}