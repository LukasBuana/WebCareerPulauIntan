<?php

namespace App\Models\Applicants;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactPerson extends Model
{
    use HasFactory;

    protected $table = 'contact_persons';

    protected $fillable = [
        'applicant_id',
        'type',
        'name',
        'gender',
        'address',
        'phone_no',
        'relationship',
        'occupation',
    ];

    /**
     * Get the applicant that owns the contact person.
     */
    public function applicant()
    {
        return $this->belongsTo(Applicant::class, 'applicant_id');
    }
}