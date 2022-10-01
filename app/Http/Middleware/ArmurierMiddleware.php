<?php

namespace App\Http\Middleware;

use Closure;
use Alert;
class ArmurierMiddleware
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
        if (\Auth::user()->players->job == "armurier" || \Auth::user()->players->job == "ambulance" || \Auth::user()->players->job == "police" || \Auth::user()->players->job == "sheriff" ) {
            return $next($request);
        }
        Alert::toast('Vous ne faites pas partie de l\'ammunation.', 'error');
        return redirect()->back();
    }
}
