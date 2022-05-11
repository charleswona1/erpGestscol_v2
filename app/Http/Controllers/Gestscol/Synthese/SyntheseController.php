<?php

namespace App\Http\Controllers\Gestscol\Synthese;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Models\EleveClasse;
use App\Models\Etablissement;
use App\Models\EvaluationPeriode;
use App\Models\ClasseMatiere;
use App\Models\EnseignantAnnee;
use App\Models\MatiereNiveau;
use App\Models\GroupeMatiere;
use App\Models\Matiere;
use App\Models\Note;
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

    public function getBulletinEleve(Request $request) {
        $notes;
        $base_bareme = 20;

        if($request->limitation == 'p') {
            $notes = Note::leftjoin('evaluation_periodes','evaluation_periodes.id','=','notes.evaluation_periode_id')
            ->leftjoin('eleve_classes','eleve_classes.id','=','notes.eleve_classe_id')
            ->leftjoin('classe_matieres','classe_matieres.id','=','evaluation_periodes.classe_matiere_id')
            ->leftjoin('enseignant_annees','enseignant_annees.id','=','classe_matieres.enseignant_annee_id')
            ->leftjoin('matiere_niveaux','matiere_niveaux.id','=','classe_matieres.matiere_niveau_id')
            ->leftjoin('groupe_matieres','groupe_matieres.id','=','matiere_niveaux.groupe_matiere_id')
            ->leftjoin('matieres','matieres.id','=','matiere_niveaux.matiere_id')
            ->where([
                ['eleve_classe_id', $request->student_id],
                ['evaluation_periodes.periode_id', $request->periode]
            ])
            ->select('matieres.name', 'matieres.id as id_matiere', 'evaluation_periodes.periode_id', 'evaluation_periodes.bareme', 'evaluation_periodes.pourcentage_periode as pourcentage', 'matiere_niveaux.coefficient','matieres.abreviation','enseignant_annees.name as enseignantName', 'groupe_matieres.name as nameGroupe', 'groupe_matieres.numero as group', 'notes.note')
            ->orderBy('groupe_matieres.numero', 'asc')
            ->get();


        } else {
            $notes = Note::leftjoin('evaluation_periodes','evaluation_periodes.id','=','notes.evaluation_periode_id')
            ->leftjoin('eleve_classes','eleve_classes.id','=','notes.eleve_classe_id')
            ->leftjoin('classe_matieres','classe_matieres.id','=','evaluation_periodes.classe_matiere_id')
            ->leftjoin('enseignant_annees','enseignant_annees.id','=','classe_matieres.enseignant_annee_id')
            ->leftjoin('matiere_niveaux','matiere_niveaux.id','=','classe_matieres.matiere_niveau_id')
            ->leftjoin('groupe_matieres','groupe_matieres.id','=','matiere_niveaux.groupe_matiere_id')
            ->leftjoin('matieres','matieres.id','=','matiere_niveaux.matiere_id')
            ->where([
                ['eleve_classe_id', $request->student_id],
                ['evaluation_periodes.sous_periode_id', $request->periode]
            ])
            ->select('matieres.name', 'matieres.id as id_matiere', 'evaluation_periodes.sous_periode_id', 'evaluation_periodes.bareme', 'evaluation_periodes.pourcentage_sous_periode as pourcentage', 'matiere_niveaux.coefficient','matieres.abreviation','enseignant_annees.name as enseignantName', 'groupe_matieres.name as nameGroupe', 'groupe_matieres.numero as group', 'notes.note')
            ->orderBy('groupe_matieres.numero', 'asc')
            ->get();
        }

        $note_periode = $notes;
        //return $note_periode;
        $notes = $this::calculNoteMatierPeriode($notes);
        return $notes;
        $result = [];
        foreach ($notes as $note) {
            $groups = [];
            foreach ($notes as $key => $newnote) {
                if($note->nameGroupe == $newnote->nameGroupe) {
                    array_push($groups, $newnote);
                    unset($notes[$key]);
                }
            }
            if(sizeof($groups) > 0) {
                array_push($result, $groups);	
            }
        }

        $eleve = EleveClasse::find($request->student_id);
        
        $elevesInClassAnne = EleveClasse::where('classe_annee_id', $eleve->classe_annee_id)->get();
        
        $moyennesClass = [];
        foreach ($elevesInClassAnne as $key => $item) {
            $notesClass;
            if($request->limitation == 'p') {
                $notesClass = Note::leftjoin('evaluation_periodes','evaluation_periodes.id','=','notes.evaluation_periode_id')
                ->leftjoin('eleve_classes','eleve_classes.id','=','notes.eleve_classe_id')
                ->leftjoin('classe_matieres','classe_matieres.id','=','evaluation_periodes.classe_matiere_id')
                ->leftjoin('enseignant_annees','enseignant_annees.id','=','classe_matieres.enseignant_annee_id')
                ->leftjoin('matiere_niveaux','matiere_niveaux.id','=','classe_matieres.matiere_niveau_id')
                ->leftjoin('groupe_matieres','groupe_matieres.id','=','matiere_niveaux.groupe_matiere_id')
                ->leftjoin('matieres','matieres.id','=','matiere_niveaux.matiere_id')
                ->where([
                    ['eleve_classe_id', $item->id],
                    ['evaluation_periodes.periode_id', $request->periode]
                ])
                ->select('matieres.id as id_matiere', 'evaluation_periodes.periode_id', 'evaluation_periodes.bareme', 'evaluation_periodes.pourcentage_sous_periode as pourcentage', 'matiere_niveaux.coefficient', 'notes.note')
                ->get();
            } else {
                $notesClass = Note::leftjoin('evaluation_periodes','evaluation_periodes.id','=','notes.evaluation_periode_id')
                ->leftjoin('eleve_classes','eleve_classes.id','=','notes.eleve_classe_id')
                ->leftjoin('classe_matieres','classe_matieres.id','=','evaluation_periodes.classe_matiere_id')
                ->leftjoin('matiere_niveaux','matiere_niveaux.id','=','classe_matieres.matiere_niveau_id')
                ->leftjoin('matieres','matieres.id','=','matiere_niveaux.matiere_id')
                ->where([
                    ['eleve_classe_id', $item->id],
                    ['evaluation_periodes.sous_periode_id', $request->periode]
                ])
                ->select('matieres.id as id_matiere', 'evaluation_periodes.sous_periode_id', 'evaluation_periodes.bareme', 'evaluation_periodes.pourcentage_sous_periode as pourcentage', 'matiere_niveaux.coefficient', 'notes.note')
                ->get();
            }

            $sommeNote = 0;
            $sumCoef = 0;
            
            $notesClass = $this::calculNoteMatierPeriode($notesClass);
            
            foreach ($notesClass as $key => $value) {
                $sumCoef += $value->coefficient;
                $sommeNote += $value->note * $value->coefficient;
            }
            if($sumCoef != 0) {
                array_push($moyennesClass, $sommeNote / $sumCoef);
            }
            
        }
        
        return ["notesStudent" => $result, "notesAllStudents" => $moyennesClass];
    
    }


    public function calculNoteMatierPeriode($notes) {
        $result = [];
        $base_bareme = 20;
        
        //regrouper les matiers identiques en une matiere
        foreach ($notes as $note) {
            $trouve = false;
            if(sizeof($result) == 0) {
                array_push($result, $note);
            }
            
            foreach ($result as $key => $value) {
                if($note->id_matiere == $value->id_matiere) {
                    $trouve = true;
                }  
            }

            if(!$trouve) {
                array_push($result, $note);
            }
        }

        // regrouper les matieres identique en liste
        $matieres = [];
        foreach ($result as $key => $item) {
            $arrayNote = [];
            
            foreach ($notes as $matiere) {
                if($item->id_matiere == $matiere->id_matiere) {
                    array_push($arrayNote, $matiere);
                }  
            }
            array_push($matieres, $arrayNote);
        }
        
        $notes = [];
        foreach ($matieres as $key => $matiere) {
            $note_data = $matiere[0];
            
            $valeur_note = 0;
            $matier_note = [];
            foreach ($matiere as $key => $note) {
                // ramener les notes au mm bareme ($base_bareme == 20)
                $indice_bareme = $base_bareme / $note->bareme;
                $value = $note->note * $indice_bareme;

                //calcul de la valeur réel de la note en tennant compte du pourcentage
                $value = $value * $note->pourcentage / 100;  
                $valeur_note += $value;
                array_push($matier_note, $note);
            }
            $note_data->note = $valeur_note;
            
            //$note_data->notes = $matier_note;
            //$data = (object) array_merge( $note_data,array("notes"=> $matier_note));
            array_push($notes, $note_data);
        }

        return $notes;

    }


}

