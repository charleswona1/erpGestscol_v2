<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClasseAnnee extends Model
{
    use HasFactory;

    protected $fillable = [
        'niveau_id',
        'name'
    ];

    public function getNiveau()
    {
        return $this->belongsTo(Niveau::class, 'niveau_id');
    }
}
