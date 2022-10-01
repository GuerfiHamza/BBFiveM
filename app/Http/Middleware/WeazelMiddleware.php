<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
class WeazelMiddleware
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
        if (\Auth::user()->players->job == "journaliste") {
            return $next($request);
        }

        Alert::toast('Vous n\'êtes faites pas partie de weazel news.', 'error');
        return redirect()->back();
    }
}
