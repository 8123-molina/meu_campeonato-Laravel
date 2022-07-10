<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Meu Campeonato</title>
        
        <link href="css/styles.css" rel="stylesheet">
        <link href="js/bootstrap.css" rel="stylesheet">

    </head>
    <body>
        <div class="container">
            <div class="container">
                <div class="card-info">
                    <h1>Meu Campeonato</h1>
                </div>
            </div>
            <div class="column">
                <div class="box-card row">
                    <div class="col-md-4 button" type="button" data-bs-toggle="modal" data-bs-target="#inserirCampeonatoModal" title="inserir o nome do campeonato">
                        <span class="">
                            Cadastrar Campeonato
                        </span>
                    </div>
                    <div class="col-md-4 button" type="button" data-bs-toggle="modal" data-bs-target="#inserirTimeModal" title="inserir o nome do time">
                        <span class="">
                            Cadastrar Time
                        </span>
                    </div> 
                </div>
            </div>
            <div class="column">
                <div class="row box-card">
                    <div class="col-md-4 box-card border">
                                
                        <div class="card-info campeao">
                            <label>Campeonato</label>
                        </div>
                        <table id="tableCapeonato" class="table table-striped " >
                            <thead>
                                <tr>
                                    <th> Codigo</th>
                                    <th> Nome Campeonato</th>
                                    <th> Ação</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($campeonatos as $campeonato)
                                <tr> 
                                    <td>#00{{$campeonato->id}}</td> 
                                    <td>{{$campeonato->campeonato}}</td>  
                                    <td>
                                    <button type="submit" class="btnGerarJogos button <?= !empty($campeonato->campeao) ? 'disabled' : ''?>" value="{{$campeonato->id}}" <?= !empty($campeonato->campeao) ? 'disabled' : ''?> id="btnGerarJogos" title="<?= !empty($campeonato->campeao) ? 'Campeonato já possui jogos' : 'Gerar jogos para este campeonato'?>" 
                                            data-codigo="{{$campeonato->id}}" 
                                            data-campeonato="{{$campeonato->campeonato}}">
                                            <span >
                                                Gerar
                                            </span>
                                        </button>
                                        <button type="submit" class="block button <?= !empty($campeonato->campeao) ? '' : 'disabled'?>" value="{{$campeonato->id}}" <?= !empty($campeonato->campeao) ? '' : 'disabled'?> id="btnJogos"  title="<?= !empty($campeonato->campeao) ? 'Exibir jogos do campeonato' : 'Campeonato não possui jogos' ?>"
                                            data-codigo="{{$campeonato->id}}" 
                                            data-campeonato="{{$campeonato->campeonato}}">
                                            <a style="display:<?= !empty($campeonato->campeao) ? '' : 'none'?>" href="jogos/<?= $campeonato->id ?>">
                                                Visualizar
                                            </a>
                                        </button>
                                    </td>  
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="col-md-4 box-card border">
                        <div class="card-info campeao">
                            <label>Times inscritos</label>
                        </div>
                        <table id="tableTime" class="table table-striped " >
                            <thead>
                                <tr>
                                    <th >Codigo</th>
                                    <th>Nome Time</th>
                                    <th>Ação</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($times as $time)
                                <tr> 
                                    <td>#00{{$time->id}}</td> 
                                    <td>{{$time->nome}}</td>  
                                    <td>
                                        <button type="submit" class="button btnEditarTime" value="{{$time->id}}" id="btnEditarTime" 
                                            data-codigo="{{$time->id}}" 
                                            data-nome="{{$time->nome}}">
                                            Editar
                                        </button>
                                        <form action="{" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="button ">
                                                <span style="cursor: pointer">
                                                    Excluir
                                                </span>
                                            </button>
                                        </form>
                                    </td>  
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>


        {{-- Modal cadastra Campeonato nome --}}
        <div class="modal fade" id="inserirCampeonatoModal" tabindex="-1" role="dialog" aria-labelledby="inserirCapeonatoModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title" id="inserirModalLabel">Insira um nome para o campeonato</h5>
                    </div>
                    <div class="modal-body">
                        <form action="{{url('/createCampeonato')}}" method="POST">
                            @csrf
                            <input type="hidden" class="form-control" id="codigo" value="" name="codigo" ><br>
                            <input type="text" class="form-control" id="nomeCampeonato" value="" name="campeonato" placeholder="Nome do campeonato"><br>
                            <button type="submit" class=" button">Salvar</button>
                        </form> 
                    </div>
                </div>
            </div>
        </div>

        {{-- Modal cadastra time nome --}}
        <div class="modal fade" id="inserirTimeModal" tabindex="-1" role="dialog" aria-labelledby="inserirTimeModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title" id="inserirModalLabel">Insira um nome time</h5>
                    </div>
                    <div class="modal-body">
                        <form action="{{url('/createTime')}}" method="POST">
                            @csrf
                            <input type="hidden" class="form-control" id="codigo" value="" name="codigo" ><br>
                            <input type="text" class="form-control" id="timeNome" value="" name="nome" placeholder="Nome do time"><br>
                            <button type="submit" class=" button">Salvar</button>
                        </form> 
                    </div>
                </div>
            </div>
        </div>

    </body>
    <script src="{{ asset('css/styles.css') }}" rel="styleshet"></script>
    <script src="{{ asset('js/jquery.js') }}" rel="styleshet"></script>
    <script src="{{ asset('js/bootstrap.js') }}" rel="styleshet"></script> 
    <script type="text/javascript">

        $('.btnEditarCampeonato').click(function () {
            $('#inserirCampeonatoModal').modal('show');
                codigo = $(this).attr('data-codigo');
                console.log('aqui');
        
                $.ajax({
                    type:'get',
                    url: "/getCampeonato/" + codigo,
                    successo: function (response){
                        $('#campeonato').val((response.dados.campeonato));
                        $('#codigo').val(response.dados.id);
        
                    }
            })
        })

        $('.btnEditarTime').click(function () {
            $('#inserirTimeModal').modal('show');
                codigo = $(this).attr('data-codigo');
                console.log('aqui');
        
                $.ajax({
                    type:'get',
                    url: "/getTime/" + codigo,
                    successo: function (response){
                        $('#nome').val((response.dados.nome));
                        $('#codigo').val(response.dados.id);
        
                    }
            })
        })
        $('.btnGerarJogos').click(function () {
            codigo = $(this).attr('data-codigo');
            console.log("gera jogos",codigo);

            $.ajax({
                type:'get',
                url: "createPartida/" + codigo,
                //data:{ _token:"{{ csrf_token() }}" },
                successo: function (response){

                }
            })
        })
    </script>
</html>