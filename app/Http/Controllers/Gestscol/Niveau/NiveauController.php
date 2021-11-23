<?php

namespace App\Http\Controllers\Gestscol\Niveau;

use App\Http\Controllers\Controller;
use App\Models\Cycle;
use App\Models\Etablissement;
use App\Models\Niveau;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class NiveauController extends Controller
{
    public function index(Etablissement $etablissement){
        $niveaux = $etablissement->getNiveaux;
        return view('gestscol.ressources.niveaux.index',compact('niveaux','etablissement'));
    }

    public function create(Etablissement $etablissement){
        $cycles = $etablissement->getCycle;
        return view('gestscol.ressources.niveaux.form',compact('cycles','etablissement'));
    }

    public function store(Etablissement $etablissement,Request $request){
        $data = $request->validate([
            "name" => 'required|unique:niveaux',
            "cycle_id"=>"required",
        ]);

        $Niveau = new Niveau();
        $Niveau->fill($data);
        $Niveau->etablissement_id = $etablissement->id;
        
        if ($Niveau->save()) {
            Session::flash('success','le Niveau a bien été ajouté');
            return redirect()->route('gestscol.niveaux.index',$etablissement);
        }
        Session::flash('error','une erreur c\'est produite lors de l\'enregistrement');
        return route('gestscol.niveaux.add',$etablissement);
    }

    public function show(Niveau $Niveau){
        return view('gestscol.ressources.niveaux.show',compact('etablissement','Niveau'));
    }
    
    public function edit(Etablissement $etablissement, Niveau $niveau){
        $cycles = $etablissement->getCycle;;
        return view('gestscol.ressources.niveaux.edit',compact('cycles','niveau','etablissement'));
    }
    
    public function update(Etablissement $etablissement, Niveau $niveau, Request $request){
        
        $data = $request->validate([
            "name" => 'required|unique:niveaux,name,'.$niveau->id,
            "cycle_id"=>"required",
        ]);
        
        $niveau->fill($data);
        $niveau->etablissement_id = $etablissement->id;
        if ($niveau->save()) {
            Session::flash('success','le Niveau a bien été modifié');
            return redirect()->route('gestscol.niveaux.index',$etablissement);
        }
        Session::flash('error','une erreur c\'est produite lors de l\'enregistrement');
        return route('gestscol.niveaux.edit',[$etablissement,$niveau]);
    }
    
    public function delete(Etablissement $etablissement, Niveau $Niveau){
        $Niveau->delete();
        Session::flash('success','le Niveau a bien été supprimé');
        return redirect()->back();
    }
}
