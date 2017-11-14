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
            return abort(403,'Недостаточно прав');
        }

        if (Auth::user()->hasRole('moderator') || Auth::user()->hasRole('admin')) {
            return $next($request);
        }

        return abort(403,'Недостаточно прав');
    }
}
