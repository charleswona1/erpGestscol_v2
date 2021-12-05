<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClasseMatiere extends Model
{
    use HasFactory;

    protected $fillable = [
        'classe_annee_id', 
        'matiere_niveau_id',
        'enseignant_annee_id',
    ];

    public static function hasClasseMatiere($class_annee_id,$matiere_niveau_id,$enseignant_annee_id){
        return ClasseMatiere::where([['classe_annee_id',$class_annee_id],['matiere_niveau_id',$matiere_niveau_id],['enseignant_annee_id',$enseignant_annee_id]])->count();
    }

    public function Enseignant(){
        return $this->belongsTo(EnseignantAnnee::class,'enseignant_annee_id');
    }

    public function matiereNiveau(){
        return $this->belongsTo(MatiereNiveau::class,'matiere_niveau_id');
    }
}
