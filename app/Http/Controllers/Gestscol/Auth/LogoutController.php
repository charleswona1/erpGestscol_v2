<?php

namespace App\Http\Controllers\Gestscol\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LogoutController extends Controller
{
    public function __invoke()
    {
        Auth::guard()->logout();
        Session::flash('success', "Vous avez bien été déconnecté");
        return redirect()->route('gestscol.auth.login');
    }
}
