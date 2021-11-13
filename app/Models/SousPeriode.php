<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SousPeriode extends Model
{
    use HasFactory;
    protected $fillable = [
        'numero',
        'startAt',
        'periode_id',
        'endAt'
    ];
    public function getPeriode()
    {
        return $this->belongsTo(Periode::class, 'periode_id');
    }
}
