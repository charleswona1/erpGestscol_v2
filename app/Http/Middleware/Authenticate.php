<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Support\Facades\Auth;


class Authenticate 
{
    
    public function handle($request, Closure $next, $guard = null)
    {
        if (!Auth::guard($guard)->check()) {
            if ($guard == 'infogeni') {
                return redirect()->route('admin.auth.login');
            } else {
                return redirect()->route('gestscol.auth.login');
            } 
        }

        return $next($request);
    }
}
