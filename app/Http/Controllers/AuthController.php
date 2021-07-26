<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\RegisterRequest;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

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
}
