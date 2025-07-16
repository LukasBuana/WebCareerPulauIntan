<?php

namespace App\Models\Applicants;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrganizationalExperience extends Model
{
    use HasFactory;

    protected $table = 'organizational_experience';

    protected $fillable = [
        'applicant_id',
        'organization_name',
        'title_in_organization',
        'period',
    ];

    /**
     * Get the applicant that owns the organizational experience.
     */
    public function applicant()
    {
        return $this->belongsTo(Applicant::class, 'applicant_id');
    }
}