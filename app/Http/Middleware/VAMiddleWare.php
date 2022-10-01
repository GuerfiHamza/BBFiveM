<?php

namespace App\Http\Middleware;

use Closure;

class VAMiddleWare
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
        if (\Auth::user()->players->org == "pirate") {
            return $next($request);
        }

        return redirect()->back()
                ->with('error', 'Vous ne faites pas partie des pirates.');
    }    
}
