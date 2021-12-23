<?php

namespace App\Http\Controllers\Gestscol\Notes;

use App\Http\Controllers\Controller;
use App\Models\ClasseAnnee;
use App\Models\EleveClasse;
use App\Models\Etablissement;
use App\Models\EvaluationPeriode;
use App\Models\Niveau;
use App\Models\Note;
use App\Models\SousPeriode;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class NotesController extends Controller
{
    public function saisie(Etablissement $etablissement){
        $classes = $etablissement->getClasses();
        $periodes = $etablissement->getPeriodes();
        $evaluations = $etablissement->getEvaluations();
        \Debugbar::info($evaluations);
        return view('gestscol.note.donnees.saisie-note',compact('etablissement','classes','periodes','evaluations'));
    }

    public function getMatiereFromClasse(Request $request){
        $classe = ClasseAnnee::find($request->classeAnneId);
        $niveau = Niveau::find($classe->niveau_id);
        $matieres = $niveau->MatierNiveau;
        foreach($matieres as $matiere){
            $matiere->name = $matiere->matiere->name;
        }
        
        return response()->json($matieres);
    }

    public function getSousPeriode(Request $request){
        $sousPeriodes = SousPeriode::where('periode_id',$request->periodeId)->get();
        return response()->json($sousPeriodes);
    }

    public function saveEvaluationPeriode(Etablissement $etablissement, Request $request){

        $data = $request->validate([
            "classe_annee_id"=> "required",
            "matiere_niveau_id"=> "required",
            "periode_id"=> "required",
            "sous_periode_id"=> "required",
            "date_evaluation"=> "required",
            "bareme"=> "required",
            "evaluation_id" => "required",
            "commentataire"=> ""
        ]);

        $sousPeriode = SousPeriode::where('id',$request->sous_periode_id)->first();
        $evaluationPeriode = new EvaluationPeriode();
        $evaluationPeriode->fill($data);
        $evaluationPeriode->numero = $sousPeriode->numero;
        $evaluationPeriode->annee_academique_id = $etablissement->getAnneeAcademique->id;
        $evaluationPeriode->save();

        $elevesClasse = EleveClasse::where([['classe_annee_id',$request->classe_annee_id],['annee_academique_id',$etablissement->getAnneeAcademique->id]])->get();

        Session::flash('success','l\'evaluation de la période a bien été ajouté');
        return response()->json(compact('elevesClasse','evaluationPeriode') );
    }

    public function gestionAvance(Etablissement $etablissement){
        $classes = $etablissement->getClasses();
        $periodes = $etablissement->getPeriodes();
        $evaluations = $etablissement->getEvaluations();
        return view('gestscol.note.donnees.gestion-avance',compact('etablissement','classes','periodes','evaluations'));
    }

    public function saveNote(Etablissement $etablissement, Request $request){
        $status = false;
        try {
            $status = true;
            foreach ($request->notes as $key => $note) {
                $note_eleve = new Note();
                $note_eleve->evaluation_periode_id = $note["evaluation_periode_id"];
                $note_eleve->eleve_classe_id = $note['eleve_classe_id'];
                $note_eleve->note = $note["note"];
                $note_eleve->save();
            }
            Session::flash('success','les notes de l\'élèves sur cette periode on ete créé correctement ');
            return response()->json(compact('etablissement','status') );
        } catch (\Throwable $e) {
            $status = false;
            Session::flash('error','Une erreur c\'est produite');
            return response()->json(compact('etablissement','status','e') );
        }
    }
}
