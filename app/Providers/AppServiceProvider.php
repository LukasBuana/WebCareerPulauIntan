<?php

namespace App\Providers;
use App\Models\Job; // Import model Job
use Illuminate\Support\Str; // Import Str Facade

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route; // Tambahkan ini jika belum ada


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */

    public const HOME = '/';
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
     public function boot(): void
    {
        // Event listener saat model Job akan dibuat (creating)
        Job::creating(function ($job) {
            // Hanya buat slug jika belum ada (misal, jika diisi manual di form)
            if (empty($job->slug)) {
                $slug = Str::slug($job->title);
                $originalSlug = $slug;
                $count = 1;
                // Pastikan slug unik
                while (Job::where('slug', $slug)->exists()) {
                    $slug = $originalSlug . '-' . $count++;
                }
                $job->slug = $slug;
            }
        });
    }
}
