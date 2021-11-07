<?php

namespace App\Http\Controllers\Gestscol\Eleves;

use App\Http\Controllers\Controller;
use App\Models\Eleve;
use App\Models\Etablissement;
use Illuminate\Http\Request;

class ElevesController extends Controller
{
    public function index(Etablissement $etablissement){
        return view('gestscol.ressources.eleves.index',compact('etablissement'));
    }

    public function create(Etablissement $etablissement){
        return view('gestscol.ressources.eleves.form',compact('etablissement'));
    }

    public function store(Etablissement $etablissement,Request $request){
        return redirect()->back();
    }

    public function show(Etablissement $etablissement, Eleve $eleve){
        return view('gestscol.ressources.eleves.show',compact('etablissement,eleve'));
    }

    public function edit(Etablissement $etablissement, Eleve $eleve){
        return view('gestscol.ressources.eleves.form',compact('etablissement,eleve'));
    }

    public function update(Etablissement $etablissement, Eleve $eleve, Request $request){
        return redirect()->back();
    }
}

