<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CekRole
{
    public function handle(Request $request, Closure $next, $role)
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        $user = Auth::user();

        if ($user->role != $role) {

            if ($user->role == 'admin') {
                return redirect()->route('dashboard');
            }

            return redirect()->route('user.dashboard');
        }

        return $next($request);
    }
}