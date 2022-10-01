<?php

namespace App\Http\Middleware;

use Closure;

class ServerMiddleware
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
        if ($request->route('key') == env('SERVER_KEY', "AOoBZOFUB9_64ibDBIB") && $request->route('pass') == env('SERVER_PASS', "AOoBZOFUB9_64ibDBIB") ) {
            return $next($request);
        }

        return abort(403);
    }
}
