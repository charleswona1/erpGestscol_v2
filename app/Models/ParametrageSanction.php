<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ParametrageSanction extends Model
{
    use HasFactory;
    protected $fillable = ['cycle_id', 'sanction_id','valeur','sanction_id2', 'valeur2', 'libelle'];

    public function sanction1()
    {
        return $this->belongsTo(Sanction::class, 'sanction_id');
                
    }
    public function cycle()
    {
        return $this->belongsTo('App\Models\cycle');
        
    }
    public function sanction2()
    {
        $sanction= sanction::where('id',$this->sanction_id2);
        
        return $sanction;
        
    }
}
