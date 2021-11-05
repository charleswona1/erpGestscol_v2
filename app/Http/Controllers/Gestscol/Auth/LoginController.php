<?php

namespace App\Http\Controllers\Gestscol\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\EtablissementUser;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function index(){
        return view('gestscol.auth.login');
    }

    public function login(Request $request){
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $liste_etablissements = Auth::user()->etablissementUser;
            if (count($liste_etablissements) > 1) {
                return redirect()->intended(route('gestscol.auth.switch'));
            } else {
                Session::put("eltablissement", $liste_etablissements[0]);
                return redirect()->intended(route('gestscol.index'));
            }
        }
        Session::flash('error', "Aucun compte n'a été trouvé avec ces identifiants");
        return redirect()->back();
    }

    public function switch(){
        return view('gestscol.switchetablissement');
    }
}
