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
        $niveaux = $etablissement->getNiveaux;
        return view('gestscol.ressources.eleves.form',compact('etablissement','niveaux'));
    }

    public function store(Etablissement $etablissement,Request $request){
        $data = $request->validate([
            'nom'=>['required', 'string', 'max:255','unique:eleves'],
            'sexe'=>['required'],
            'date_naissance'=>['required', 'date'],
            'lieu_naissance'=>['required'],
            'email'=>[''],
            'telephone'=>[''],
            'groupe_sanguin'=>[''],
            'religion'=>[''],
            'domicile'=>[''],
            'type_contact'=>[''],
            'autres'=>[''],
            'nom_pere'=>[''],
            'nom_mere'=>['required'],
            'nom_tuteur'=>[''],
            'profession_pere'=>[''],
            'profession_mere'=>[''],
            'profession_tuteur'=>[''],
            'tel_pere'=>[''],
            'tel_mere'=>[''],
            'tel_tuteur'=>[''],
            'aptitude'=>[''],
            'ancien'=>[''],
            'interne'=>[''],
            'precedent_etablissement'=>[''],
            'precedent_niveau'=>[''],
            'is_redouble'=>[''],
            'niveau_id'=>['required']
       ]);

        $eleve = new Eleve();
        $eleve->fill($data);
        $eleve->etablissement_id = $etablissement->id;
        if ($eleve->save()) {
            $eleveClasse = new EleveClasse();
            $eleveClasse->fill($data);
            $eleveClasse->etablissement_id = $etablissement->id;
            $eleveClasse->eleve_id = $eleve->id;
            $eleveClasse->annee_academique_id = $etablissement->getAnneeAcademique->id;
            $eleveClasse->ancien  = (isset($request->ancien))?true:false;
            $eleveClasse->interne  = (isset($request->interne))?true:false;
            $eleveClasse->is_redouble  = (isset($request->is_redouble))?true:false;
            $eleveClasse->fill($data);
            $eleveClasse->save();
            
            Session::flash('success','l\'eleve a bien été crée');
            return redirect()->route('gestscol.student.index',$etablissement);
        }
        Session::flash('error','echec d\'enregistrement');
        return redirect()->route('gestscol.student.add',$etablissement);
    }

    public function show(Etablissement $etablissement, EleveClasse $eleve){
        return view('gestscol.ressources.eleves.show',compact('etablissement,eleve'));
    }

    public function edit(Etablissement $etablissement, EleveClasse $eleve){
        $niveaux = $etablissement->getNiveaux;
        \Debugbar::info($eleve);
        return view('gestscol.ressources.eleves.edit',compact('etablissement','eleve','niveaux'));
    }

    public function update(Etablissement $etablissement, EleveClasse $eleve, Request $request){

        $data = $request->validate([
            'nom'=>['required', 'string', 'max:255','unique:eleves,nom,'.$eleve->id],
            'sexe'=>['required'],
            'date_naissance'=>['required', 'date'],
            'lieu_naissance'=>['required'],
            'email'=>[''],
            'telephone'=>[''],
            'groupe_sanguin'=>[''],
            'religion'=>[''],
            'domicile'=>[''],
            'type_contact'=>[''],
            'autres'=>[''],
            'nom_pere'=>[''],
            'nom_mere'=>['required'],
            'nom_tuteur'=>[''],
            'profession_pere'=>[''],
            'profession_mere'=>[''],
            'profession_tuteur'=>[''],
            'tel_pere'=>[''],
            'tel_mere'=>[''],
            'tel_tuteur'=>[''],
            'aptitude'=>[''],
            'ancien'=>[''],
            'interne'=>[''],
            'precedent_etablissement'=>[''],
            'precedent_niveau'=>[''],
            'is_redouble'=>[''],
            'niveau_id'=>['required']
       ]);

        $eleveClasse = $eleve;
        $eleveClasse->fill($data);
        $eleveClasse->etablissement_id = $etablissement->id;
        $eleveClasse->annee_academique_id = $etablissement->getAnneeAcademique->id;
        $eleveClasse->ancien  = (isset($request->ancien))?true:false;
        $eleveClasse->interne  = (isset($request->interne))?true:false;
        $eleveClasse->is_redouble  = (isset($request->is_redouble))?true:false;
        if ($eleveClasse->save()) {
            $eleveUpdate = Eleve::find($eleveClasse->eleve_id);
            $eleveUpdate->fill($data);
            $eleveUpdate->etablissement_id = $etablissement->id;
            $eleveUpdate->save();
            Session::flash('success','l\'eleve a bien été modifié');
            return redirect()->route('gestscol.student.index',$etablissement);
        }
        Session::flash('error','echec de modification');
        return redirect()->route('gestscol.student.add',$etablissement);
    }

    public function delete(Etablissement $etablissement, EleveClasse $eleve){
        $eleve->delete();
        $eleveUnlink = Eleve::find($eleve->eleve_id);
        $eleveUnlink->delete();
        Session::flash('success','l\'éleve a bien été supprimé');
        return redirect()->back();
    }
}

