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
        Schema::create('job_requirements', function (Blueprint $table) {
            $table->id(); // INT AUTO_INCREMENT PRIMARY KEY
            $table->foreignId('job_id')->nullable(false)->constrained('jobs')->onDelete('cascade'); // NOT NULL
            $table->string('description', 255)->nullable(false); // NOT NULL
            $table->integer('order')->default(0); // `order`
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('job_requirements');
    }
};
