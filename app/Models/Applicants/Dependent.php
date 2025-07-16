<?php

namespace App\Models\Applicants;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dependent extends Model
{
    use HasFactory;

    protected $table = 'dependents';

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
     * Get the applicant that owns the dependent.
     */
    public function applicant()
    {
        return $this->belongsTo(Applicant::class, 'applicant_id');
    }
}