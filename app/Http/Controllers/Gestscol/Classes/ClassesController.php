<?php

namespace App\Http\Controllers\Gestscol\Classes;

use App\Http\Controllers\Controller;
use App\Models\Classe;
use App\Models\Etablissement;
use Illuminate\Support\Facades\Session;

use Illuminate\Http\Request;

class ClassesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Etablissement $etablissement){
        $classes = $etablissement->getClasses;
        
       //dd($classes->getNiveau()[0);
        return view('gestscol.ressources.classes.index', compact('classes', 'etablissement'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create(Etablissement $etablissement){
        $niveaux = $etablissement->getNiveaux;
        return view('gestscol.ressources.classes.form',compact('etablissement', 'niveaux'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Etablissement $etablissement,Request $request)
    {
        $data = $request->validate([
            "name" => 'required',
            "niveau_id" => 'required',
        
        ]);

        $classe = new Classe();
        $classe->fill($data);
        if ($classe->save()) {
            Session::flash('success','la classe a bien été ajoutée');
            return redirect()->route('gestscol.classes.index',$etablissement);
        }
        Session::flash('error','une erreur c\'est produite lors de l\'enregistrement');
        return route('gestscol.classes.add',$etablissement);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Classe  $classe
     * @return \Illuminate\Http\Response
     */
    public function show(Classe $classe)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Classe  $classe
     * @return \Illuminate\Http\Response
     */
    public function edit(Etablissement $etablissement, Classe $classe){
        $niveaux = $etablissement->getNiveaux;
        
        return view('gestscol.ressources.classes.edit',compact('etablissement','classe','niveaux'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Classe  $classe
     * @return \Illuminate\Http\Response
     */
    public function update(Etablissement $etablissement, Classe $classe, Request $request){
        
        $data = $request->validate([
            "name" => 'required',
            "niveau_id" => 'required',
        ]);
        
        $classe->fill($data);
        if ($classe->save()) {
            Session::flash('success','la classe a bien été modifiée');
            return redirect()->route('gestscol.classes.index',$etablissement);
        }
        Session::flash('error','une erreur c\'est produite lors de l\'enregistrement');
        return route('gestscol.classes.edit',[$etablissement,$classe]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Classe  $classe
     * @return \Illuminate\Http\Response
     */
    public function delete(Etablissement $etablissement, Classe $classe){
        $classe->delete();
        Session::flash('success','la classe a bien été supprimée');
        return redirect()->back();
    }
}
