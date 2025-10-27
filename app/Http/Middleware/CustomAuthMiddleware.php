<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CustomAuthMiddleware
{
    /**
     * Handle an incoming request.
     */
    public function handle($request, Closure $next)
    {
        // Return 404 for guests
        if (!Auth::check()) {
            abort(404);
        }

        return $next($request);
    }
}
