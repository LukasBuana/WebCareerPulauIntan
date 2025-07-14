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
        Schema::create('job_locations', function (Blueprint $table) {
            $table->id(); // INT AUTO_INCREMENT PRIMARY KEY
            $table->string('name', 100)->unique()->nullable(false); // NOT NULL UNIQUE
            $table->string('city', 100)->nullable();
            $table->string('province', 100)->nullable();
            $table->string('country', 100)->default('Indonesia');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('job_locations');
    }
};
