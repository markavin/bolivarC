<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // Method to show the login form
    public function loginForm()
    {
        return view('auth.login'); // Ensure this view file exists at resources/views/auth/login.blade.php
    }

    // Method to handle login requests
    public function login(Request $request)
    {
        // Validate input
        $request->validate([
            'namaPengguna' => 'required',
            'kataSandi' => 'required',
        ]);

        // Credentials for authentication
        $credentials = [
            'namaPengguna' => $request->namaPengguna,
            'password' => $request->kataSandi, // Use 'password' instead of 'kataSandi'
        ];

        if (Auth::attempt($credentials)) {
            $pengguna = Auth::user(); 
    
            if ($pengguna->role->namaRole === 'pemilik') {
                return redirect()->route('dashboard.index');
            } elseif ($pengguna->role->namaRole === 'pegawai') {
                return redirect()->route('dashboard.index');
            }
        }

        return back()->withErrors(['loginError' => 'Username/Password incorrect']);
    }

    // Method to handle logout
    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}