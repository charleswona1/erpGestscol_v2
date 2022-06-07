<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sanction extends Model
{
    use HasFactory;
    protected $fillable = [
        'libelle',
        'abbreviation',
        'seuil',
        'degre', 
        'unite',
        'etablissement_id'
    ];

}
