<?php

namespace App\Http\Middleware;

use Closure;

class ApiTokenMiddleware
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
        $header = $request->header('ApiToken');
        if (!$header || $header != config('services.api.token')) {
            \App::abort(401, 'unauthorication');
        }
        return $next($request);
    }
}
