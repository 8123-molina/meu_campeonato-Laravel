<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Campeonato;
use App\Models\Time;

class CampeonatoController extends Controller
{
    /**
    * Buscar dados do banco de dados e retornar para a view
    */
    public function index(){
        $campeonatos = Campeonato::all();
        $times = Time::all();

        return view('home',[
            'campeonatos' => $campeonatos,
            'times' => $times
        ]);
    }
    /**
    * Buscar dados especifico do banco de dados e retornar para a view
    */
    public function get($id){
 
        $campeonato = Campeonato::find($id);
        return response()->json($campeonato);
    }

    public function create(Request $request){
 
        $dados = new Campeonato();
        $dados->campeonato = $request->campeonato;
        $dados->save();

        return redirect('/');
    }
}