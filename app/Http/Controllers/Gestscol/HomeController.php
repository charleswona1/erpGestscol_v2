<?php

namespace App\Http\Controllers\Gestscol;

use App\Http\Controllers\Controller;
use App\Models\Etablissement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{
    public function index(Etablissement $etablissement){
        Session::put('etablissement',$etablissement);
        return view('gestscol.dashboard');
    }
}
