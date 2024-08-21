<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckSession
{
    public function handle($request, Closure $next)
    {
        if (Auth::check()) {
            $timeout = config('session.lifetime') * 60; // Convert minutes to seconds

            if (session()->has('lastActivity') && (time() - session('lastActivity')) > $timeout) {
                Auth::logout();
                session()->invalidate();
                session()->regenerateToken();

                return redirect()->route('main')->withErrors(['Your session has expired. Please log in again.']);
            }

            session(['lastActivity' => time()]); // Update the last activity timestamp
        }

        return $next($request);
    }
}
