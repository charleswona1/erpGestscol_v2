<?php

namespace App\Http\Controllers\Gestscol\Periodes;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\Controller;
use App\Models\Periode;
use App\Models\Etablissement;

use Illuminate\Http\Request;

class PeriodesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Etablissement $etablissement){
        $periodes = $etablissement->getPeriodes();        
        return view('gestscol.ressources.periodes.index', compact('periodes', 'etablissement'));
    }
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Etablissement $etablissement){
         return view('gestscol.ressources.periodes.form',compact('etablissement'));
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
            "numero" => 'required',
            "startAt" => 'required',
            "endAt" => 'required',
            "pourcentage" => 'required',
        ]);
        
        $periode = new Periode();
        $periode->fill($data);
        $periode->annee_academique_id=$etablissement->getAnneeAcademique->id;
        $periode->etablissement_id = $etablissement->id;
        
        if ($periode->save()) {
            Session::flash('success','la periode a bien été ajoutée');
            return redirect()->route('gestscol.periodes.index',$etablissement);
        }
        Session::flash('error','une erreur c\'est produite lors de l\'enregistrement');
        return route('gestscol.periodes.add',$etablissement);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Periode  $periode
     * @return \Illuminate\Http\Response
     */
    public function show(Periode $periode)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Periode  $periode
     * @return \Illuminate\Http\Response
     */
    public function edit(Etablissement $etablissement, Periode $periode){
        
        return view('gestscol.ressources.periodes.edit',compact('etablissement','periode'));
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Periode  $periode
     * @return \Illuminate\Http\Response
     */
    public function update(Etablissement $etablissement, Periode $periode, Request $request){
        
        $data = $request->validate([
            "numero" => 'required',
            "startAt" => 'required',
            "endAt" => 'required',
            "pourcentage" => 'required',
        ]);
        
        $periode->fill($data);
        if ($periode->save()) {
            Session::flash('success','la matiere a bien été modifiée');
            return redirect()->route('gestscol.periodes.index',$etablissement);
        }
        Session::flash('error','une erreur c\'est produite lors de l\'enregistrement');
        return route('gestscol.periodes.edit',$etablissement);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Periode  $periode
     * @return \Illuminate\Http\Response
     */
    public function delete(Etablissement $etablissement, Periode $periode){
        $periode->delete();
        Session::flash('success','la periode a bien été supprimée');
        return redirect()->back();
    }
}
