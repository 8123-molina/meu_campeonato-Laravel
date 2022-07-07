<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Campeonato;
use App\Models\Time;

class PartidaController extends Controller
{
    /**
     * Responsavel por fazer sorteio dos jogos
     *
     */
    public function sortear($id = null){

        //Traz dados do campeonato
            $campeonato = Campeonato::find($id);

        //Recebe os times do banco
            $competidores = Time::all();
            $timesQuarta = $competidores->toarray();

        //Sorteia os times
            shuffle($timesQuarta);
        //Limita a 8 times por campeonato
            $slice =array_slice($timesQuarta, 0, 8);

        //Coleta os nomes dos times
            foreach ($slice as $nomeTime) {
                $times[] = $nomeTime['nome'];
            }
            $sorteioDuplas = array_chunk($times, 2);

        //Distribui os times nos jogos das quartas de final
            foreach ($sorteioDuplas as $time) {
                $timeA = $time[0];
                $timeB = $time[1];

                //chama o script Python que gera os gols
                $gols = shell_exec("python3 c:/src/teste.py");
                $gol  = explode("\n ", $gols, -1);

                //Jogos quartas de final
                $jogoQuartasFinais[] = [
                    'timeA' => $timeA,
                    'timeB' => $timeB,
                    'golTimeA' => $gol[0],
                    'golTimeB' => $gol[1]
                ];
            }




    }
}
