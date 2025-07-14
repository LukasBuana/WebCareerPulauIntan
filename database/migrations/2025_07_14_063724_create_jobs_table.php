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
        Schema::create('jobs', function (Blueprint $table) {
            $table->id(); // INT AUTO_INCREMENT PRIMARY KEY
            $table->string('title', 255)->nullable(false); // NOT NULL
            $table->string('slug', 255)->unique()->nullable(false); // NOT NULL UNIQUE

            // Foreign Keys
            $table->foreignId('job_category_id')->constrained('job_categories')->onDelete('restrict');
            $table->foreignId('job_location_id')->constrained('job_locations')->onDelete('restrict');
            $table->foreignId('job_type_id')->nullable()->constrained('job_types')->onDelete('set null'); // NULLABLE, ON DELETE SET NULL
            $table->foreignId('posted_by_user_id')->nullable()->constrained('users')->onDelete('set null'); // NULLABLE, ON DELETE SET NULL

            $table->longText('description')->nullable(false); // NOT NULL
            $table->longText('responsibilities')->nullable();
            $table->longText('qualifications')->nullable();
            $table->decimal('min_salary', 10, 2)->nullable();
            $table->decimal('max_salary', 10, 2)->nullable();
            $table->string('salary_currency', 10)->default('IDR');
            $table->enum('experience_level', ['Entry Level', 'Junior', 'Mid', 'Senior', 'Lead', 'Manager'])->nullable();
            $table->string('education_level', 100)->nullable();
            $table->date('application_deadline')->nullable();
            $table->enum('status', ['Published', 'Draft', 'Closed', 'Archived'])->default('Draft');
            $table->boolean('is_featured')->default(false);
            $table->integer('views_count')->default(0);
            $table->timestamps(); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jobs');
    }
};
