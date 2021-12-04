<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MatiereNiveau extends Model
{
    use HasFactory;
    protected $fillable = [
        'matiere_id', 
        'niveau_id',
        'groupe_matiere_id',
        'coefficient'];
    
    public function groupe_matiere()
    {
        return $this->belongsTo('App\Models\groupe_matiere', 'id_groupe_matiere', 'id_groupe_matiere');
    }
  
    public function niveau_scolaire()
    {
        return $this->belongsTo('App\Models\niveau_scolaire' ,  'id_niveau_scolaire', 'id_niveau');
    }
    public function matiere()
    {
        return $this->belongsTo('App\Models\matiere', 'id_matiere', 'id_matiere');
    }

    //
    public function groupe_matiere_nom()
    {
        return $this->groupe_matiere()->get()[0]->nom;
    }
    public function groupe_matiere_numero()
    {
        return $this->groupe_matiere()->get()[0]->numero;
    }
    public function matiere_nom()
    {
        return $this->matiere()->get()[0]->nom;
    }
    public function niveau_scolaire_nom()
    {
        return $this->niveau_scolaire()->get()[0]->nom;
    }
}
