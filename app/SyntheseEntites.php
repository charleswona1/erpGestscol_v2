<?php

namespace App;

use App\Models\ClasseMatiere;
use App\Models\EleveClasse;
use App\Models\EvaluationPeriode;
use App\Models\GroupeMatiere;
use App\Models\Matiere;

class SyntheseEntites
{
    public static function evaluationPeride($periode, $classe_annee){
        $req = EvaluationPeriode::join('classe_matieres','evaluation_periodes.classe_matiere_id','=','classe_matieres.id')
        ->join('matiere_niveaux','classe_matieres.matiere_niveau_id','=','matiere_niveaux.id')
        ->join('matieres','matiere_niveaux.matiere_id','=','matieres.id')
        ->join('notes','notes.evaluation_periode_id','=','evaluation_periodes.id')
        ->join('eleve_classes','notes.eleve_classe_id','=','eleve_classes.id')
        ->where([['evaluation_periodes.periode_id',$periode],['evaluation_periodes.classe_annee_id',$classe_annee],['evaluation_periodes.pourcentage_periode','<>',0]])
        ->select(
            'eleve_classes.nom',
            'eleve_classes.id as eleve_id',
            'notes.note','evaluation_periodes.*',
            'matieres.name as matiere_name',
            'matieres.abreviation'
            )
        ->get();
        return $req;
    }

    public static function evaluationSousPeridePeride($sous_periode, $classe_annee){
        $req = EvaluationPeriode::join('classe_matieres','evaluation_periodes.classe_matiere_id','=','classe_matieres.id')
        ->join('matiere_niveaux','classe_matieres.matiere_niveau_id','=','matiere_niveaux.id')
        ->join('matieres','matiere_niveaux.matiere_id','=','matieres.id')
        ->join('notes','notes.evaluation_periode_id','=','evaluation_periodes.id')
        ->join('eleve_classes','notes.eleve_classe_id','=','eleve_classes.id')
        ->where([['evaluation_periodes.sous_periode_id',$sous_periode],['evaluation_periodes.classe_annee_id',$classe_annee],['evaluation_periodes.pourcentage_sous_periode','<>',0]])
        ->select(
            'eleve_classes.nom',
            'eleve_classes.id as eleve_id',
            'notes.note','evaluation_periodes.*',
            'matieres.name as matiere_name',
            'matieres.abreviation'
            )
        ->get();
        return $req;
    }

    public static function matiereEleveSousPeriode($classe_annee){
        $matieres= ClasseMatiere::join('matiere_niveaux','classe_matieres.matiere_niveau_id','=','matiere_niveaux.id')
        ->join('matieres','matiere_niveaux.matiere_id','=','matieres.id')
        ->select("classe_matieres.id as classe_matiere_id","matiere_niveaux.groupe_matiere_id","matieres.*","matiere_niveaux.coefficient")
        ->where('classe_matieres.classe_annee_id',$classe_annee)
        ->get();

        $eleves= EleveClasse::where('classe_annee_id',$classe_annee)
        ->select("id",
        "eleve_id",
        'ancien',
        'is_redouble',
        "etablissement_id",
        "annee_academique_id",
        "nom")
        ->get();

      

        return compact("matieres","eleves");
    }

