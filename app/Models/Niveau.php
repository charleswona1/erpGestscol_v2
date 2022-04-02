<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Niveau extends Model
{
    use HasFactory;
    protected $fillable=['name','cycle_id'];

    public function cycles(){
        return $this->belongsTo(Cycle::class,"cycle_id"); 
    }

    public function MatierNiveau(){
        return $this->hasMany(MatiereNiveau::class,"niveau_id");
    }
}
