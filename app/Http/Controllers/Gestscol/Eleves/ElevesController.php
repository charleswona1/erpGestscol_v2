<?php

namespace App\Http\Controllers\Gestscol\Eleves;

use App\Http\Controllers\Controller;
use App\Models\Eleve;
use App\Models\EleveClasse;
use App\Models\Etablissement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ElevesController extends Controller
{
    public function index(Etablissement $etablissement){
        $eleves = EleveClasse::where('etablissement_id',$etablissement->id)->get();
        return view('gestscol.ressources.eleves.index',compact('etablissement','eleves'));
    }

    public function create(Etablissement $etablissement){
        $niveaux = $etablissement->getNiveaux();
        return view('gestscol.ressources.eleves.form',compact('etablissement','niveaux'));
    }

    public function store(Etablissement $etablissement,Request $request){
        $data = $request->validate([
            'nom'=>['required', 'string', 'max:255','unique:eleves'],
            'sexe'=>['required'],
            'date_naissance'=>['required', 'date'],
            'lieu_naissance'=>['required'],
            'email'=>['','unique:eleves'],
            'telephone'=>['required','unique:eleves'],
            'groupe_sanguin'=>['required'],
            'religion'=>['required'],
            'domicile'=>['required'],
            'type_contact'=>['required'],
            'autres'=>[''],
            'nom_pere'=>[''],
            'nom_mere'=>['required'],
            'nom_tuteur'=>[''],
            'profession_pere'=>[''],
            'profession_mere'=>['required'],
            'profession_tuteur'=>[''],
            'tel_pere'=>[''],
            'tel_mere'=>['required'],
            'tel_tuteur'=>[''],
            'aptitude'=>['required'],
            'ancien'=>[''],
            'interne'=>[''],
            'precedent_etablissement'=>[''],
            'precedent_niveau'=>[''],
            'is_redouble'=>[''],
            'niveau_id'=>['required']
       ]);

       $annee_academique = "";
       $annees = $etablissement->getAnneeAccademic();
       foreach ($annees as $annee) {
           if ($annee->isdefault) {
               $annee_academique = $annee;
           }
       }

        $eleve = new Eleve();
        $eleve->fill($data);
        $eleve->etablissement_id = $etablissement->id;
        if ($eleve->save()) {
            $eleveClasse = new EleveClasse();
            $eleveClasse->fill($data);
            $eleveClasse->etablissement_id = $etablissement->id;
            $eleveClasse->annee_academique = $annee_academique->id;
            $eleveClasse->fill($data);
            $eleveClasse->save();
            Session::flash('success','l\'eleve a bien été crée');
            return redirect()->route('gestscol.student.index',$etablissement);
        }
        Session::flash('error','echec d\'enregistrement');
        return redirect()->route('gestscol.student.add',$etablissement);
    }

    public function show(Etablissement $etablissement, Eleve $eleve){
        return view('gestscol.ressources.eleves.show',compact('etablissement,eleve'));
    }

    public function edit(Etablissement $etablissement, Eleve $eleve){
        return view('gestscol.ressources.eleves.form',compact('etablissement,eleve'));
    }

    public function update(Etablissement $etablissement, Eleve $eleve, Request $request){
        return redirect()->back();
    }
}

