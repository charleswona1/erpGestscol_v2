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
        $data = Classe::join('niveaux', 'classes.niveau_id', '=', 'niveaux.id')
        ->join('etablissements', 'niveaux.etablissement_id', '=', 'etablissements.id')
        ->where('etablissements.id', $this->id)
        ->get(['classes.*']);
        
        return $data;
    }

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
    public function getAnneeAccademic(){
        return $this->hasMany(AnneeAccademique::class);
    }

    
}