    public static function calculNoteMatierePeriode($eleve,$periode,$classMatiereArray,$evaluationArray){
        $note = 0;
        $noteParMatiere = collect();
        $moyenGeneraleCoefficie = 0;
        $coefTotale = 0;

        $moyenGpr1Coefficie = 0;
        $coefTotaleGrp1 = 0;

        $moyenGpr2Coefficie = 0;
        $coefTotaleGrp2 = 0;

        $moyenGpr3Coefficie = 0;
        $coefTotaleGrp3 = 0;

        foreach ($classMatiereArray as $classeMatiere) {
            $note = 0;
            $goupre = GroupeMatiere::find($classeMatiere->groupe_matiere_id);
            $EvaluationIdArray = [];
            foreach ($evaluationArray as $evaluation) {
                if ($evaluation->eleve_id == $eleve && $evaluation->classe_matiere_id == $classeMatiere->classe_matiere_id && $evaluation->periode_id == $periode) {
                    $note = $note +( (self::generateNoteFromBareme($evaluation->bareme, $evaluation->note)  <= 0 || $evaluation->pourcentage_periode <= 0 )? 0: self::generateNoteFromBareme($evaluation->bareme, $evaluation->note) * ($evaluation->pourcentage_periode/100));
                    array_push($EvaluationIdArray,$evaluation->classe_matiere_id);
                }
            }
            if ($goupre->numero == 1 && in_array($classeMatiere->classe_matiere_id,$EvaluationIdArray)) {
                $coefTotaleGrp1 = $coefTotaleGrp1 + $classeMatiere->coefficient;
                $moyenGpr1Coefficie = $moyenGpr1Coefficie + ($note * $classeMatiere->coefficient);
                $groupe_id1 = $goupre->id;
            }elseif ($goupre->numero == 2 && in_array($classeMatiere->classe_matiere_id,$EvaluationIdArray)) {
                $coefTotaleGrp2 = $coefTotaleGrp2 + $classeMatiere->coefficient;
                $moyenGpr2Coefficie = $moyenGpr2Coefficie + ($note * $classeMatiere->coefficient);
                $groupe_id2 = $goupre->id;
            }elseif($goupre->numero == 3 && in_array($classeMatiere->classe_matiere_id,$EvaluationIdArray)) {
                $coefTotaleGrp3= $coefTotaleGrp3 + $classeMatiere->coefficient;
                $moyenGpr3Coefficie = $moyenGpr3Coefficie + ($note * $classeMatiere->coefficient);
                $groupe_id3 = $goupre->id;
            }
            $coefTotale = $coefTotale + $classeMatiere->coefficient ;
            $moyenGeneraleCoefficie = $moyenGeneraleCoefficie + ($note * $classeMatiere->coefficient);
            $noteParMatiere->push(collect(['note'=>round(($note), 2), 'coef'=>$classeMatiere->coefficient, 'classe_matiere_id'=>$classeMatiere->classe_matiere_id, 'groupe_matiere_id'=>$goupre->id]));
        }
        $ligneGroupes = collect();
        
        $moyenGenerale = $moyenGeneraleCoefficie == 0? 0 :  round(($moyenGeneraleCoefficie/$coefTotale), 2);
        $moyenGrp1 = $moyenGpr1Coefficie == 0? 0 : round(($moyenGpr1Coefficie/$coefTotaleGrp1), 2)  ;
        $moyenGrp2 = $moyenGpr2Coefficie == 0? 0 : round(($moyenGpr2Coefficie/$coefTotaleGrp2), 2);
        $moyenGrp3 = $moyenGpr3Coefficie == 0? 0 : round(($moyenGpr3Coefficie/$coefTotaleGrp3), 2);
        if($coefTotaleGrp1 > 0){
            $ligneGroupes->push(['groupe_matiere_id'=>$groupe_id1, 'coef'=>$coefTotaleGrp1, 'moyenne_groupe'=> $moyenGrp1 ]);
        }
        if($coefTotaleGrp2 > 0){
            $ligneGroupes->push(['groupe_matiere_id'=>$groupe_id2, 'coef'=>$coefTotaleGrp2, 'moyenne_groupe'=> $moyenGrp2 ]);
        }
        if($coefTotaleGrp3 > 0){
            $ligneGroupes->push(['groupe_matiere_id'=>$groupe_id3, 'coef'=>$coefTotaleGrp3, 'moyenne_groupe'=> $moyenGrp3 ]);
        }

        return compact('moyenGrp1','moyenGrp2','moyenGrp3','moyenGenerale','noteParMatiere','ligneGroupes');
    }

