<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class PimpinanMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if (auth()->check() && auth()->user()->role === 'pimpinan') {
            return $next($request);
        }

        return redirect('/dashboard')->with('error', 'Akses ditolak!');
    }
}
