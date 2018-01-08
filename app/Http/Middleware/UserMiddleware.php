<?php

namespace myGamesList\Http\Middleware;

use Illuminate\Support\Facades\Auth;

use Closure;

class UserMiddleware
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
        if (Auth::check() && Auth::user()->admin == 0) {
            return $next($request);
        }

        return redirect('/');
    }
}
