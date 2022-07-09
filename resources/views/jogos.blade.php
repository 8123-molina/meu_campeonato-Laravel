<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Meu Campeonato</title>
        <link href="../../public/css/styles.css" rel="stylesheet">
        <link href="../../public/js/bootstrap.css" rel="stylesheet">

    </head>
    <body>
        <div class="container">
            <div class="column">
                <div class="card-info border row">
                    <div class="card-info campeao column" style="width: 90%">
                        <h1>{{$campeonato->campeonato}}</h1>
                    </div>
                </div>
            </div>
            </div>
        </div>
        <a class="button left" href="{{'./home'}}">Voltar</a>
        <div class=" card-info wrap">
            <div class="card-info column" id="quartasFinais">
                <div class="card-info info">
                    <h2>Quartas</h2>
                </div>
                <div class="column">
                <?php foreach ($jogosQuartasFinais as $quartasFinal):?>
                    <div class="card-info row1" style="border-bottom: 1px solid #999999 ">
                    <div class="card-info column">
                        <div class="" name="<?= $quartasFinal->timeA ?>"><?= $quartasFinal->timeA ?></div>
                        <div class="" name="<?= $quartasFinal->golTimeA ?>"><?= $quartasFinal->golTimeA ?></div>
                    </div>
                    <div class="card-info">
                        <h2>vs</h2>
                    </div>
                    <div class="card-info column">
                        <div class="" name="<?= $quartasFinal->timeB ?>"> <?= $quartasFinal->timeB ?></div>
                        <div class="" name="<?= $quartasFinal->golTimeB ?>"><?= $quartasFinal->golTimeB ?></div>
                    </div>
                </div>
                    
                <?php endforeach; ?>
                </div>
            </div>
            <div class="card-info column" id="semiFinais">
                <div class="card-info info">
                    <h2>Semi Finais</h2>
                </div>
                <div class="column">
                <?php foreach ($jogosSemiFinais as $semiFinal):?>
                    <div class="card-info row1" style="border-bottom: 1px solid #999999 ">
                        <div class="card-info column">
                            <div class="" name="<?= $semiFinal->timeA ?>"><?= $semiFinal->timeA ?></div>
                            <div class="" name="<?= $semiFinal->golTimeA ?>"><?= $semiFinal->golTimeA ?></div>
                        </div>
                        <div class="card-info">
                            <h2>vs</h2>
                        </div>
                        <div class="card-info column">
                            <div class="" name="<?= $semiFinal->timeB ?>"><?= $semiFinal->timeB ?></div>
                            <div class="" name="<?= $semiFinal->golTimeB?>"><?= $semiFinal->golTimeB?></div>
                        </div>
                    </div>
                <?php endforeach; ?>
                </div>
            </div>
            <div class="card-info column" id="semiFinais">
                <div class="card-info info">
                    <h2>Final</h2>
                </div>
                <div class="column">
                <?php foreach ($jogosFinal as $final):?>
                    <div class="card-info row1" style="border-bottom: 1px solid #999999 ">
                        <div class="card-info column">
                            <div class="" name="<?= $final->timeA ?>"><?= $final->timeA ?></div>
                            <div class="" name="<?= $final->golTimeA ?>"><?= $final->golTimeA ?></div>
                        </div>
                        <div class="card-info">
                            <h2>vs</h2>
                        </div>
                        <div class="card-info column">
                            <div class="" name="<?= $final->timeB ?>"><?= $final->timeB ?></div>
                            <div class="" name="<?= $final->golTimeB?>"><?= $final->golTimeB?></div>
                        </div>
                    </div>
                <?php endforeach; ?>
                </div>
            </div>
        </div>
        <div class="card-info wrap">
            <div class="card-info campeao column" id="campeao" style="width: 90%">
                <div >
                    <h2>Campeão</h2>
                </div>
                <div class="card-info">
                    <h1><?= $campeao[0] ?></h1>
                </div>
            </div>
            
            <div class="card-info vice column" id="vice_campeao" style="width: 90%">
                <div >
                    <h2>Vice-Campeão</h2>
                </div>
                <div class="card-info">
                    <h1><?= $viceCampeao[0] ?></h1>
                </div>
            </div>

            <div class="card-info vice-vice column" id="vice_vice" style="width: 90%">
                <div >
                    <h2>Terceiro Lugar</h2>
                </div>
                <div class="card-info">
                    <h1><?= $tCampeao[0] ?></h1>
                </div>
            </div>
        </div>
       
    </body>
<script src="{{ asset('../js/jquery.js') }}" rel="styleshet"></script>
<script src="{{ asset('css/styles.css') }}" rel="styleshet"></script>
<script src="{{ asset('js/bootstrap.js') }}" rel="styleshet"></script> 
<script type="text/javascript">
</script>
</html>