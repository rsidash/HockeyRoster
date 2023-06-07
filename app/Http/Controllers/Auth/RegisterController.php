<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function create()
    {
        $countries = [
            (object)[
                'id' => 1,
                'country_code' => 'kz',
                'phone_code' => '+7',
                'name' => 'Казахстан',
            ]
        ];

        return view('auth.register', compact('countries'));
    }

    public function register(UserRequest $request)
    {
        $user = User::create([
            'first_name' => $request->firstName,
            'last_name' => $request->lastName,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect()->route('verification.notice')->with('status', 'Письмо с подтверждением регистрации отправлено на указанную Вами почту');
    }
}
