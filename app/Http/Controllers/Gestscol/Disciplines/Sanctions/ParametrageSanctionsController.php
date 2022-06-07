<?php

namespace App\Http\Controllers\Gestscol\Disciplines\Sanctions;

use App\Http\Controllers\Controller;
use App\Models\Cycle;
use App\Models\ParametrageSanction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Etablissement;
use App\Models\Sanction;

class ParametrageSanctionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Etablissement $etablissement){
      //  $parametrage_sanctions=$etablissement->getParametrageSanctions();
        $parametrage_sanctions=ParametrageSanction::all();
       // dd($parametrage_sanctions[0]->sanction1()->get()[0]->libelle);
        $sanctions=Sanction::all();
        $cycles=Cycle::all();
        
        return view('gestscol.disciplines.parametrage_sanctions.index',compact('etablissement','cycles','parametrage_sanctions','sanctions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Etablissement $etablissement)
    {
        $data = $request->validate([
            "cycle_id" => 'required',
            "sanction_id" => 'required',
            "valeur" => 'required',
            "sanction_id2" => 'required',
            "valeur2" => 'required',
            "valeur" => 'required',
        
        ]);
        // dd($data);
        
        $parametrage_sanction = new ParametrageSanction();
        $parametrage_sanction ->libelle='';
        $parametrage_sanction->fill($data);
        
        $parametrage_sanction ->save(); 
        
        if ($parametrage_sanction->save()) {
            Session::flash('success','le parametrage de sanction a bien été ajoutée');
            return redirect()->route('gestscol.parametragesanctions.index',$etablissement);
        }
        Session::flash('error','une erreur c\'est produite lors de l\'enregistrement');
        return redirect()->route('gestscol.parametragesanctions.index',$etablissement);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ParametrageSanction  $parametrageSanction
     * @return \Illuminate\Http\Response
     */
    public function show(ParametrageSanction $parametrageSanction)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ParametrageSanction  $parametrageSanction
     * @return \Illuminate\Http\Response
     */
    public function edit(Etablissement $etablissement, ParametrageSanction $parametrageSanction)
    {
        $sanctions= sanction::all();
        $cycles= cycle::all();
        $parametrage_sanctions = ParametrageSanction::all();
       // dd($parametrageSanction);
       // $parametrage_sanction = ParametrageSanction::where('id_parametrage', $id)->get();
        //$parametrage_sanction = $parametrage_sanction[0];  
        return view('gestscol.disciplines.parametrage_sanctions.edit',compact('etablissement','cycles','parametrage_sanctions','sanctions','parametrageSanction'));
 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ParametrageSanction  $parametrageSanction
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Etablissement $etablissement ,ParametrageSanction $parametrageSanction)
    {
        $data = $request->validate([
            "cycle_id" => 'required',
            "sanction_id" => 'required',
            "valeur" => 'required',
            "sanction_id2" => 'required',
            "valeur2" => 'required',
            "valeur" => 'required',
        
        ]);
        $parametrageSanction->fill($data);
        if ($parametrageSanction->save()) {
            Session::flash('success','le parametrage de sanction a bien été modifié');
            return redirect()->route('gestscol.parametragesanctions.index',$etablissement);
        }
        Session::flash('error','une erreur c\'est produite lors de l\'enregistrement');
        return redirect()->route('gestscol.parametragesanctions.index',$etablissement);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ParametrageSanction  $parametrageSanction
     * @return \Illuminate\Http\Response
     */
    public function delete(Etablissement $etablissement, ParametrageSanction $parametrageSanction){
        $parametrageSanction->delete();
        Session::flash('success','le parametrage de sanction a bien été supprimé');
        return redirect()->back();
    }
}
