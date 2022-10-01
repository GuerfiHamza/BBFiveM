<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Alert;
class ImmoMiddleware
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
        if (\Auth::user()->players->job == "rea" ) {
            return $next($request);
        }
        Alert::toast('Vous êtes pas un agent immobilier.', 'error');

        return redirect()->back();
    }
}
