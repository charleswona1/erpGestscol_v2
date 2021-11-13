<?php

namespace App\Http\Controllers\Gestscol\Evaluations;

use App\Http\Controllers\Controller;
use App\Models\Etablissement;
use App\Models\Evaluation;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

class EvaluationsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Etablissement $etablissement){
        $evaluations = $etablissement->getEvaluations();        
        return view('gestscol.ressources.evaluations.index', compact('evaluations', 'etablissement'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Etablissement $etablissement){
        return view('gestscol.ressources.evaluations.form',compact('etablissement'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Etablissement $etablissement,Request $request){
        $data = $request->validate([
            "name" => 'required',
        ]);
        
        $evaluation = new Evaluation();
        $evaluation->fill($data);
        $evaluation->annee_academique_id=$etablissement->getAnneeAcademique->id;;
        if ($evaluation->save()) {
            Session::flash('success','l\'évaluation a bien été ajouté');
            return redirect()->route('gestscol.evaluations.index',$etablissement);
        }
        Session::flash('error','une erreur c\'est produite lors de l\'enregistrement');
        return route('gestscol.evaluations.add',$etablissement);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Evaluation  $evaluation
     * @return \Illuminate\Http\Response
     */
    public function show(Evaluation $evaluation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Evaluation  $evaluation
     * @return \Illuminate\Http\Response
     */
    public function edit(Etablissement $etablissement, Evaluation $evaluation){
        return view('gestscol.ressources.evaluations.edit',compact('etablissement','evaluation'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Evaluation  $evaluation
     * @return \Illuminate\Http\Response
     */
    public function update(Etablissement $etablissement, Evaluation $evaluation, Request $request){
        
        $data = $request->validate([
            "name" => 'required|unique:evaluations,name,'.$evaluation->id,
        ]);
        
        $evaluation->fill($data);
        if ($evaluation->save()) {
            Session::flash('success','le type d\'evaluation a bien été modifié');
            return redirect()->route('gestscol.evaluations.index',$etablissement);
        }
        Session::flash('error','une erreur c\'est produite lors de l\'enregistrement');
        return route('gestscol.evaluations.edit',[$etablissement,$evaluation]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Evaluation  $evaluation
     * @return \Illuminate\Http\Response
     */
    public function delete(Etablissement $etablissement, Evaluation $evaluation){
        $evaluation->delete();
        Session::flash('success','le type d\'évaluation a bien été supprimé');
        return redirect()->back();
    }
}
