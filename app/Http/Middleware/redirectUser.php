<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class redirectUser
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $guard = null): Response
    {
        // Check if user is authenticated and not admin
        if (Auth::guard($guard)->check() && Auth::user()->isAdmin == 0) {
            // Allow user to access their dashboard and orders routes without redirecting
            if (!$request->routeIs('user.dashboard') && !$request->routeIs('user.orders.index')) {
                return redirect()->route('user.dashboard');
            }
        }

        return $next($request);
    }
}
