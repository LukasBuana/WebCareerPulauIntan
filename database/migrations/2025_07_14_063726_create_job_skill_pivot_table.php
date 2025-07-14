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
        Schema::create('job_skill_pivot', function (Blueprint $table) {
             $table->foreignId('job_id')->nullable(false)->constrained('jobs')->onDelete('cascade'); // NOT NULL
            $table->foreignId('skill_id')->nullable(false)->constrained('skills')->onDelete('cascade'); // NOT NULL
            $table->primary(['job_id', 'skill_id']); // PRIMARY KEY (job_id, skill_id)
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('job_skill_pivot');
    }
};
