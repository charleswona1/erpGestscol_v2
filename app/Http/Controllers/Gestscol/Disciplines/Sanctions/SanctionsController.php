<?php

namespace App\Http\Controllers\Gestscol\Disciplines\Sanctions;

use App\Http\Controllers\Controller;
use App\Models\Sanction;
use App\Models\Etablissement;
use Illuminate\Support\Facades\Session;

use Illuminate\Http\Request;

class SanctionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Etablissement $etablissement){
        $sanctions=Sanction::where('etablissement_id',$etablissement->id)->get();
        return view('gestscol.disciplines.sanctions.index',compact('etablissement','sanctions'));
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Etablissement $etablissement){
       // $niveaux = $etablissement->getNiveaux;
        return view('gestscol.disciplines.sanctions.form',compact('etablissement'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Etablissement $etablissement)
    {
         //dd($request->all());
         $data = $request->validate([
            "libelle" => 'required',
            "abbreviation" => 'required',
            "degre" => 'required',
            "seuil" => 'required',
            "unite" => 'required',
        ]);
        // dd($data);
        
        $sanction = new sanction();
        $sanction->fill($data);
        $sanction->etablissement_id=$etablissement->id;
        $sanction ->save();
        
        if ($sanction->save()) {
            Session::flash('success','la sanction a bien été ajoutée');
            return redirect()->route('gestscol.sanctions.index',$etablissement);
        }
        Session::flash('error','une erreur c\'est produite lors de l\'enregistrement');
        return route('gestscol.sanctions.add',$etablissement);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Sanction  $sanction
     * @return \Illuminate\Http\Response
     */
    public function show(Sanction $sanction)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Sanction  $sanction
     * @return \Illuminate\Http\Response
     */
 
    public function edit(Etablissement $etablissement, Sanction $sanction){
        
        return view('gestscol.disciplines.sanctions.edit',compact('etablissement','sanction'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Sanction  $sanction
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Etablissement $etablissement, Sanction $sanction)
    {
        $data = $request->validate([
            "libelle" => 'required',
            "abbreviation" => 'required',
            "degre" => 'required',
            "seuil" => 'required',
            "unite" => 'required',
        ]);
        
        $sanction->fill($data);
        if ($sanction->save()) {
            Session::flash('success','la sanction a bien été modifiée');
            return redirect()->route('gestscol.sanctions.index',$etablissement);
        }
        Session::flash('error','une erreur c\'est produite lors de l\'enregistrement');
        return redirect()->route('gestscol.sanctions.edit',$etablissement);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Sanction  $sanction
     * @return \Illuminate\Http\Response
     */
    public function delete(Etablissement $etablissement, Sanction $sanction){
        $sanction->delete();
        Session::flash('success','la sanction a bien été supprimée');
        return redirect()->back();
    }
}
