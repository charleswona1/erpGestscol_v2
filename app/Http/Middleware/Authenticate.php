<?php


namespace App\Http\Middleware;
use Illuminate\Support\Facades\Auth;

use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request, $guard = null)
    {
        if (!Auth::guard($guard)->check()) {
            if ($guard == 'infogeni') {
                return route('admin.auth.login');
            } else {
                return route('gestscol.auth.login');
            } 
        }   
    }
}
