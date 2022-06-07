<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Periode extends Model
{
    use HasFactory;
    protected $fillable = [
        'numero',
        'startAt',
        'endAt',
        'pourcentage'
    ];
    public function nom_periode() {
        return Etablissement::where('id', 1)->get()[0]->nom_periode.' '.$this->numero;
        ;
    }
}
