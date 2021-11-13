<?php

namespace App\Http\Controllers\Gestscol\SousPeriodes;

use App\Http\Controllers\Controller;
use App\Models\SousPeriode;
use App\Models\Etablissement;
use App\Models\Periode;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class SousPeriodesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Etablissement $etablissement){
        $sousPeriodes = SousPeriode::all();        
        return view('gestscol.ressources.sous_periodes.index', compact('sousPeriodes', 'etablissement'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Etablissement $etablissement){
        $periodes = $etablissement->getPeriodes();        
        
        return view('gestscol.ressources.sous_periodes.form',compact('etablissement', 'periodes'));
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
            "periode_id" => 'required',
        ]);
       // dd($data);
        $sousPeriode = new SousPeriode();
        $sousPeriode->fill($data);
        
        if ($sousPeriode->save()) {
            Session::flash('success','la sous periode a bien été ajoutée');
            return redirect()->route('gestscol.sousperiodes.index',$etablissement);
        }
        Session::flash('error','une erreur c\'est produite lors de l\'enregistrement');
        return route('gestscol.sousperiodes.add',$etablissement);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SousPeriode  $sousPeriode
     * @return \Illuminate\Http\Response
     */
    public function show(SousPeriode $sousPeriode)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SousPeriode  $sousPeriode
     * @return \Illuminate\Http\Response
     */
    public function edit(Etablissement $etablissement, SousPeriode $sousPeriode){
        $periodes = $etablissement->getPeriodes(); 
            
        return view('gestscol.ressources.sous_periodes.edit',compact('etablissement','sousPeriode' ,'periodes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SousPeriode  $sousPeriode
     * @return \Illuminate\Http\Response
     */
    public function update(Etablissement $etablissement, SousPeriode $sousPeriode, Request $request){
        
        $data = $request->validate([
            "numero" => 'required',
            "startAt" => 'required',
            "endAt" => 'required',
            "periode_id" => 'required',
        ]);
        $sousPeriode->fill($data);
        if ($sousPeriode->save()) {
            Session::flash('success','la sous période a bien été modifiée');
            return redirect()->route('gestscol.sousperiodes.index',$etablissement);
        }
        Session::flash('error','une erreur c\'est produite lors de l\'enregistrement');
        return route('gestscol.sousperiodes.edit',$etablissement);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SousPeriode  $sousPeriode
     * @return \Illuminate\Http\Response
     */
    public function delete(Etablissement $etablissement, SousPeriode $sousPeriode){
        $sousPeriode->delete();
        Session::flash('success','la sous periode a bien été supprimée');
        return redirect()->back();
    }
}
