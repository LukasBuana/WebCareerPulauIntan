<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'jobs'; // Nama tabel yang sesuai dengan konvensi Laravel (plural dari 'Job')

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'title',
        'slug',
        'job_category_id',
        'job_location_id',
        'job_type_id',
        'description',
        'responsibilities',
        'qualifications',
        'min_salary',
        'max_salary',
        'salary_currency',
        'experience_level',
        'education_level',
        'application_deadline',
        'status',
        'is_featured',
        'views_count',
        'posted_by_user_id',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'application_deadline' => 'date', // Mengubah ke objek Carbon secara otomatis
        'is_featured' => 'boolean',
        'min_salary' => 'decimal:2', // Cast sebagai desimal dengan 2 angka di belakang koma
        'max_salary' => 'decimal:2', // Cast sebagai desimal dengan 2 angka di belakang koma
        'views_count' => 'integer',
        'created_at' => 'datetime', // Laravel sudah menangani ini secara default, tapi bisa eksplisit
        'updated_at' => 'datetime', // Laravel sudah menangani ini secara default, tapi bisa eksplisit
    ];

    // --- Definisi Relasi Eloquent ---

    /**
     * Get the category that owns the job.
     */
    public function category()
    {
        return $this->belongsTo(JobCategory::class, 'job_category_id');
    }

    /**
     * Get the location that owns the job.
     */
    public function location()
    {
        return $this->belongsTo(JobLocation::class, 'job_location_id');
    }

    /**
     * Get the job type that owns the job.
     */
    public function type()
    {
        return $this->belongsTo(JobType::class, 'job_type_id');
    }

    /**
     * Get the user who posted the job.
     */
    public function poster()
    {
        return $this->belongsTo(User::class, 'posted_by_user_id');
    }

    /**
     * Get the requirements for the job.
     */
    public function requirements()
    {
        return $this->hasMany(JobRequirement::class, 'job_id');
    }

    /**
     * Get the benefits for the job.
     */
    public function benefits()
    {
        return $this->hasMany(JobBenefit::class, 'job_id');
    }

    /**
     * Get the skills associated with the job.
     */
    public function skills()
    {
        return $this->belongsToMany(Skill::class, 'job_skill_pivot', 'job_id', 'skill_id')
                    ->withTimestamps(); // Jika tabel pivot memiliki created_at/updated_at
    }

    /**
     * Get the applications for the job.
     */
    public function applications()
    {
        return $this->hasMany(JobApplication::class, 'job_id');
    }

    // --- Mutator dan Accessor (Opsional) ---

    /**
     * Set the slug automatically when the title is set.
     * Requires "Illuminate\Support\Str" for slug helper.
     */
    // public function setTitleAttribute($value)
    // {
    //     $this->attributes['title'] = $value;
    //     $this->attributes['slug'] = Str::slug($value);
    // }

    // Jika Anda menambahkan mutator slug, pastikan untuk mengimpor Str facade:
    // use Illuminate\Support\Str;
}