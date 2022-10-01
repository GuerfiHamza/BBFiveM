<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class BateauMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (\Auth::user()->players->job == "boatdealer" ) {
            return $next($request);
        }

        return redirect()->back()
                ->with('error', 'Vous êtes pas un concessionaire');
    }
}
