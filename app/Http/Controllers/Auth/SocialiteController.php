<?php

// app/Http/Controllers/Auth/SocialiteController.php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
// Hapus baris ini: use App\Providers\RouteServiceProvider; // HAPUS BARIS INI
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Log; // Tambahkan ini untuk Log

class SocialiteController extends Controller
{
    /**
     * Redirect the user to the Google authentication page.
     */
    public function redirect(): RedirectResponse
    {
        return Socialite::driver('google')->redirect();
    }

    /**
     * Handle the Google authentication callback.
     */
    public function callback(): RedirectResponse
    {
        try {
            $googleUser = Socialite::driver('google')->user();

            // Find user by Google ID or Email
            $user = User::where('google_id', $googleUser->getId())
                        ->orWhere('email', $googleUser->getEmail())
                        ->first();

            // If user exists, update their details and log them in
            if ($user) {
                // Update Google ID if found by email but not Google ID
                if (is_null($user->google_id)) {
                    $user->google_id = $googleUser->getId();
                }
                $user->google_avatar = $googleUser->getAvatar();
                 if (is_null($user->email_verified_at)) {
                    $user->email_verified_at = now();
                }
                $user->save();
            } else {
                // If user does not exist, create a new one
                $user = User::create([
                    'name' => $googleUser->getName(),
                    'email' => $googleUser->getEmail(),
                    'google_id' => $googleUser->getId(),
                    'google_avatar' => $googleUser->getAvatar(),
                    'password' => null, 
                    'role' => 'user',
                    'email_verified_at' => now(),
                ]);
            }

            Auth::login($user, true); // true untuk 'remember me'

            
            // --- LOGIKA REDIREKSI BERDASARKAN ROLE UNTUK LOGIN GOOGLE ---
            if ($user->role === 'admin') {
                return redirect()->intended(route('admin.index', absolute: false)); // Menggunakan admin.index
            }

            // Default redirection untuk user biasa (termasuk yang baru daftar via Google)
            return redirect()->intended(route('dashboard', absolute: false));

        } catch (\Exception $e) {
            // Handle exceptions (e.g., connection issues, user cancels)
            // Log the error for debugging
            Log::error('Google Auth Error: ' . $e->getMessage()); // Menggunakan Log facade yang diimpor

            // Redirect back to login with an error message
            return redirect()->route('login')->withErrors(['google_auth' => 'Could not sign in with Google. Please try again.']);
        }
    }
}