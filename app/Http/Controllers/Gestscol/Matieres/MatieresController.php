<?php

namespace App\Http\Controllers\Gestscol\Matieres;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\Controller;
use App\Models\ClasseAnnee;
use App\Models\ClasseMatiere;
use App\Models\EnseignantAnnee;
use App\Models\Matiere;
use Illuminate\Http\Request;
use App\Models\Etablissement;
use App\Models\GroupeMatiere;
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

    public function indexAffectation(Etablissement $etablissement, Request $request){
        $niveaux = $etablissement->getNiveaux;
        $enseignants = EnseignantAnnee::where([['etablissement_id',$etablissement->id],['annee_academique_id',$etablissement->getAnneeAcademique->id]])->get();
        $classes = collect();
        $matieres = collect();
        $matieresClasses = collect();
        $niveauSeleted = "";
        if ($request->niveau) {
            $niveauSeleted = Niveau::find($request->niveau)->id;
            $classes = ClasseAnnee::where([['niveau_id',$request->niveau],['annee_academique_id',$etablissement->getAnneeAcademique->id]])->get();
            $matieres = MatiereNiveau::where('niveau_id',$request->niveau)->get();
            $matieresClasses = ClasseMatiere::join('matiere_niveaux','matiere_niveaux.id','=','classe_matieres.matiere_niveau_id')
                                            ->join('niveaux','niveaux.id','=','matiere_niveaux.niveau_id')
                                            ->where([['classe_matieres.etablissement_id',$etablissement->id],['niveaux.id',$request->niveau]])
                                            ->select('classe_matieres.*')
                                            ->get();
        }
        return view('gestscol.configurations.affectation-matiere',compact('etablissement','niveaux','enseignants','niveauSeleted','classes','matieres','matieresClasses'));
    }

    public function storeAffectation(Etablissement $etablissement, Request $request){
    
        $request->validate([
            "classe_annee_id" => 'required',
            "matiere_niveau_id" => 'required',
            "enseignant_annee_id" => 'required',
        ]);

        $arrayMatier = explode(',',$request->get('matiere_niveau_id'));
        \Debugbar::info($etablissement);
        
        foreach ($arrayMatier as $id) {
            $data = [
                'classe_annee_id' => $request->get("classe_annee_id"),
                'matiere_niveau_id' => $id,
                'enseignant_annee_id' => $request->get("enseignant_annee_id"),
                'etablissement_id'=>$etablissement->id
            ];
            
            $affectation = new ClasseMatiere();
            $affectation->fill($data);
            if (ClasseMatiere::hasClasseMatiere($request->get("classe_annee_id"), $id,$request->get("enseignant_annee_id")) <= 0) {
                $affectation->save();
            }else{
                Session::flash('warning', "affectation deja prise en compte");
            }
        }
        Session::flash('success', "Les affectations ont été créées avec succès");
        return redirect()->back();
    }

    public function deleteAffectionMatiere(Etablissement $etablissement,ClasseMatiere $classeMatiere ){
        $classeMatiere->delete();
        Session::flash('success','la matiere a bien été supprimée');
        return redirect()->back();
    }
        //parametrage matiere
    public function indexParametrage(Etablissement $etablissement){
        $matieres = $etablissement->getMatieres();  
        $groupe_matieres=$etablissement->getGroupeMatieres();
        
        $niveaux =$etablissement->getNiveaux;
        //dd($niveaux);
        $matiere_niveaux=$etablissement->getMatiereNiveau();
       // dd($matiere_niveaux[0]->groupe_matiere);
        return view('gestscol.configurations.parametrage_matiere.index', compact('niveaux', 'matieres','groupe_matieres', 'matiere_niveaux','etablissement'));
    }

    public function storeParametrage(Etablissement $etablissement,Request $request){

        $data = $request->validate([
            "niveau_id" => 'required',
            "matiere_id" => 'required',
            "coefficient" => 'required',
            "groupe_matiere_id" => 'required',
        ]);
        
       // $matiereNiveau->annee_academique_id=$etablissement->getAnneeAcademique->id;
        $checkParatrage = MatiereNiveau::where([['niveau_id',$request->niveau_id],['matiere_id',$request->matiere_id]])->get();
        if ($checkParatrage->count() > 0) {
            
            Session::flash('error','une erreur cette affectation existe déjà');
            return redirect()->back();
        }else{
            $matiereNiveau = new MatiereNiveau();
            $matiereNiveau->fill($data);
            if ($matiereNiveau->save()) {
                Session::flash('success','le parametrage matiere a bien été ajouté');
                return redirect()->route('gestscol.parametrages.matiere.index',$etablissement);
            }
        }
        
        Session::flash('error','une erreur c\'est produite lors de l\'enregistrement');
        return route('gestscol.parametrages.matiere.index',$etablissement);
    }
    public function editParametrage(Etablissement $etablissement, MatiereNiveau $matiereNiveau){
        $matieres = $etablissement->getMatieres();        
        $niveaux =$etablissement->getNiveaux;
        $groupe_matieres=$etablissement->getGroupeMatieres();
        $matiere_niveaux=$etablissement->getMatiereNiveau();
       // dd($matiere_niveaux[0]->groupe_matiere);
        return view('gestscol.configurations.parametrage_matiere.edit', compact('niveaux','matiereNiveau','groupe_matieres', 'matieres', 'matiere_niveaux','etablissement'));
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

    public function groupMatiereNiveau(Request $request){
        $groupe_matieres = GroupeMatiere::where('niveau_id',$request->niveau_id)->get();

        return response()->json($groupe_matieres);
    }
}
