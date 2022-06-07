<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  ...$guards
     * @return mixed
     */
    public function handle(Request $request, Closure $next, $guard = null)
    {

        if (Auth::guard($guard)->check()) {

            if ($guard == 'infogeni') {
                return redirect()->route('admin.index');
            } else {
                $liste_etablissements = Auth::user()->etablissementUser;
                if (count($liste_etablissements) > 1) {
                    return redirect()->route('gestscol.auth.switch');
                } else {
                    return redirect()->route('gestscol.index',$liste_etablissements[0]->etablissement);
                }
                
               
            } 
        }

        return $next($request);
    }
}
