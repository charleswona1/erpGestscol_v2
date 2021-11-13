<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EleveClasse extends Model
{
    use HasFactory;

    protected $fillable=[
        'etablissement_id',
        'annee_academique_id',
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
        'aptitude',
        'ancien',
        'interne',
        'precedent_etablissement',
        'precedent_niveau',
        'is_redouble',
        'niveau_id',
        'matricule',
        'avatar_url',
        'numero',
        'is_redouble',
        'decision',
        'next_classe',
        'niveau_id',
        'classe_annee_id'
    ];
}
