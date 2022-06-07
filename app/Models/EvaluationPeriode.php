<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EvaluationPeriode extends Model
{
    use HasFactory;

    protected $fillable =[
        "classe_annee_id",
        "classe_matiere_id",
        "periode_id",
        "sous_periode_id",
        "date_evaluation",
        "bareme",
        "evaluation_id",
        "commentataire"
    ];

    public function Evaluation(){
        return $this->belongsTo(Evaluation::class);
    }

    public function Periode(){
        return $this->belongsTo(Periode::class);
    }

    public function SousPeriode(){
        return $this->belongsTo(SousPeriode::class);
    }

    public function Notes(){
        return $this->hasMany(Note::class);
    }

    public function MatiereNiveau(){
        return $this->belongsTo(MatiereNiveau::class);
    }

    public function classeMatiere(){
        return $this->belongsTo(ClasseMatiere::class);
    }

    public function EffectifEvaluate(){
        $effectif = Note::where([['note','<>',null],['evaluation_periode_id',$this->id]])->get();
        return $effectif;
    }

}
