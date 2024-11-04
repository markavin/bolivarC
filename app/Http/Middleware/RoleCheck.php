<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RoleCheck
{
    public function handle($request, Closure $next, ...$role)
    {
        if (!Auth::check()) {
            return redirect()->route('login'); 
        }

        if (!in_array(Auth::user()->role->namaRole, $role)) {
            return redirect()->route('unauthorized'); 
        }

        return $next($request);
    }
}