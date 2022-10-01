<?php

namespace App\Http\Middleware;

use Closure;

class IsOrgMiddleware
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
        if (\Auth::user()->players->isOrgBoss()) {
            return $next($request);
        }

        return redirect()->back();
    }
}
