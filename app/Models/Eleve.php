<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Eleve extends Model
{
    use HasFactory;

    protected $fillable=[
        'etablissement_id',
        'nom',
        'sexe',
        'date_naissance',
        'lieu_naissance',
        'email',
        'telephone',
        'groupe_sanguin',
        'religion',
        'domicile',
        'type_contact',
        'aptitude',
        'autres',
        'nom_pere',
        'nom_mere',
        'nom_tuteur',
        'profession_pere',
        'profession_mere',
        'profession_tuteur',
        'tel_pere',
        'tel_mere',
        'tel_tuteur',
    ];
}
