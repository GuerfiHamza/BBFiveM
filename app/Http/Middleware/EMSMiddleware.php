<?php

namespace App\Http\Middleware;

use Closure;

class EMSMiddleware
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
        if (\Auth::user()->players->job == "ambulance") {
            return $next($request);
        }

        return redirect()->back()
                ->with('error', 'Vous ne faites pas partie de la LSMS.');
    }
}
