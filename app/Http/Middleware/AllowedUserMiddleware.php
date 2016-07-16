<?php

namespace Msenl\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

/**
 * Class AllowedUserMiddleware
 * @package Msenl\Http\Middleware
 */
class AllowedUserMiddleware
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
        if(Auth::user()->id != $request->user)
        {
            abort(503);
        }

        return $next($request);
    }
}
