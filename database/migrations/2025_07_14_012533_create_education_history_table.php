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
        Schema::create('education_history', function (Blueprint $table) {
             $table->id();
            $table->foreignId('applicant_id')->constrained('applicants')->onDelete('cascade');
            $table->string('level_of_education', 100)->nullable(false);
            $table->string('institution', 255)->nullable();
            $table->year('period_start_year')->nullable();
            $table->year('period_end_year')->nullable();
            $table->string('major', 255)->nullable();
            $table->string('grade', 50)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('education_history');
    }
};
