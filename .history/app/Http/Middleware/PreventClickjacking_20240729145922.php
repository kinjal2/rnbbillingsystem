<?php

namespace App\Http\Middleware;

use Closure;

class PreventClickjacking
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
        $response = $next($request);

        // Set the X-Frame-Options header to DENY
        $response->headers->set('X-Frame-Options', 'DENY');

        return $response;
    }
}
