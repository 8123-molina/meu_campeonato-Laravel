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
    public function sortear($id){
        //Traz dados do campeonato
            $campeonato = Campeonato::find($id);

        //Recebe os times do banco
            $competidores = Time::all();
            $timesQuarta = $competidores->toarray();
        if (count($competidores) >= 8){
            //Sorteia os times
                shuffle($timesQuarta);
            //Limita a 8 times por campeonato
                $slice =array_slice($timesQuarta, 0, 8);

            //Coleta os nomes dos times
                foreach ($slice as $nomeTime) {
                    $nomeTimes[] = $nomeTime['nome'];
                }
                
                $sorteioDuplas = array_chunk($nomeTimes, 2);

            //Distribui os times nos jogos das quartas de final
                foreach ($sorteioDuplas as $time) {
                    $timeA = $time[0];
                    $timeB = $time[1];

                    //chama o script Python que gera os gols
                    $gols = shell_exec("py c:/src/teste.py");
                    $gol  = explode("\n", $gols, -1);

                    //Jogos quartas de final
                    $jogosQuartasFinais[] = [
                        'timeA' => $timeA,
                        'timeB' => $timeB,
                        'golTimeA' => $gol[0],
                        'golTimeB' => $gol[1]
                    ];
                }

                //Verifica vencedores das quartas dde final
                foreach ($jogosQuartasFinais as $quartasFinal) {
                    $timeAgol = $quartasFinal['golTimeA'];
                    $timeBgol = $quartasFinal['golTimeB'];

                    if ($timeAgol > $timeBgol) {
                        $vencedoresQuartasFinais = $quartasFinal['timeA'];
                    } else {
                        $vencedoresQuartasFinais = $quartasFinal['timeB'];
                    }

                    $semiFinais[] = $vencedoresQuartasFinais;
                }
                
            //Distribui os times nos jogos das semi finais
                for ($i=0; $i < 2; $i++) { 
                    
                    $sorteioDuplasSemiFinais = array_chunk($semiFinais, 2);

                    $timeA = $sorteioDuplasSemiFinais[$i][0];
                    $timeB = $sorteioDuplasSemiFinais[$i][1];

                    //Chama o script Python que gera os gols
                    $gols = shell_exec("py c:/src/teste.py");
                    $gol  = explode("\n", $gols, -1);

                    //Jogos semi finais
                    $jogosSemiFinais[] = [
                        'timeA' => $timeA,
                        'golTimeA' => $gol[0],
                        'timeB' => $timeB,
                        'golTimeB' => $gol[1]
                    ];

                    //Verifica vencedores das semi finais
                    foreach ($jogosSemiFinais as $semiFinal) {
                        $timeAgol = $semiFinal['golTimeA'];
                        $timeBgol = $semiFinal['golTimeB'];

                        if ($timeAgol > $timeBgol) {
                            $vencedoresSemiFinais = $semiFinal['timeA'];
                            $viceVice = $semiFinal['timeB'];
                        } else {
                            $vencedoresSemiFinais = $semiFinal['timeB'];
                            $viceVice = $semiFinal['timeA'];
                        }
                    }

                    $terceiroLugar[] = $viceVice;
                    $final[] = $vencedoresSemiFinais;
                }
            //Jogo da Terceiro
                $timeAterceiro = $terceiroLugar[0];
                $timeBterceiro = $terceiroLugar[1];

                //Chama o script Python
                $gols= shell_exec("py c:/src/teste.py");
                $gol = explode("\n", $gols, -1);

                $jogoTerceiro[] = [
                    'timeA' => $timeAterceiro,
                    'golTimeA' => $gol[0],
                    'timeB' => $timeBterceiro,
                    'golTimeB' => $gol[1],
                ];

                    
                foreach ($jogoTerceiro as $terceiro ){
                    $timeAgolt = $terceiro['golTimeA'];
                    $timeBgolt = $terceiro['golTimeB'];
                    
                    //Define campeão
                    if($timeAgolt > $timeBgolt){
                        $terceiroCampeonato = $terceiro['timeA'];
                    }else{
                        $terceiroCampeonato = $terceiro['timeB'];
                    };
                }
                
                //Vice campeão
                $tCampeao[] = $terceiroCampeonato; 

            //Jogo da final
                $timeA = $final[0];
                $timeB = $final[1];
                //Chama o script Python
                $gols= shell_exec("py c:/src/teste.py");
                $gol = explode("\n", $gols, -1);

                $jogoFinal[] = [
                    'timeA' => $timeA,
                    'golTimeA' => $gol[0],
                    'timeB' => $timeB,
                    'golTimeB' => $gol[1],
                ];

                    
                foreach ($jogoFinal as $final ){
                    $timeAgol = $final['golTimeA'];
                    $timeBgol = $final['golTimeB'];
                    
                    //Define campeão
                    if($timeAgol > $timeBgol){
                        $vencedorCampeonato = $final['timeA'];
                    }else{
                        $vencedorCampeonato = $final['timeB'];
                    };
                }
            
            //Vice campeão
            $viceCampeao[] = $vencedorCampeonato != $jogoFinal[0]['timeA'] ? $jogoFinal[0]['timeA'] : $jogoFinal[0]['timeB'];

            $campeao[] = $vencedorCampeonato; 

                //var_dump($nomeTimes);exit;

            //Retornando o campeonato view com jogos do campeonato
            return array( 
                "campeonato"            => $campeonato,
                "jogosQuartasFinais"    => $jogosQuartasFinais,
                "jogosSemiFinais"       => $jogosSemiFinais,
                "semiFinais"            => $semiFinais,
                "jogosFinal"            => $jogoFinal,
                "tCampeao"              => $tCampeao,
                "viceCampeao"           => $viceCampeao,
                "campeao"               => $campeao
                
            );
        }else{
            return false;
        }

    }

    public function createPartida($id){
        $dados = Campeonato::findOrFail($id);

        $jogos = $this->sortear($id);
        

        $dados->jogosQuartasFinais  = $jogos['jogosQuartasFinais'];
        $dados->jogosSemiFinais     = $jogos['jogosSemiFinais'];
        $dados->semiFinais          = $jogos['semiFinais'];
        $dados->jogosFinal          = $jogos['jogosFinal'];
        $dados->tCampeao            = $jogos['tCampeao'];
        $dados->viceCampeao         = $jogos['viceCampeao'];
        $dados->campeao             = $jogos['campeao'];
        
        $dados->save();

        return redirect('/');

    }
}
