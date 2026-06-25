<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CekRole
{
    public function handle(Request $request, Closure $next, $role)
    {
        if(auth()->user()->role != $role)
        {
            return redirect('/dashboard');
        }
        return $next($request);
    }
}
