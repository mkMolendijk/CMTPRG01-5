<?php

namespace myGamesList\Http\Middleware;

use Illuminate\Support\Facades\Auth;

use Closure;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
//        return $next($request);
        if ( Auth::check() && Auth::user()->admin == 1 )
        {
            return $next($request);
        }

        return redirect('/');

    }
}

