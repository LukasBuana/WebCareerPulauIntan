<?php

namespace App\Models\Jobs;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class JobApplication extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'job_applications';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'job_id',
        'applicant_id',
        'application_date',
        'status',
        'cover_letter',
        'resume_path',
        'additional_files_path', // Jika ini disimpan sebagai JSON array paths
        'remarks',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'application_date' => 'datetime',
        'additional_files_path' => 'array', // Jika Anda menyimpan ini sebagai JSON di DB
    ];

    // --- Relasi Eloquent ---

    /**
     * Get the job that the application belongs to.
     */
    public function job()
    {
        return $this->belongsTo(Job::class, 'job_id');
    }

    /**
     * Get the applicant that submitted the application.
     */
    public function applicant()
    {
        return $this->belongsTo(Applicant::class, 'applicant_id');
    }
}