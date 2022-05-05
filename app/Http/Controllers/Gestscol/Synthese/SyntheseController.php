<?php

namespace App\Http\Controllers\Gestscol\Synthese;

use App\Http\Controllers\Controller;
use App\Models\EleveClasse;
use App\Models\Etablissement;
use App\Models\EvaluationPeriode;
use Illuminate\Http\Request;
use App\SyntheseEntites;

class SyntheseController extends Controller
{
    public function index(Etablissement $etablissement){
        $classes = $etablissement->getClasses();
        $periodes = $etablissement->getPeriodes();
        $sous_periodes = $etablissement->getSousPeriodes();
        return view("gestscol.note.donnees.cloture",compact('etablissement','periodes','sous_periodes','classes'));
    }

    // public function matiereClasse($classe){
    //     $classeMatieres = ClasseMatiere::where('classe_annee_id',$classe)->get();
    //     $matieres = collect();
    //     foreach ($classeMatieres as $key => $classeMatiere)
    //         $matieres->push($classeMatiere->matiereNiveau->matiere);
    //     }
    //     return $matieres;
    // }

    public function eleveByClasse(Request $request){
        $eleveClasses = EleveClasse::where('classe_annee_id',$request->classe_id)->get();
        return $eleveClasses;
    }

    public function EvaluationEleveMatierePeriode(Request $request){
        $eleveClasses = SyntheseEntites::matiereEleveSousPeriode($request->classe_annee_id);
        $noteEleve = collect();
        if (isset($request->periode_id)) {
            $req = SyntheseEntites::evaluationPeride($request->periode_id,$request->classe_annee_id);
            foreach ($eleveClasses["eleves"] as $eleve) {
                $note =SyntheseEntites::calculNoteMatierePeriode($eleve->id,$request->periode_id,$eleveClasses["matieres"],$req);
                $noteEleve->push($note);
                $eleve->notesEleve = $note;
            }
        }else if (isset($request->sous_periode_id)){
            $req = SyntheseEntites::evaluationSousPeridePeride($request->sous_periode_id,$request->classe_annee_id);
           
            foreach ($eleveClasses["eleves"] as $eleve) {
                
                $note =SyntheseEntites::calculNoteMatiereSousPeriode($eleve->id,$request->sous_periode_id,$eleveClasses["matieres"],$req);
                
                $noteEleve->push($note);
                
                $eleve->notesEleve = $note;
            }
            
        }

        $eleves = $eleveClasses["eleves"];
        $matieres = $eleveClasses["matieres"];
        $eleves = SyntheseEntites::OrderByNoteGenerale($eleves);
        $noteEleveOrder = compact("eleves","matieres");
        return response()->json($noteEleveOrder);
    }


    public function Bulletins(Etablissement $etablissement){
        $classes = $etablissement->getClasses();
        $periodes = $etablissement->getPeriodes();
        $sous_periodes = $etablissement->getSousPeriodes();
        return view("gestscol.note.documents.bulletin",compact('etablissement','classes','periodes','sous_periodes'));
    }

    // public function BulletinsEleves(Request $request){
    //     if (isset($request->periode_id)) {
    //         $
    //     }
    // }


}

