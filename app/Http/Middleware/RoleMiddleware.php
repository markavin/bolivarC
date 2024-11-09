<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next, $role)
    {
        $user = Auth::guard('web')->user();

        // Cek apakah role pengguna sesuai dengan yang diizinkan
        if ($user && $user->id_role == $role) {
            return $next($request);
        }

        // Jika tidak, arahkan ke halaman error atau login
        return redirect()->route('login')->withErrors([
            'loginError' => 'Anda tidak memiliki izin untuk mengakses halaman ini.'
        ]);
    }
}

