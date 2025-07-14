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
        Schema::create('job_applications', function (Blueprint $table) {
            $table->id(); // INT AUTO_INCREMENT PRIMARY KEY
            $table->foreignId('job_id')->nullable(false)->constrained('jobs')->onDelete('cascade'); // NOT NULL
            $table->foreignId('applicant_id')->nullable(false)->constrained('applicants')->onDelete('cascade'); // NOT NULL
            $table->timestamp('application_date')->useCurrent(); // DEFAULT CURRENT_TIMESTAMP
            $table->enum('status', ['Applied', 'Reviewed', 'Interviewed', 'Offered', 'Rejected', 'Hired'])->default('Applied');
            $table->longText('cover_letter')->nullable();
            $table->string('resume_path', 255)->nullable(); // Path ke file CV di storage
            $table->text('additional_files_path')->nullable(); // JSON dari array paths jika banyak file
            $table->text('remarks')->nullable(); // Catatan internal admin/HR
            $table->timestamps(); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('job_applications');
    }
};
