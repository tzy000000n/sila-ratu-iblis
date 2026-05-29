<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $email = $request->input('email');
        $password = $request->input('password');

        // Hardcoded credentials
        if ($email === 'tupaikidal' && $password === 'Kambingguling_001') {
            session(['isAuthenticated' => true]);
            session(['user' => 'Raka Pratama']);
            return redirect()->route('dashboard');
        }

        return redirect()->route('login')->with('error', 'ID/Email atau Password salah. Silakan coba lagi.');
    }

    public function showRegisterForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        // For demo: just log them in after "registering"
        $name = $request->input('name');
        session(['isAuthenticated' => true]);
        session(['user' => $name]);
        return redirect()->route('dashboard');
    }

    public function logout()
    {
        session()->forget('isAuthenticated');
        session()->forget('user');
        return redirect()->route('login');
    }
}
