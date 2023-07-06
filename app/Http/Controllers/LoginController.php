<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('login');
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->only('username', 'password');

        if (Auth::attempt($credentials)) {
            // Jika otentikasi berhasil, redirect ke halaman yang ditentukan
            return redirect()->intended('/dashboard-admin');
        } else {
            // Jika otentikasi gagal, redirect kembali ke halaman login
            return back()->with('loginError', 'Login Failed!');
        }
    }

    public function logout()
    {
        Auth::logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();
        return redirect('/login');
    }
}
