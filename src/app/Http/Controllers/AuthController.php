<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Tymon\JWTAuth\Facades\JWTAuth;


class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('username', 'password');
        if (Auth::attempt($credentials)) {
            // Autenticazione OK
            return redirect()->intended(route('testbreweries'));
        }
        return back()->withErrors(['username' => 'Credenziali non valide']);
    }

    public function logout(Request $request)
    {
        // Handle logout logic here
    }

    public function username()
{
    return 'username';
}
}
