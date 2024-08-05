<?php namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ValidUser
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
        // Check if a user session exists
        if ($this->isValidUserSession()) {
            return $next($request);
        }

        // Redirect or handle unauthorized access
        return redirect()->route('login')->withErrors('You are not authorized to access this page.');
    }

    /**
     * Custom user validation logic.
     *
     * @return bool
     */
    protected function isValidUserSession()
    {
        // Example logic: Check if a user session exists and meets certain criteria
        $user = Session::get('user'); // Assuming you store user data in session

        if ($user && $this->meetsCustomCriteria($user)) {
            return true;
        }

        return false;
    }

    /**
     * Check if the user meets custom criteria.
     *
     * @param  array  $user
     * @return bool
     */
    protected function meetsCustomCriteria($user)
    {
        // Define your custom criteria here
        // Example: Check if the user has a specific role
        return isset($user['role']) && $user['role'] === 'customer'; // Replace with your criteria
    }
}
