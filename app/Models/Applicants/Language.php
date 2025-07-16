<?php

namespace App\Models\Applicants;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    use HasFactory;

    protected $table = 'languages';

    protected $fillable = [
        'applicant_id',
        'language_name',
        'listening_proficiency',
        'reading_proficiency',
        'speaking_proficiency',
        'written_proficiency',
    ];

    /**
     * Get the applicant that owns the language proficiency.
     */
    public function applicant()
    {
        return $this->belongsTo(Applicant::class, 'applicant_id');
    }
}