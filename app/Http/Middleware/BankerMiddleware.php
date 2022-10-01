<?php

namespace App\Http\Middleware;

use Closure;

class BankerMiddleware
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
        if (\Auth::user()->players->job == "banker" ) {
            return $next($request);
        }

        return redirect()->back()
                ->with('error', 'Vous êtes pas un banquier');
    }
}
