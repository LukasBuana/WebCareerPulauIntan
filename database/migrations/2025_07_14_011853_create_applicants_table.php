<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('applicants', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->unique()->constrained('users')->onDelete('set null'); // Menggunakan foreignId Laravel
            $table->string('full_name', 255)->nullable(false); // NOT NULL di SQL
            $table->enum('gender', ['L', 'P'])->nullable(false); // NOT NULL di SQL
            $table->string('place_of_birth', 100)->nullable();
            $table->date('date_of_birth')->nullable();
            $table->text('permanent_address_ktp')->nullable();
            $table->string('permanent_postal_code_ktp', 10)->nullable();
            $table->text('current_address')->nullable();
            $table->string('current_postal_code', 10)->nullable();
            $table->string('phone_number', 20)->nullable();
            $table->string('mobile_phone_number', 20)->nullable();
            $table->string('email_address', 100)->unique()->nullable(); // Unique di SQL
            $table->text('parents_address')->nullable();
            $table->string('parents_postal_code', 10)->nullable();
            $table->string('religion', 50)->nullable();
            $table->string('id_passport_number', 50)->unique()->nullable(); // Unique di SQL
            $table->enum('blood_type', ['O', 'AB', 'A', 'B'])->nullable();
            $table->enum('marital_status', ['Belum menikah', 'Menikah', 'Janda-Duda'])->nullable();
            $table->date('married_since_date')->nullable();
            $table->date('widowed_since_date')->nullable();
            $table->string('license_number', 50)->nullable();
            $table->date('license_expiry_date')->nullable();
            $table->string('bpjs_number', 50)->nullable();
            $table->string('npwp_number', 50)->nullable();
            $table->string('job_vacancy_source', 100)->nullable();

            // Emergency Contact
            $table->string('emergency_contact_name', 255)->nullable();
            $table->text('emergency_contact_address')->nullable();
            $table->string('emergency_contact_phone', 20)->nullable();
            $table->string('emergency_contact_relationship', 100)->nullable();

            // Last Job Summary (from VIII. PENGALAMAN KERJA)
            $table->text('last_job_duties_responsibilities')->nullable();
            $table->text('last_job_org_structure')->nullable();

            // X. LAIN-LAIN (Other) fields
            $table->boolean('applied_before')->nullable();
            $table->date('applied_before_date')->nullable();
            $table->string('applied_before_position', 100)->nullable();
            $table->boolean('applying_other_company')->nullable();
            $table->text('other_company_position')->nullable();
            $table->boolean('under_contract')->nullable();
            $table->boolean('has_part_time_job')->nullable();
            $table->text('part_time_job_details')->nullable();
            $table->boolean('object_previous_employer_contact')->nullable();
            $table->boolean('has_acquaintance_in_company')->nullable();
            $table->text('acquaintance_details')->nullable();
            $table->boolean('undergone_psych_exam')->nullable();
            $table->text('psych_exam_details')->nullable();
            $table->boolean('involved_police_case')->nullable();
            $table->boolean('willing_to_be_located_as_needed')->nullable();
            $table->boolean('accept_company_salary_standard')->nullable();
            $table->boolean('comply_company_rules')->nullable();
            $table->boolean('willing_to_take_psych_exam')->nullable();
            $table->boolean('willing_to_take_medical_checkup')->nullable();
            $table->boolean('willing_to_work_out_of_town')->nullable();
            $table->boolean('willing_to_transfer')->nullable();
            $table->boolean('willing_to_be_demoted')->nullable();
            $table->string('application_influenced_by', 255)->nullable();
            $table->text('mastered_assignments_competencies')->nullable();
            $table->string('desired_position', 100)->nullable();
            $table->string('expected_salary', 50)->nullable();
            $table->text('why_interested_in_company')->nullable();
            $table->text('unsuitable_jobs')->nullable();
            $table->date('start_work_date_if_accepted')->nullable();
            $table->text('contribution_to_company')->nullable();
            $table->boolean('declaration_agreement')->default(false)->nullable(false);
            $table->date('declaration_date')->nullable();

            $table->timestamps(); // Laravel handles created_at and updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('applicants');
    }
};
