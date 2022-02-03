<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Etablissement extends Model
{
    use HasFactory;

    public function getCycle()
    {
        return $this->hasMany(Cycle::class, 'etablissement_id');
    }
    
    public function getNiveaux()
    {
        return $this->hasMany(Niveau::class, 'etablissement_id');
    }
    
    public function getAnneeAcademique()
    {
        return $this->hasOne(AnneeAcademique::class, 'etablissement_id')
                      ->where('isdefault', 1);
    }

    //recuperer les classes de l'établissement en cours
    public function getClasses()
    {
        $data = ClasseAnnee::join('niveaux', 'classe_annees.niveau_id', '=', 'niveaux.id')
        ->join('etablissements', 'niveaux.etablissement_id', '=', 'etablissements.id')
        ->where('etablissements.id', $this->id)
        ->get(['classe_annees.*']);
        
        return $data;
    }
      //recuperer les parametrages de l'établissement en cours
      public function getParametrageSanctions()
      {
          $data = ParametrageSanction::join('cycles', 'parametrage_sanctions.cycle_id', '=', 'cycles.id')
          ->join('etablissements', 'cycles.etablissement_id', '=', 'etablissements.id')
          ->where('etablissements.id', $this->id)
          ->get(['parametrage_sanctions.*']);
          
          return $data;
      }
    // public function getClasseAnne(){
    //     return $this->hasMany(ClasseAnnee::class);
    // }

      //recuperer les matières d'un l'établissement en cours et de l'annee en cours
       public function getMatieres()
      {
          $data = Matiere::join('annee_academiques', 'matieres.annee_academique_id', '=', 'annee_academiques.id')
          ->join('etablissements', 'annee_academiques.etablissement_id', '=', 'etablissements.id')
          ->where('etablissements.id', $this->id)
          ->where('annee_academiques.isdefault', 1)
          ->get(['matieres.*']);
          
          return $data;
      }
        //recuperer les goupes de matières d'un l'établissement en cours et de l'annee en cours
        public function getGroupeMatieres()
        {
            $data = GroupeMatiere::join('annee_academiques', 'groupe_matieres.annee_academique_id', '=', 'annee_academiques.id')
            ->join('etablissements', 'annee_academiques.etablissement_id', '=', 'etablissements.id')
            ->where('etablissements.id', $this->id)
            ->where('annee_academiques.isdefault', 1)
            ->get(['groupe_matieres.*']);
            
            return $data;
        }
       //recuperer les goupes de matières par niveau d'un l'établissement en cours et de l'annee en cours
     /*  public function getGroupeMatieresNiveau()
       {
           $data = GroupeMatiere::join('annee_academiques', 'groupe_matieres.annee_academique_id', '=', 'annee_academiques.id')
           ->join('etablissements', 'annee_academiques.etablissement_id', '=', 'etablissements.id')
           ->join('niveaux', 'niveau_id', '=', 'niveaux.id')
           
           ->where('etablissements.id', $this->id)
           ->where('annee_academiques.isdefault', 1)
           ->get(['groupe_matieres.*']);
           
           return $data;
       }*/

      //recuperer les periodes d'un établissement en cours et de l'annee en cours
      public function getPeriodes()
      {
          $data = Periode::join('annee_academiques', 'periodes.annee_academique_id', '=', 'annee_academiques.id')
          ->join('etablissements', 'annee_academiques.etablissement_id', '=', 'etablissements.id')
          ->where('etablissements.id', $this->id)
          ->where('annee_academiques.isdefault', 1)
          ->get(['periodes.*']);
          
          return $data;
      }

      //recuperer les sous periodes d'un établissement en cours et de l'annee en cours
      public function getSousPeriodes()
      {
          $data = Periode::join('annee_academiques', 'periodes.annee_academique_id', '=', 'annee_academiques.id')
          ->join('etablissements', 'annee_academiques.etablissement_id', '=', 'etablissements.id')
          ->join('sous_periodes', 'sous_periodes.periode_id', '=', 'periodes.id')
          ->where('etablissements.id', $this->id)
          ->where('annee_academiques.isdefault', 1)
          ->get(['sous_periodes.*']);
          
          return $data;
      }

       //recuperer les matieres d'un niveau d'un établissement en cours et de l'annee en cours
       public function getMatiereNiveau()
       {
        $data = MatiereNiveau::join('niveaux', 'matiere_niveaux.niveau_id', '=', 'niveaux.id')
        ->join('etablissements', 'niveaux.etablissement_id', '=', 'etablissements.id')
        ->where('etablissements.id', $this->id)
        ->get(['matiere_niveaux.*']);
        
        return $data;
       }
        //recuperer la liste des evaluations d'un établissement en cours et de l'annee en cours
        public function getEvaluations()
        {
            $data = Evaluation::join('annee_academiques', 'evaluations.annee_academique_id', '=', 'annee_academiques.id')
            ->join('etablissements', 'annee_academiques.etablissement_id', '=', 'etablissements.id')
            ->where('etablissements.id', $this->id)
            ->where('annee_academiques.isdefault', 1)
            ->get(['evaluations.*']);
            
            return $data;
        }

}
