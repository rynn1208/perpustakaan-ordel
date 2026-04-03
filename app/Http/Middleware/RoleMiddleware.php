<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next, $role): Response
    {
        // Jika belum login atau role-nya tidak sesuai, tendang ke dashboard masing-masing
        if (!Auth::check() || Auth::user()->role !== $role) {
            return redirect('/dashboard');
        }

        return $next($request);
    }
}
