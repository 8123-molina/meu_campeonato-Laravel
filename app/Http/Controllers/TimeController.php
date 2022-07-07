<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Time;

class TimeController extends Controller
{
    /**
    * Buscar dados especifico do banco de dados e retornar para a view
    */
    public function get($id){
 
        $campeonato = Time::find($id);
        return response()->json($campeonato);
    }

    public function create(Request $request){
 
        $dados = new Time();
        $dados->nome = $request->nome;
        $dados->save();

        return redirect('/');
    }
}
