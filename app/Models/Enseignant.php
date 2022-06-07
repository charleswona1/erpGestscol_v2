<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Enseignant extends Model
{
    use HasFactory;

    protected $fillable=[
        'etablissement_id',
        'name',
        'sexe',
        'date_naissance',
        'lieu_naissance',
        'email',
        'telephone',
        'groupe_sanguin',
        'religion',
        'localisation',
        'autres',
        'num_cnps',
        'num_cni',
        'num_autorisation',
        'status',
        'diplome',
        'matricule',
        'titre',
    ];
}
