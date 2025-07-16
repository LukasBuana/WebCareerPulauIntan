<?php

namespace App\Models\Applicants;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FamilyMember extends Model
{
    use HasFactory;

    protected $table = 'family_members';

    protected $fillable = [
        'applicant_id',
        'relationship',
        'name',
        'gender',
        'place_of_birth',
        'date_of_birth',
        'education',
        'occupation',
    ];

    protected $casts = [
        'date_of_birth' => 'date',
    ];

    /**
     * Get the applicant that owns the family member.
     */
    public function applicant()
    {
        return $this->belongsTo(Applicant::class, 'applicant_id');
    }
}