<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Campeonato;

class CampeonatoController extends Controller
{
   /**
    * Buscar dados do banco de dados e retornar para a view
    */
    public function index(){
        $campeonatos = Campeonato::all();
        return view('home',[
            'campeonatos' => $campeonatos
        ]);
    }

    public function getCampeonato($id){
        $campeonato = Campeonato::find($id);
        return response()->json($campeonato);
    }
}