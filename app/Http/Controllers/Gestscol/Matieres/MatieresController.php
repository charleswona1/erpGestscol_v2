<?php

namespace App\Http\Controllers\Gestscol\Matieres;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\Controller;
use App\Models\Matiere;
use Illuminate\Http\Request;
use App\Models\Etablissement;
use App\Models\MatiereNiveau;
use App\Models\Niveau;

class MatieresController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Etablissement $etablissement){
        $matieres = $etablissement->getMatieres();        
        return view('gestscol.ressources.matieres.index', compact('matieres', 'etablissement'));
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Etablissement $etablissement){
       // $niveaux = $etablissement->getNiveaux;
        return view('gestscol.ressources.matieres.form',compact('etablissement'));
    }
    
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Etablissement $etablissement,Request $request)
    {
        $data = $request->validate([
            "name" => 'required',
            "abreviation" => 'required',
        
        ]);


        $matiere = new Matiere();
        $matiere->fill($data);
        $matiere->annee_academique_id=$etablissement->getAnneeAcademique->id;
        
        if ($matiere->save()) {
            Session::flash('success','la matiere a bien été ajoutée');
            return redirect()->route('gestscol.matieres.index',$etablissement);
        }
        Session::flash('error','une erreur c\'est produite lors de l\'enregistrement');
        return route('gestscol.matieres.add',$etablissement);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Matiere  $matiere
     * @return \Illuminate\Http\Response
     */
    public function show(Matiere $matiere)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Matiere  $matiere
     * @return \Illuminate\Http\Response
     */
    public function edit(Etablissement $etablissement, Matiere $matiere){
        
        return view('gestscol.ressources.matieres.edit',compact('etablissement','matiere'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Matiere  $matiere
     * @return \Illuminate\Http\Response
     */
    public function update(Etablissement $etablissement, Matiere $matiere, Request $request){
        
        $data = $request->validate([
            "name" => 'required',
            "abreviation" => 'required',
        ]);
        
        $matiere->fill($data);
        if ($matiere->save()) {
            Session::flash('success','la matiere a bien été modifiée');
            return redirect()->route('gestscol.matieres.index',$etablissement);
        }
        Session::flash('error','une erreur c\'est produite lors de l\'enregistrement');
        return route('gestscol.matieres.edit',$etablissement);
    }
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Matiere  $matiere
     * @return \Illuminate\Http\Response
     */
    public function delete(Etablissement $etablissement, Matiere $matiere){
        $matiere->delete();
        Session::flash('success','la matiere a bien été supprimée');
        return redirect()->back();
    }

    //parametrage matiere
    public function indexParametrage(Etablissement $etablissement){
        $matieres = $etablissement->getMatieres();        
        $niveaux =$etablissement->getNiveaux;
        //dd($niveaux);
        $matiere_niveaux=$etablissement->getMatiereNiveau();
       // dd($matiere_niveaux[0]->groupe_matiere);
        return view('gestscol.configurations.parametrage_matiere.index', compact('niveaux', 'matieres', 'matiere_niveaux','etablissement'));
    }
    public function storeParametrage(Etablissement $etablissement,Request $request){
       // dd($request->all());
        
        $data = $request->validate([
            "matiere_id" => 'required',
            "niveau_id" => 'required',
            "groupe_matiere_id" => 'required',
            "coefficient" => 'required',
        ]);
        $matiereNiveau = new MatiereNiveau();
        $matiereNiveau->fill($data);
       // $matiereNiveau->annee_academique_id=$etablissement->getAnneeAcademique->id;
        
        if ($matiereNiveau->save()) {
            Session::flash('success','le parametrage matiere a bien été ajouté');
            return redirect()->route('gestscol.parametrages.matiere.index',$etablissement);
        }
        Session::flash('error','une erreur c\'est produite lors de l\'enregistrement');
        return route('gestscol.parametrages.matiere.index',$etablissement);
    }
    public function editParametrage(Etablissement $etablissement, MatiereNiveau $matiereNiveau){
        $matieres = $etablissement->getMatieres();        
        $niveaux =$etablissement->getNiveaux;
        //dd($niveaux);
        $matiere_niveaux=$etablissement->getMatiereNiveau();
       // dd($matiere_niveaux[0]->groupe_matiere);
        return view('gestscol.configurations.parametrage_matiere.edit', compact('niveaux','matiereNiveau', 'matieres', 'matiere_niveaux','etablissement'));
    }
    public function updateParametrage(Etablissement $etablissement, MatiereNiveau $matiereNiveau, Request $request){
        
        $data = $request->validate([
            "matiere_id" => 'required',
            "niveau_id" => 'required',
            "groupe_matiere_id" => 'required',
            "coefficient" => 'required',
        ]);
        $matiereNiveau->fill($data);        
        if ($matiereNiveau->save()) {
            Session::flash('success','le parametrage de matiere a bien été modifiée');
            return redirect()->route('gestscol.parametrages.matiere.index',$etablissement);
        }
        Session::flash('error','une erreur c\'est produite lors de l\'enregistrement');
        return redirect()->route('gestscol.parametrages.matiere.index',$etablissement);
    }
    public function deleteParametrage(Etablissement $etablissement, MatiereNiveau $matiereNiveau){
        $matiereNiveau->delete();
        Session::flash('success','le parametrage de matiere a bien été supprimée');
        return redirect()->back();
    }
}
