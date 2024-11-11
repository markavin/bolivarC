<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;



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
    public function showResetPasswordForm()
    {
        return view('auth.reset-password'); // Pastikan Anda memiliki file blade ini
    }

    // Fungsi untuk menangani permintaan reset password
    public function resetPassword(Request $request)
    {
        /**
         * @var \App\Models\Pengguna
         */
        $user = Auth::user();

        // Validasi form
        $validator = Validator::make(
            $request->all(),
            [
                'currentPassword' => 'required',
                'newPassword' => 'required|confirmed|min:8',
            ],
            [
                'currentPassword.required' => 'Masukkan password lama Anda.',
                'newPassword.required' => 'Masukkan password baru.',
                'newPassword.confirmed' => 'Password konfirmasi tidak cocok.',
                'newPassword.min' => 'Password minimal 8 karakter.',
            ]
        );

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        // Verifikasi password lama
        if (!Hash::check($request->input('currentPassword'), $user->password)) {
            return back()->withErrors(['currentPassword' => 'Password lama salah.']);
        }

        // Simpan password baru setelah berhasil verifikasi
        $user->password = Hash::make($request->input('newPassword'));
        $user->save();

        // Tampilkan pesan sukses dan redirect ke halaman login atau dashboard
        Session::flash('success', 'Password berhasil diubah.');
        return redirect()->route('login'); // Atau arahkan ke halaman yang sesuai
    }
}
