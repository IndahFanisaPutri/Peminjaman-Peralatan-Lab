<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;


class CekRole
{
    public function handle(Request $request, Closure $next, $role)
    {

        if (!auth()->check()) {

            return redirect('/login');

        }


        $user = auth()->user();


        if ($user->role !== $role) {

            return redirect('/dashboard');

        }


        return $next($request);

    }
}