    public static function calculNoteMatiereSousPeriode($eleve,$SousPeriode,$classMatiereArray,$evaluationArray){
        
        $note = 0;
        $noteParMatiere = collect();
        $moyenGeneraleCoefficie = 0;
        $coefTotale = 0;

        $moyenGpr1Coefficie = 0;
        $coefTotaleGrp1 = 0;

        $moyenGpr2Coefficie = 0;
        $coefTotaleGrp2 = 0;

        $moyenGpr3Coefficie = 0;
        $coefTotaleGrp3 = 0;
        
        
        foreach ($classMatiereArray as $classeMatiere) {
            $note = 0;
            $goupre = GroupeMatiere::find($classeMatiere->groupe_matiere_id);
            $EvaluationIdArray = [];
            foreach ($evaluationArray as $evaluation) {
                if ($evaluation->eleve_id == $eleve && $evaluation->classe_matiere_id == $classeMatiere->classe_matiere_id && $evaluation->sous_periode_id == $SousPeriode) {
                    $note = $note +((self::generateNoteFromBareme($evaluation->bareme, $evaluation->note)  <= 0 || $evaluation->pourcentage_sous_periode <= 0 )? 0:self::generateNoteFromBareme($evaluation->bareme, $evaluation->note) * ($evaluation->pourcentage_sous_periode/100));
                    array_push($EvaluationIdArray,$evaluation->classe_matiere_id);
                }
            }
            

            if ($goupre->numero == 1 && in_array($classeMatiere->classe_matiere_id,$EvaluationIdArray)) {
                $coefTotaleGrp1 = $coefTotaleGrp1 + $classeMatiere->coefficient;
                $moyenGpr1Coefficie = $moyenGpr1Coefficie + ($note * $classeMatiere->coefficient);
                $groupe_id1 = $goupre->id;
            }elseif ($goupre->numero == 2 && in_array($classeMatiere->classe_matiere_id,$EvaluationIdArray)) {
                $coefTotaleGrp2 = $coefTotaleGrp2 + $classeMatiere->coefficient;
                $moyenGpr2Coefficie = $moyenGpr2Coefficie + ($note * $classeMatiere->coefficient);
                $groupe_id2 = $goupre->id;
            }elseif ($goupre->numero == 3 && in_array($classeMatiere->classe_matiere_id,$EvaluationIdArray)) {
                $coefTotaleGrp3= $coefTotaleGrp3 + $classeMatiere->coefficient;
                $moyenGpr3Coefficie = $moyenGpr3Coefficie + ($note * $classeMatiere->coefficient);
                $groupe_id3 = $goupre->id;
            }
            $coefTotale = $coefTotale + $classeMatiere->coefficient ;
            $moyenGeneraleCoefficie = $moyenGeneraleCoefficie + ($note * $classeMatiere->coefficient);
            $noteParMatiere->push(collect(['note'=>round(($note), 2), 'coef'=>$classeMatiere->coefficient, 'classe_matiere_id'=>$classeMatiere->classe_matiere_id, 'groupe_matiere_id'=>$goupre->id]));
        }
        $ligneGroupes = collect();
        $moyenGenerale = $moyenGeneraleCoefficie == 0? 0 :  round(($moyenGeneraleCoefficie/$coefTotale), 2);
        $moyenGrp1 = $moyenGpr1Coefficie == 0? 0 : round(($moyenGpr1Coefficie/$coefTotaleGrp1), 2)  ;
        $moyenGrp2 = $moyenGpr2Coefficie == 0? 0 : round(($moyenGpr2Coefficie/$coefTotaleGrp2), 2);
        $moyenGrp3 = $moyenGpr3Coefficie == 0? 0 : round(($moyenGpr3Coefficie/$coefTotaleGrp3), 2);
        if($coefTotaleGrp1 > 0){
            $ligneGroupes->push(['groupe_matiere_id'=>$groupe_id1, 'coef'=>$coefTotaleGrp1, 'moyenne_groupe'=> $moyenGrp1 ]);
        }
        if($coefTotaleGrp2 > 0){
            $ligneGroupes->push(['groupe_matiere_id'=>$groupe_id2, 'coef'=>$coefTotaleGrp2, 'moyenne_groupe'=> $moyenGrp2 ]);
        }
        if($coefTotaleGrp3 > 0){
            $ligneGroupes->push(['groupe_matiere_id'=>$groupe_id3, 'coef'=>$coefTotaleGrp3, 'moyenne_groupe'=> $moyenGrp3 ]);
        }

        return compact('moyenGrp1','moyenGrp2','moyenGrp3','moyenGenerale','noteParMatiere','ligneGroupes');
    }

    public static function generateNoteFromBareme($bareme,$note){
        $noteSur20 = 0;
        if($bareme != 20){
            $noteSur20 = ($note * 20)/$bareme;
        }else{
            $noteSur20 = $note;
        }

        return $noteSur20;
    }

    public static function OrderByNoteGenerale($elevesData){
        //dd($eleves[0]["notesEleve"]["moyenGenerale"]);
        $eleves = $elevesData;
        $max = $eleves[0];
        for ($i=1; $i <count($eleves) ; $i++) { 
            if ($eleves[$i-1]["notesEleve"]["moyenGenerale"] < $eleves[$i]["notesEleve"]["moyenGenerale"]) {
                $max = $eleves[$i];
                $eleves[$i] = $eleves[$i-1];
                $eleves[$i-1] = $max;
            }
        }
        return $eleves;
    }


    public static function getMatiereParGroupeClasse($classe_annee,$niveau){
        $groupes = GroupeMatiere::where('niveau_id',$niveau)->get();

        foreach ($groupes as $key => $groupe) {
            
        }
    }

}