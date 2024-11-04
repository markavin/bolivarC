<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class ShowLoginSuccessPopup
{
    public function handle(Request $request, Closure $next)
    {
        // Jika terdapat session 'loginSuccess', lanjutkan ke dashboard dengan pop-up
        if (session('loginSuccess')) {
            return redirect()->route('dashboard.index')->with('showPopup', true);
        }

        return $next($request);
    }
}
