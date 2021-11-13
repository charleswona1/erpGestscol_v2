<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GroupeMatiere extends Model
{
    use HasFactory;

    protected $fillable=['name','annee_academique_id', 'niveau_id', 'numero'];

}
