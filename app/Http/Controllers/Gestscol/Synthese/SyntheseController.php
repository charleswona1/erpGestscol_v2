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
use App\Models\ligneGoupe;
use App\Models\LigneSynthese;
use App\Models\Matiere;
use App\Models\Note;
use App\Models\Synthese;
use App\Models\SyntheseClasse;
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

    public function EvaluationEleveMatierePeriode(Etablissement $etablissement,Request $request){
        $eleveClasses = SyntheseEntites::matiereEleveSousPeriode($request->classe_annee_id);
        $noteEleve = collect();
        $periode_id = null;
        $sous_periode_id = null;
        $checkExistSynthese = false;
        if (isset($request->periode_id)) {
            $SyntheseP = SyntheseClasse::where([['classe_annee_id',$request->classe_annee_id],['etablissement_id',$etablissement->id],['periode_id',$request->periode_id]])->get();
            $periode_id = $request->periode_id;
            $req = SyntheseEntites::evaluationPeride($request->periode_id,$request->classe_annee_id);
            foreach ($eleveClasses["eleves"] as $eleve) {
                $note =SyntheseEntites::calculNoteMatierePeriode($eleve->id,$request->periode_id,$eleveClasses["matieres"],$req);
                $noteEleve->push($note);
                $eleve->notesEleve = $note;
            }
            if(count($SyntheseP) > 0){
                $checkExistSynthese = true;
            }
        }else if (isset($request->sous_periode_id)){
            $SyntheseSP = SyntheseClasse::where([['classe_annee_id',$request->classe_annee_id],['etablissement_id',$etablissement->id],['sous_periode_id',$request->sous_periode_id]])->get();
            $sous_periode_id = $request->sous_periode_id;
            $req = SyntheseEntites::evaluationSousPeridePeride($request->sous_periode_id,$request->classe_annee_id);
           
            foreach ($eleveClasses["eleves"] as $eleve) {
                
                $note =SyntheseEntites::calculNoteMatiereSousPeriode($eleve->id,$request->sous_periode_id,$eleveClasses["matieres"],$req);
                
                $noteEleve->push($note);
                
                $eleve->notesEleve = $note;
            }
            if(count($SyntheseSP) > 0){
                $checkExistSynthese = true;
            }
            
        }

        $eleves = $eleveClasses["eleves"];
        $matieres = $eleveClasses["matieres"];
        $eleves = SyntheseEntites::OrderByNoteGenerale($eleves);

        

        $noteEleveOrder = compact("eleves","matieres","periode_id","sous_periode_id","checkExistSynthese");
        return response()->json($noteEleveOrder);
    }


    public function Bulletins(Etablissement $etablissement){
        $classes = $etablissement->getClasses();
        $periodes = $etablissement->getPeriodes();
        $sous_periodes = $etablissement->getSousPeriodes();
        return view("gestscol.note.documents.bulletin",compact('etablissement','classes','periodes','sous_periodes'));
    }

    public function getBulletinEleve(Request $request) {
        $notes = null;
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
            $notesClass = null;
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

    public function saveCloture(Etablissement $etablissement,Request $request){
        try {
            // enregistrement du lot de synthese de la classe
            $syntheseClasse = $this::saveSyntheseClasse($etablissement,$request);
            if($syntheseClasse != false){
                // enregistrement du lot de synthese
                foreach ($request->listeSynthese as $synthese) {
                    $syntheses = Synthese::where([['synthese_classe_id',$syntheseClasse->id],['eleve_classe_id',$synthese['eleve_classe_id']],['etablissement_id',$etablissement->id]])->first();
                    if(isset($syntheses) == false){
                        $syntheses = new Synthese();
                    }
                    $syntheses->synthese_classe_id = $syntheseClasse->id;
                    $syntheses->eleve_classe_id = $synthese['eleve_classe_id'];
                    $syntheses->etablissement_id = $etablissement->id;
                    $syntheses->som_point = $synthese['som_point'];
                    $syntheses->som_coef = $synthese['som_coef'];
                    $syntheses->rang = $synthese['rang'];
                    $syntheses->moyenne_generale = $synthese['moyenne_generale'];
                    $syntheses->appreciation = $synthese['appreciation'];
                    $syntheses->mention = $synthese['mention'];
        
                    $syntheses->save();
                }
                // enregistrement du lot de linge de synthese
                foreach ($request->listeLigneSynthese as $itemLigneSynthese) {
                $ligneSynthese = LigneSynthese::where([
                        ['synthese_classe_id',$syntheseClasse->id],
                        ['eleve_classe_id',$itemLigneSynthese['eleve_classe_id']],
                        ['etablissement_id',$etablissement->id],
                        ['classe_matiere_id',$itemLigneSynthese['classe_matiere_id']],
                        ['groupe_matiere_id', $itemLigneSynthese['groupe_matiere_id']]
                    ])->first();
                    if(isset($ligneSynthese) == false){
                        $ligneSynthese = new LigneSynthese();
                    }
                $ligneSynthese->synthese_classe_id = $syntheseClasse->id;
                $ligneSynthese->etablissement_id = $etablissement->id;
                $ligneSynthese->eleve_classe_id  = $itemLigneSynthese['eleve_classe_id'];
                $ligneSynthese->coef  = $itemLigneSynthese['coef'];
                $ligneSynthese->groupe_matiere_id  = $itemLigneSynthese['groupe_matiere_id'];
                $ligneSynthese->moyenne  = $itemLigneSynthese['moyenne'];
                $ligneSynthese->total_point  = $itemLigneSynthese['total_point'];
                $ligneSynthese->rang  = $itemLigneSynthese['rang'];
                $ligneSynthese->classe_matiere_id  = $itemLigneSynthese['classe_matiere_id'];

                $ligneSynthese->save();
                }
                // enregistrement du lot de ligne de groupe 
                foreach ($request->listLigneGroupe as $itemLigneGroupe) {
                    $ligneGroupe = ligneGoupe::where([
                        ['synthese_classe_id',$syntheseClasse->id],
                        ['eleve_classe_id',$itemLigneGroupe['eleve_classe_id']],
                        ['etablissement_id',$etablissement->id],
                        ['groupe_matiere_id', $itemLigneGroupe['groupe_matiere_id']]
                    ])->first();
                    if(isset($ligneGroupe) == false){
                        $ligneGroupe = new ligneGoupe();
                    }
                    $ligneGroupe->synthese_classe_id = $syntheseClasse->id;
                    $ligneGroupe->etablissement_id = $etablissement->id;
                    $ligneGroupe->eleve_classe_id  = $itemLigneGroupe['eleve_classe_id'];
                    $ligneGroupe->somme_coef  = $itemLigneGroupe['somme_coef'];
                    $ligneGroupe->groupe_matiere_id  = $itemLigneGroupe['groupe_matiere_id'];
                    $ligneGroupe->moyenne_groupe  = $itemLigneGroupe['moyenne_groupe'];
                    $ligneGroupe->somme_point  = $itemLigneGroupe['somme_point'];
    
                    $ligneGroupe->save();
                }
            } 
            return response()->json(true,200);
        } catch (\Throwable $th) {
            return response()->json(false,404);
        }
          

    }

    public static function saveSyntheseClasse(Etablissement $etablissement,Request $request){
        try {

            $syntheseClasse = SyntheseClasse::where([['classe_annee_id',$request->classe_annee_id],['etablissement_id',$etablissement->id],['periode_id',$request->periode_id]])
                                            ->orWhere([['classe_annee_id',$request->classe_annee_id],['etablissement_id',$etablissement->id],['sous_periode_id',$request->sous_periode_id]])->first();

            if(isset($syntheseClasse) == false){
                $syntheseClasse = new SyntheseClasse();
            }
            $syntheseClasse->classe_annee_id = $request->classe_annee_id;
            $syntheseClasse->annee_academique_id = $request->annee_academique_id;
            $syntheseClasse->periode_id = $request->periode_id;
            $syntheseClasse->sous_periode_id = $request->sous_periode_id;
            $syntheseClasse->etablissement_id = $etablissement->id;
            $syntheseClasse->moy_classe = $request->moy_classe;
            $syntheseClasse->moy_max = $request->moy_max;
            $syntheseClasse->moy_min = $request->moy_min;
            $syntheseClasse->effectif = $request->effectif;
    
            $syntheseClasse->save();
    
            return $syntheseClasse;
        } catch (\Throwable $th) {
            return false;
        }
       
    }

    public static function saveSynthese(Etablissement $etablissement,$synthese_classe_id,$synthese){
        return $synthese;
        try {
            $syntheses = new Synthese();
            $syntheses->synthese_classe_id = $synthese_classe_id;
            $syntheses->eleve_classe_id = $synthese->eleve_classe_id;
            $syntheses->etablissement_id = $etablissement->id;
            $syntheses->som_point = $synthese->som_point;
            $syntheses->som_coef = $synthese->som_coef;
            $syntheses->rang = $synthese->rang;
            $syntheses->appreciation = $synthese->appreciation;
            $syntheses->mention = $synthese->mention;
    
            $synthese->save();

        } catch (\Throwable $th) {
            logger("erreur d'enregistrement : ".$th->getMessage());
        }
       
    }


}

