<?php

namespace App\Http\Controllers\Gestscol\Niveau\GroupeMatieres;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\Controller;
use App\Models\Etablissement;
use App\Models\GroupeMatiere;
use App\Models\Niveau;
use Illuminate\Http\Request;

class GroupeMatieresController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Etablissement $etablissement, Niveau $niveau){
        $groupematieres = $etablissement->getGroupeMatieres();  
       // dd()      
        return view('gestscol.ressources.groupe_matieres.index', compact('groupematieres', 'etablissement', 'niveau'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Etablissement $etablissement,Niveau $niveau,Request $request){
        $data = $request->validate([
            "name" => 'required',
            "numero" => 'required',
        
        ]);
        
        $groupeMatiere = new GroupeMatiere();
        $groupeMatiere->fill($data);
        $groupeMatiere->annee_academique_id=$etablissement->getAnneeAcademique->id;
        $groupeMatiere->niveau_id=$niveau->id;
       // dd($groupeMatiere);
        if ($groupeMatiere->save()) {
            Session::flash('success','groupe de matière a bien été ajouté');
            return redirect()->route('gestscol.niveaux.groupeMatieres.index', [$etablissement,$niveau]);
        }
        Session::flash('error','une erreur c\'est produite lors de l\'enregistrement');
        return route('gestscol.niveaux.groupeMatieres.index',[$etablissement,$niveau]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\GroupeMatiere  $groupeMatiere
     * @return \Illuminate\Http\Response
     */
    public function show(GroupeMatiere $groupeMatiere)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\GroupeMatiere  $groupeMatiere
     * @return \Illuminate\Http\Response
     */
    public function edit(Etablissement $etablissement, Niveau $niveau,GroupeMatiere $groupeMatiere)
    {
        $groupematieres = $etablissement->getGroupeMatieres();  
        
        return view('gestscol.ressources.groupe_matieres.edit',compact('etablissement','niveau','groupeMatiere', 'groupematieres'));
    
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\GroupeMatiere  $groupeMatiere
     * @return \Illuminate\Http\Response
     */
    public function update(Etablissement $etablissement, Niveau $niveau, GroupeMatiere $groupeMatiere, Request $request){
        
        $data = $request->validate([
            "name" => 'required',
            "numero" => 'required',
        
        ]);
        
        $groupeMatiere->fill($data);
        if ($groupeMatiere->save()) {
            Session::flash('success','le groupe de matière a bien été modifié');
            return redirect()->route('gestscol.niveaux.groupeMatieres.index', [$etablissement,$niveau]);
            
           // return view('gestscol.ressources.groupe_matieres.index', compact('groupematieres', 'etablissement', 'niveau'));
        
        }
        Session::flash('error','une erreur c\'est produite lors de l\'enregistrement');
        
        
        return route('gestscol.niveaux.groupeMatieres.index',[$etablissement,$niveau]);
    }
    
    public function delete(Etablissement $etablissement, Niveau $niveau, GroupeMatiere $groupeMatiere ){
        $groupeMatiere->delete();
        Session::flash('success','le groupe de matière a bien été supprimé');
        return redirect()->route('gestscol.niveaux.groupeMatieres.index', [$etablissement,$niveau]);
    }
}
