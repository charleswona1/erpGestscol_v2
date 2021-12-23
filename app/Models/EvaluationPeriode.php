<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EvaluationPeriode extends Model
{
    use HasFactory;

    protected $fillable =[
        "classe_annee_id",
        "matiere_niveau_id",
        "periode_id",
        "sous_periode_id",
        "date_evaluation",
        "bareme",
        "evaluation_id",
        "commentataire"
    ];
}
