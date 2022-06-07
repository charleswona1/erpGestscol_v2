<?php

namespace App\Http\Controllers\Gestscol\Eleves;

use App\Http\Controllers\Controller;
use App\Models\ClasseAnnee;
use App\Models\EleveClasse;
use App\Models\Etablissement;
use App\Models\Niveau;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class EleveClassesController extends Controller
{
    public function index(Etablissement $etablissement, Request $request){
        $niveaux = $etablissement->getNiveaux;
        $niveauSeleted = "";
        $classes = collect();
        $elevesNiveaux = collect();
        $elevesClasses = collect();
        if ($request->niveau) {
            $niveauSeleted = Niveau::find($request->niveau)->id;
            $classes = ClasseAnnee::where('niveau_id',$request->niveau)->get();
            $elevesNiveaux = EleveClasse::where([['niveau_id',$request->niveau],['classe_annee_id',null]])->get();
        }

        return view('gestscol.configurations.affectation-eleveClasse',compact('etablissement','niveaux','classes','elevesNiveaux','elevesClasses','niveauSeleted'));
    }

    public function getEleveClasse(Etablissement $etablissement,Request $request){
        \Debugbar::info($request->all());
        $elevesClasses = EleveClasse::where([['niveau_id',$request->niveau],['classe_annee_id',$request->classe]])->get();
        return $elevesClasses;
    }

    public function store(Etablissement $etablissement, Request $request){
        foreach ($request->dataAffectation as $data) {
            
            $eleve = EleveClasse::where('id',$data)->first();
            $eleve->classe_annee_id = $request->classe;
            $eleve->save();
        }
        Session::flash('success', "affectation reussie");
        return true;
    }

    public function remove(Etablissement $etablissement, Request $request){
        foreach ($request->dataAffectation as $data) {
            
            $eleve = EleveClasse::where('id',$data)->first();
            $eleve->classe_annee_id = null;
            $eleve->save();
        }
        Session::flash('success', "suppression de l'affectation");
        return true;
    }
}
