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
    public function getJogos($id){
        
        $campeonato = Campeonato::find($id);

        return view('jogos',[
            "campeonato"            => $campeonato,
            "jogosQuartasFinais"    => json_decode($campeonato['jogosQuartasFinais']),
            "jogosSemiFinais"       => json_decode($campeonato['jogosSemiFinais']),
            "semiFinais"            => json_decode($campeonato['semiFinais']),
            "jogosFinal"            => json_decode($campeonato['jogosFinal']),
            "tCampeao"              => json_decode($campeonato['tCampeao']),
            "viceCampeao"           => json_decode($campeonato['viceCampeao']),
            "campeao"               => json_decode($campeonato['campeao'])
            
        ]);
    }

    public function create(Request $request){
 
        $dados = new Campeonato();
        $dados->campeonato = $request->campeonato;
        $dados->save();

        return redirect('/');
    }
}