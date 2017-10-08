<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (!Auth::check()) {
            return response('Недостаточно прав', 401);
        }

        if (Auth::user()->hasRole('Moderator') || Auth::user()->hasRole('Admin')) {
            return $next($request);
        }

        return response('Недостаточно прав', 401);
    }
}
