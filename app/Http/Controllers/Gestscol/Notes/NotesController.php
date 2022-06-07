<?php

namespace App\Http\Controllers\Gestscol\Notes;

use App\Http\Controllers\Controller;
use App\Models\ClasseAnnee;
use App\Models\ClasseMatiere;
use App\Models\EleveClasse;
use App\Models\Etablissement;
use App\Models\Evaluation;
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
        $sous_periodes = $etablissement->getSousPeriodes();
        \Debugbar::info($sous_periodes);
        return view('gestscol.note.donnees.saisie-note',compact('etablissement','classes','periodes','sous_periodes','evaluations'));
    }

    public function editSaisie(Etablissement $etablissement, EvaluationPeriode $evaluation){
        $classes = $etablissement->getClasses();
        $periodes = $etablissement->getPeriodes();
        $evaluations = $etablissement->getEvaluations();
        $sous_periodes = $etablissement->getSousPeriodes();
        $evaluationPeriode = $evaluation;
        $elevesClasse = EleveClasse::where([['classe_annee_id',$evaluation->classe_annee_id],['annee_academique_id',$etablissement->getAnneeAcademique->id]])->get();
        \Debugbar::info($evaluationPeriode);
        return view('gestscol.note.donnees.edit-saisie',compact('etablissement','classes','periodes','evaluations','evaluationPeriode','elevesClasse'));
    }

    public function saveEvaluationPeriode(Etablissement $etablissement, Request $request){

        $data = $request->validate([
            "classe_annee_id"=> "required",
            "classe_matiere_id"=> "required",
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
        $sous_periodes = $etablissement->getSousPeriodes();
        return view('gestscol.note.donnees.gestion-avance',compact('etablissement','classes','periodes','sous_periodes'));
    }

    public function saveNote(Etablissement $etablissement, Request $request){
        $status = false;
        try {
            $status = true;
            
            foreach ($request->notes as $key => $note) {
                 
                if (!isset($note['id'])) {
                    $note_eleve = new Note();
                    $note_eleve->evaluation_periode_id = $note["evaluation_periode_id"];
                    $note_eleve->eleve_classe_id = $note['eleve_classe_id'];
                    $note_eleve->note = $note["note"];
                    $note_eleve->save();
                } else {
                    $note_eleve = Note::find($note['id']);
                    $note_eleve->evaluation_periode_id = $note["evaluation_periode_id"];
                    $note_eleve->eleve_classe_id = $note['eleve_classe_id'];
                    $note_eleve->note = $note["note"];
                    $note_eleve->save();
                }
            }
            Session::flash('success','les notes de l\'élèves sur cette periode on ete créé correctement ');
            return response()->json(compact('etablissement','status') );
        } catch (\Throwable $e) {
            $status = false;
            Session::flash('error','Une erreur c\'est produite');
            return response()->json(compact('etablissement','status','e') );
        }
    }

    public function updateEvalution(Etablissement $etablissement, Request $request){
        $status = false;
        try {
            $status = true;
            foreach ($request->evaluationPeriode as $key => $evaluation) {
                
                $evaluationPeriode = EvaluationPeriode::find($evaluation['id']);
                if (isset($evaluation["sp"])) {
                    $evaluationPeriode->pourcentage_sous_periode = $evaluation["sp"];
                }else{
                    $evaluationPeriode->pourcentage_periode = $evaluation["p"];
                }
                
                $evaluationPeriode->save();
            }
            Session::flash('success','evaluation mise à jour');
            return response()->json(compact('etablissement','status') );
        } catch (\Throwable $e) {
            $status = false;
            Session::flash('error','Une erreur c\'est produite');
            return response()->json(compact('etablissement','status','e') );
        }
    }

    public function getMatiereFromClasse(Request $request){
        $matieres = ClasseMatiere::join('matiere_niveaux','matiere_niveaux.id','=','classe_matieres.matiere_niveau_id')
                                ->join('matieres','matieres.id','=','matiere_niveaux.matiere_id')
                                ->where('classe_matieres.classe_annee_id',$request->classeAnneId)
                                ->select('matieres.name','classe_matieres.id')
                                ->get();
        \Debugbar::info($matieres);
        
        
        return response()->json($matieres);
    }


    public function getEvaluationPeriode(Etablissement $etablissement,Request $request){
        $sousPeriodes = SousPeriode::where('periode_id',$request->periodeId)->get();
        if ($request->isAvance) {
            $evaluationPeriodes = EvaluationPeriode::where([['periode_id',$request->periodeId],['classe_matiere_id',$request->matiereAnne],['classe_annee_id',$request->classeAnneId]])->get();
            $evaluations = collect();
            foreach ($evaluationPeriodes as $key => $eval) {
                $eval->evalutionName = $eval->Evaluation->name;
                $eval->pName =  $etablissement->nom_periode." ".$eval->Periode->numero;
                $eval->spName = $etablissement->nom_sous_periode." ".$eval->SousPeriode->numero;
                $eval->pPourcent = $eval->Periode->pourcentage;
                $eval->spPourcent = $eval->SousPeriode->pourcentage;
                $eval->effectif = $eval->EffectifEvaluate()->count();
                $eval->max = 0;
                $eval->min = $eval->bareme;
                $eval->sBareme = $eval->bareme * $eval->EffectifEvaluate()->count();
                $somNote = 0;
                $eval->qMoy = 0;
                foreach ($eval->EffectifEvaluate() as $note) {
                    $somNote = $somNote + $note->note;
                    if ($note->note > 0 && $note->note != null) {
                        if($eval->max < $note->note){
                            $eval->max = $note->note;
                        }
                        if($eval->min > $note->note){
                            $eval->min = $note->note;
                        }
                        if($note->note >= ($eval->bareme/2)){
                            $eval->qMoy = $eval->qMoy + 1;
                        }
                    }else{
                        $eval->min = 0;
                    }
                }
                $eval->smoy = round($somNote, 2) ;
                $eval->moy = ($eval->smoy == 0 || $eval->effectif == 0)? "": round(($eval->smoy/$eval->effectif), 2) ;
                $eval->pMoy = ($eval->smoy == 0 || $eval->effectif == 0)? "": round((($eval->smoy/$eval->sBareme) * 100), 2);
                $evaluations->push($eval);
            }
            return response()->json(compact("sousPeriodes","evaluations"));
        }
        return response()->json($sousPeriodes);
    }

    public function getEnseignant(Request $request){
        $classeMatiere = ClasseMatiere::where('id', $request->matiereAnne)->first();
        $enseignant = $classeMatiere->Enseignant;
        \Debugbar::info($classeMatiere);
        return response()->json($enseignant);
    }

    public function getEvaluationSousPeriode(Etablissement $etablissement,Request $request){
        $evaluationPeriodes = EvaluationPeriode::where([['sous_periode_id',$request->sousPeriodeId],['classe_matiere_id',$request->matiereAnne],['classe_annee_id',$request->classeAnneId]])->get();
            $evaluations = collect();
            foreach ($evaluationPeriodes as $key => $eval) {
                $eval->evalutionName = $eval->Evaluation->name;
                $eval->pName =  $etablissement->nom_periode." ".$eval->Periode->numero;
                $eval->spName = $etablissement->nom_sous_periode." ".$eval->SousPeriode->numero;
                $eval->pPourcent = $eval->Periode->pourcentage;
                $eval->spPourcent = $eval->SousPeriode->pourcentage;
                $eval->effectif = $eval->EffectifEvaluate()->count();
                $eval->max = 0;
                $eval->min = $eval->bareme;
                $eval->sBareme = $eval->bareme * $eval->EffectifEvaluate()->count();
                $somNote = 0;
                $eval->qMoy = 0;
                foreach ($eval->EffectifEvaluate() as $note) {
                    $somNote = $somNote + $note->note;
                    if ($note->note > 0 && $note->note != null) {

                        if($eval->max < $note->note){
                            $eval->max = $note->note;
                        }
                        if($eval->min > $note->note){
                            $eval->min = $note->note;
                        }
                        if($note->note >= ($eval->bareme/2)){
                            $eval->qMoy = $eval->qMoy + 1;
                        }
                    }else{
                        $eval->min = 0;
                    }
                }
                $eval->smoy = round($somNote, 2) ;
                $eval->moy = ($eval->smoy == 0 || $eval->effectif == 0)? "": round(($eval->smoy/$eval->effectif), 2) ;
                $eval->pMoy = ($eval->smoy == 0 || $eval->effectif == 0)? "": round((($eval->smoy/$eval->sBareme) * 100), 2);
                $evaluations->push($eval);
            }
            return response()->json($evaluations);
    }
}
