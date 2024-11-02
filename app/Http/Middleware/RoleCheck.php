<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RoleCheck
{
    public function handle($request, Closure $next, ...$role)
    {
        // Cek apakah pengguna terautentikasi
        if (!Auth::check()) {
            return redirect()->route('login'); // Atau ganti dengan rute yang sesuai
        }

        // Cek apakah pengguna memiliki salah satu dari peran yang diperbolehkan
        if (!in_array(Auth::user()->role->namaRole, $role)) {
            return redirect()->route('unauthorized'); // Ganti dengan route atau tampilan yang sesuai
        }

        return $next($request);
    }
}