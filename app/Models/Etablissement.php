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
    //recuperer les classes de l'établissement en cours
    public function getClasses()
    {
      /*  $data = Classe::join('state', 'state.country_id', '=', 'country.country_id')
        ->join('city', 'city.state_id', '=', 'state.state_id')
        ->get(['country.country_name', 'state.state_name', 'city.city_name']);*/
        
        $data = Classe::join('niveaux', 'classes.niveau_id', '=', 'niveaux.id')
        ->join('etablissements', 'niveaux.etablissement_id', '=', 'etablissements.id')
        ->where('etablissements.id', $this->id)
        ->get(['classes.*']);
        
        return $data;
    }
}
