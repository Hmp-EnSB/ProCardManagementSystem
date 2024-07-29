<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class GoogleAuthController extends Controller
{
    public function redirect()
    {
        return Socialite::driver('google')->redirect();
    }

    public function callbackGoogle()
    {  
        \Config::set('services.google.curl_options', [
            CURLOPT_SSL_VERIFYPEER => false,
        ]);

        try {
            $google_user = Socialite::driver('google')->user();

            $user = User::where('google_id', $google_user->getId())
                        ->orWhere('email', $google_user->getEmail())
                        ->first();

            if (!$user) {
                $user = User::create([
                    'name' => $google_user->getName(),
                    'email' => $google_user->getEmail(),
                    'google_id' => $google_user->getId(),
                ]);
            } else {
                // Update Google ID if it's not set
                if (!$user->google_id) {
                    $user->update(['google_id' => $google_user->getId()]);
                }
            }

            Auth::login($user);
            return redirect()->intended('dashboard');

        } catch (\Throwable $th) {
            return redirect()->route('login')->with('error', 'Google authentication failed: ' . $th->getMessage());
        }
    }
}
