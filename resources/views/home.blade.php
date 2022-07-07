<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Meu Campeonato</title>
        <link href="./css/styles.css" rel="stylesheet">
        <link href="./js/bootstrap.css" rel="stylesheet">

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
                    <div class="col-md-4 card-info">
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
                                        <a href="{{ url('/sortearJogos') }}" type="button" class="button ">Voltar</a>
                                        <button type="submit" class="button" value="{{$campeonato->id}}" id="btnJogos" 
                                            data-codigo="{{$campeonato->id}}" 
                                            data-campeonato="{{$campeonato->campeonato}}">
                                            <span >
                                                Visualizar
                                            </span>
                                        </button>
                                    </td>  
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="col-md-4 card-info">
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
                                            <button type="submit" class="button">
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
<script src={{ asset('./js/bootstrap-icons.svg') }} rel="styleshet"></script>
<script src={{ asset('./js/jquery.js') }} rel="styleshet"></script>
<script src={{ asset('./js/bootstrap.js') }} rel="styleshet"></script> 
<script type="text/javascript">

    $(document).ready(function () {
        $('.table').DataTable();
    });
    $('.btnEditarCampeonato').click(function () {
        $('#inserirCampeonatoModal').modal('show');
            codigo = $(this).attr('data-codigo');
            console.log('aqui');
    
            $.ajax({
                type:'GET',
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
                type:'GET',
                url: "/getTime/" + codigo,
                successo: function (response){
                    $('#nome').val((response.dados.nome));
                    $('#codigo').val(response.dados.id);
    
                }
        })
    })
    $('#btnJogos').click(function () {
        console.log('aqui');
        codigo = $(this).attr('data-codigo');

        $.ajax({
            type:'POST',
            url: "/jogosSortear/" + codigo,
            successo: function (response){
                //$('#nome').val((response.dados.nome));
                //$('#codigo').val(response.dados.id);

            }
        })
    })
</script>
</html>