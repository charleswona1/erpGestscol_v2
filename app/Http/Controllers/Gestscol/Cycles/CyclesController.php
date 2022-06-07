<?php

namespace App\Http\Controllers\Gestscol\Cycles;

use App\Http\Controllers\Controller;
use App\Models\Cycle;
use App\Models\Etablissement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class CyclesController extends Controller
{
    public function index(Etablissement $etablissement){
        $cycles = $etablissement->getCycle;
        return view('gestscol.ressources.cycles.index',compact('etablissement','cycles'));
    }

    public function create(Etablissement $etablissement){
        return view('gestscol.ressources.cycles.form',compact('etablissement'));
    }
    
    public function store(Etablissement $etablissement,Request $request){
        $data = $request->validate([
            "name" => 'required|unique:cycles',
        ]);
        
        $cycle = new Cycle();
        $cycle->fill($data);
        $cycle->etablissement_id = $etablissement->id;
        if ($cycle->save()) {
            Session::flash('success','le cycle a bien été ajouté');
            return redirect()->route('gestscol.cycles.index',$etablissement);
        }
        Session::flash('error','une erreur c\'est produite lors de l\'enregistrement');
        return route('gestscol.cycles.add',$etablissement);
    }

    public function show(Etablissement $etablissement, Cycle $cycle){
        return view('gestscol.ressources.cycles.show',compact('etablissement','cycle'));
    }

    public function edit(Etablissement $etablissement, Cycle $cycle){
        return view('gestscol.ressources.cycles.edit',compact('etablissement','cycle'));
    }

    public function update(Etablissement $etablissement, Cycle $cycle, Request $request){
        
        $data = $request->validate([
            "name" => 'required|unique:cycles,name,'.$cycle->id,
        ]);
        
        $cycle->fill($data);
        $cycle->etablissement_id = $etablissement->id;
        if ($cycle->save()) {
            Session::flash('success','le cycle a bien été modifié');
            return redirect()->route('gestscol.cycles.index',$etablissement);
        }
        Session::flash('error','une erreur c\'est produite lors de l\'enregistrement');
        return route('gestscol.cycles.edit',[$etablissement,$cycle]);
    }

    public function delete(Etablissement $etablissement, Cycle $cycle){
        $cycle->delete();
        Session::flash('success','le cycle a bien été supprimé');
        return redirect()->back();
    }
}
