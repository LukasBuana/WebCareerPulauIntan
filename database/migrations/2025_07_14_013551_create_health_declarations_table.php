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
        Schema::create('health_declarations', function (Blueprint $table) {
            $table->foreignId('applicant_id')->primary()->constrained('applicants')->onDelete('cascade');
            $table->decimal('weight_kg', 5, 2)->nullable();
            $table->decimal('height_cm', 5, 2)->nullable();
            $table->boolean('has_medical_condition')->nullable();
            $table->text('medical_condition_explanation')->nullable();
            $table->boolean('resigned_due_to_health')->nullable();
            $table->text('resigned_due_to_health_explanation')->nullable();
            $table->boolean('failed_pre_employment_exam')->nullable();
            $table->text('failed_pre_employment_exam_explanation')->nullable();
            $table->boolean('undergoing_treatment_or_surgery')->nullable();
            $table->text('treatment_or_surgery_explanation')->nullable();
            $table->boolean('under_medical_supervision')->nullable();
            $table->text('medical_supervision_explanation')->nullable();
            $table->boolean('on_regular_medication')->nullable();
            $table->text('regular_medication_explanation')->nullable();
            $table->boolean('has_allergies')->nullable();
            $table->text('allergies_explanation')->nullable();
            $table->boolean('absent_due_to_health_12_months')->nullable();
            $table->text('absent_due_to_health_explanation')->nullable();
            $table->boolean('had_accident')->nullable();
            $table->text('accident_explanation')->nullable();
            $table->boolean('is_pregnant')->nullable();
            $table->integer('pregnancy_week')->nullable();
            $table->boolean('health_declaration_agreed')->default(false)->nullable(false);
            $table->date('health_declaration_date')->nullable();
            $table->timestamps(); // Created_at and Updated_at for this table
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('health_declarations');
    }
};
