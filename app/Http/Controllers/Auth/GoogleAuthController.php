<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Laravel\Socialite\Facades\Socialite;
use Throwable;

class GoogleAuthController extends Controller
{
    public function redirect(): RedirectResponse
    {
        return Socialite::driver('google')->redirect();
    }

    public function callback(): RedirectResponse
    {
        try {
            $googleUser = Socialite::driver('google')->user();
        } catch (Throwable) {
            return redirect()->route('login')->withErrors([
                'email' => 'Login Google gagal. Sila cuba semula.',
            ]);
        }

        $email = $googleUser->getEmail();

        if (! $email) {
            return redirect()->route('login')->withErrors([
                'email' => 'Akaun Google tidak menyediakan alamat emel.',
            ]);
        }

        $user = User::query()
            ->where('google_id', $googleUser->getId())
            ->orWhere('email', $email)
            ->first();

        $anakKhariahRoleId = Role::query()->where('name', 'Anak Khariah')->value('id');

        if (! $user) {
            $fallbackName = Str::before($email, '@');

            $user = User::query()->create([
                'google_id' => $googleUser->getId(),
                'role_id' => $anakKhariahRoleId,
                'name' => $googleUser->getNickname() ?: $fallbackName,
                'email' => $email,
                'email_verified_at' => now(),
                'password' => Hash::make(Str::random(40)),
            ]);
        } else {
            $user->fill([
                'google_id' => $user->google_id ?: $googleUser->getId(),
                'role_id' => $user->role_id ?: $anakKhariahRoleId,
                'email_verified_at' => $user->email_verified_at ?: now(),
            ]);
            $user->save();
        }

        Auth::login($user, remember: true);

        return redirect()->intended(route('dashboard', absolute: false));
    }
}
