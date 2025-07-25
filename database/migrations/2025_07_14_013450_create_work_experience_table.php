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
        Schema::create('work_experience', function (Blueprint $table) {
            $table->id();
            $table->foreignId('applicant_id')->constrained('applicants')->onDelete('cascade');
            $table->string('company_name', 255)->nullable();
            $table->date('period_start_date')->nullable();
            $table->date('period_end_date')->nullable();
            $table->text('company_address')->nullable();
            $table->string('company_phone_number', 20)->nullable();
            $table->string('first_role_title', 255)->nullable();
            $table->string('last_role_title', 255)->nullable();
            $table->string('direct_supervisor_name', 255)->nullable();
            $table->text('resignation_reason')->nullable();
            $table->string('last_salary', 100)->nullable();
            $table->longText('essay')->nullable();
            $table->string(column: 'structure', length: 100)->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('work_experience');
    }
};
