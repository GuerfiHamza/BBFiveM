<?php

namespace App\Http\Middleware;

use Closure;

class DisableFormBuilderDefaultsRoutes
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
        if (strpos($request->url(), 'form-builder') !== false) {
            if (strpos($request->url(), 'forms') !== false) {
                return redirect(str_replace('form-builder', 'dashboard', $request->url()));
            }
            return abort(404);
        }

        return $next($request);
    }
}
