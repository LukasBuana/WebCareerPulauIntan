<?php

// bootstrap/app.php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        // Ini adalah tempat Anda mendaftarkan alias middleware Anda
        $middleware->alias([
            'admin' => \App\Http\Middleware\AdminMiddleware::class,
            // Middleware Laravel default lainnya (auth, guest, dll) sudah ada di sini
            // atau ditangani secara otomatis oleh Laravel itu sendiri.
        ]);

        // Jika Anda memiliki middleware grup, Anda juga dapat menentukannya di sini
        // $middleware->web(append: [
        //     \App\Http\Middleware\TrustProxies::class,
        // ]);

        // Middleware global (jika ada) dapat didaftarkan di sini
        // $middleware->global([
        //     // \App\Http\Middleware\ExampleGlobalMiddleware::class,
        // ]);

    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();