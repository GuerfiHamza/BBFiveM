<?php

namespace App\Http\Middleware;

use Closure;

class StaffMiddleware
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
        if (\Auth::user()->players->group == "admin" || \Auth::user()->players->group == "superadmin"  ) {
            return $next($request);
        }

        return redirect()->back();
    }
}
