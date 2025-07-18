<?php

namespace App\Http\Controllers\Admin;
use App\Models\Applicants\Applicant;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminApplicantController extends Controller
{
   public function index() {

     $applicants = Applicant::latest()->paginate(10);
    return view('admin.applicants.index', compact('applicants'));
    }
     public function show(Applicant $applicant)
    {
        // Load semua relasi yang mungkin ada untuk detail yang lengkap
        $applicant->load([
            'dependents',
            'familyMembers',
            'contactPersons',
            'educationHistory',
            'organizationalExperience',
            'trainingCourses',
            'languages',
            'computerSkills',
            'publications',
            'workExperience',
            'workAchievements',
            'healthDeclaration',
            // 'user' jika Anda ingin menampilkan detail user yang terhubung
        ]);

        return view('admin.applicants.show', compact('applicant'));
    }
}
