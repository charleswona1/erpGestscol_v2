<?php

namespace App\Http\Controllers\Gestscol\Enseignants;

use App\Http\Controllers\Controller;
use App\Models\Enseignant;
use App\Models\EnseignantAnnee;
use App\Models\Etablissement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class EnseignantsController extends Controller
{
    public function index(Etablissement $etablissement){
        $enseignants = EnseignantAnnee::where('etablissement_id',$etablissement->id)->get();
        return view('gestscol.ressources.enseignants.index', compact('etablissement','enseignants'));
    }

    public function create(Etablissement $etablissement){
        return view('gestscol.ressources.enseignants.form', compact('etablissement'));
    }

    public function store(Etablissement $etablissement, Request $request){
        $data = $request->validate([
            'name'=>['required', 'string', 'max:255','unique:enseignants'],
            'sexe'=>['required'],
            'date_naissance'=>['required', 'date'],
            'lieu_naissance'=>['required'],
            'email'=>['','unique:enseignants'],
            'telephone'=>['required','unique:enseignants'],
            'groupe_sanguin'=>['required'],
            'religion'=>['required'],
            'localisation'=>['required'],
            'autres'=>[''],
            'num_cnps'=>['required','integer'],
            'num_cni'=>['required','integer'],
            'num_autorisation'=>['required','integer'],
            'status'=>['required'],
            'diplome'=>['required'],
            'matricule'=>['required'],
            'titre'=>['required'],
       ]);

       $enseignant = new Enseignant();
       $enseignant->fill($data);
       $enseignant->etablissement_id = $etablissement->id;
       if($enseignant->save()){
           $enseignantAnnee = new EnseignantAnnee();
           $enseignantAnnee->fill($data);
           $enseignantAnnee->etablissement_id = $etablissement->id;
           $enseignantAnnee->annee_academique_id = $etablissement->getAnneeAcademique->id;
           $enseignantAnnee->save();
           Session::flash('success','l\'enseigant a bien été crée');
           return redirect()->route('gestscol.enseignants.index',$etablissement);
       }
       Session::flash('error','echec d\'enregistrement');
       return redirect()->route('gestscol.enseignants.add',$etablissement);
    }

    public function show(Etablissement $etablissement){
        
    }

    public function edit(Etablissement $etablissement, EnseignantAnnee $enseignantAnnee){
        return view('gestscol.ressources.enseignants.edit', compact('etablissement','enseignantAnnee'));
    }

    public function update(Etablissement $etablissement, EnseignantAnnee $enseignantAnnee, Request $request){
       
        $data = $request->validate([
            'name'=>['required', 'string', 'max:255','unique:enseignants,name,'.$enseignantAnnee->id],
            'sexe'=>['required'],
            'date_naissance'=>['required', 'date'],
            'lieu_naissance'=>['required'],
            'email'=>['','unique:enseignants,email,'.$enseignantAnnee->id],
            'telephone'=>['required','unique:enseignants,email,'.$enseignantAnnee->id],
            'groupe_sanguin'=>['required'],
            'religion'=>['required'],
            'localisation'=>['required'],
            'autres'=>[''],
            'num_cnps'=>['required','integer'],
            'num_cni'=>['required','integer'],
            'num_autorisation'=>['required','integer'],
            'status'=>['required'],
            'diplome'=>['required'],
            'matricule'=>['required'],
            'titre'=>['required'],
       ]);

       $enseignant = Enseignant::find($enseignantAnnee->id);
       $enseignant->fill($data);
       $enseignant->etablissement_id = $etablissement->id;
       if($enseignant->save()){
           $enseignantAnnee = EnseignantAnnee::find($enseignantAnnee->id);
           $enseignantAnnee->fill($data);
           $enseignantAnnee->etablissement_id = $etablissement->id;
           $enseignantAnnee->annee_academique_id = $etablissement->getAnneeAcademique->id;
           $enseignantAnnee->save();
           Session::flash('success','l\'enseigant a bien été modifié');
           return redirect()->route('gestscol.enseignants.index',$etablissement);
       }
       Session::flash('error','echec d\'enregistrement');
       return redirect()->route('gestscol.enseignants.add',$etablissement);
    }

    public function delete(Etablissement $etablissement, EnseignantAnnee $enseignantAnnee){
        $enseignantAnnee->delete();
        $enseignantUnlink = EnseignantAnnee::find($enseignantAnnee->id);
        $enseignantUnlink->delete();
        Session::flash('success','l\'enseignant a bien été supprimé');
        return redirect()->back();
    }
}
