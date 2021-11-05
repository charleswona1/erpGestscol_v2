<?php

namespace App\Http\Controllers\Admin\Etablissement;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\EtablissementUser;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\Rule;

class AdminEtablissementsController extends Controller
{
    // liste des utilisateurs d'un etablissement 
    public function index(){

    }

    // creation de l'admin d'un etablissement
    public function storeAdmin(Request $request){
        $data = $request->validate([
            'firstName' => ['required'],
            'lastName' => [''],
            'email' => ['required', 'email', Rule::unique('users')],
            'password' => ['required','min:5'],
            'telephone'=>['required'],
            'is_default_annee'=>['required']
        ]);



        $user = new User();
        $user->fill($data);
        if ($user->save()) {
            $etablissement_user = new EtablissementUser();
            $etablissement_user->etablissement_id = $request->etablissement_id;
            $etablissement_user->user_id = $user->id;
            $etablissement_user->is_default_annee = $request->is_default_annee;
            $etablissement_user->save();

            Session::flash('success', "Compte créé avec succes");
            return redirect()->back();
        }else {
            Session::flash('error', "<strong>La création de votre compte n'a pas pu être finalisée.</strong><br/>Merci de remplir à nouveau le formulaire, en remplissant tous les champs obligatoires.");
            return redirect()->back();
        }
    }
}
