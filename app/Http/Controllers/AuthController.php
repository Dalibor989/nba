<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\RegisterRequest;
use Illuminate\Auth\Events\Registered;
use Illuminate\Foundation\Auth\EmailVerificationRequest;

class AuthController extends Controller
{
    public function getRegisterForm()
    {
        return view('auth.register');
    }

    public function register(RegisterRequest $request)
    {
        $data = $request->validated();
        $data['password'] = Hash::make($data['password']);

        $user= User::create($data);

        event(new Registered($user));

        auth()->login($user);

        return redirect('/');
    }

    public function getLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only(['email', 'password']);

        if(auth()->attempt($credentials)) {
            return redirect('/');
        }

        return back()->withErrors(['password' => 'Error, invalid password']);
    }

    public function logout() {
        auth()->logout();

        return back();
    }

    public function getEmailVerificationNotice()
    {
        return view('auth.verify-email');
    }

    public function verifyEmail(EmailVerificationRequest $request)
    {
        $request->fulfill();
        return redirect('/');
    }
}
