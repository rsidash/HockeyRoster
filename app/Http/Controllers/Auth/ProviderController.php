<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Laravel\Socialite\Facades\Socialite;

class ProviderController extends Controller
{
    public function redirect()
    {
        return Socialite::driver('google')->redirect();
    }

    public function callback()
    {
        $googleUser = Socialite::driver('google')->user();

        $user = User::updateOrCreate([
            'email' => $googleUser->getEmail(),
        ], [
            'password' => bcrypt(Str::random(16)),
            'google_token' => $googleUser->token,
        ]);

        Auth::login($user);

        if (!$user->hasVerifiedEmail()) {
            event(new Registered($user));
            return redirect()->route('verification.notice')->with('status', 'Письмо с подтверждением регистрации отправлено на указанную Вами почту');
        }

        return redirect('/');
    }
}
