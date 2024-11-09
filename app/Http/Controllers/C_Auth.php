<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class C_Auth extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login'); // Form login
    }

    public function login(Request $request)
    {
        // Ambil username dan password dari input
        $credentials = $request->only('username', 'password');

        // Coba autentikasi menggunakan guard 'web'

        // Cek role_id dan arahkan pengguna sesuai hak akses
        if (Auth::guard('web')->attempt($credentials)) {
            // Ambil data pengguna yang login
            $user = Auth::guard('web')->user();

            // Simpan data user ke session
            session(['user' => $user]);

            // Arahkan ke dashboard sesuai role
            return redirect()->route('dashboard.index');
        } else {
            // Role ID lain atau tidak memiliki izin akses
            Auth::logout(); // Logout pengguna
            return redirect()->route('login')->withErrors([
                'loginError' => 'Username/Password Incorrect.'
            ]);
        }


        // Jika autentikasi gagal
        return back()->withErrors(['loginError' => 'Username/Password Incorrect.']);
    }

    public function logout()
    {
        Auth::guard('web')->logout();
        return redirect()->route('login');
    }
}
