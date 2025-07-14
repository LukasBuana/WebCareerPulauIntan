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
        Schema::create('languages', function (Blueprint $table) {
            $table->id();
            $table->foreignId('applicant_id')->constrained('applicants')->onDelete('cascade');
            $table->string('language_name', 100)->nullable();
            $table->enum('listening_proficiency', ['Baik Sekali', 'Baik', 'Cukup', 'Kurang'])->nullable();
            $table->enum('reading_proficiency', ['Baik Sekali', 'Baik', 'Cukup', 'Kurang'])->nullable();
            $table->enum('speaking_proficiency', ['Baik Sekali', 'Baik', 'Cukup', 'Kurang'])->nullable();
            $table->enum('written_proficiency', ['Baik Sekali', 'Baik', 'Cukup', 'Kurang'])->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('languages');
    }
};
