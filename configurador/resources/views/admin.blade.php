@extends('layouts.app')

@section('content')


<script>
function myFunction() {
    var x = document.getElementById("mySelect").value;
    var y = document.getElementsByTagName("TR");

    for (i = 1; i < y.length; i++) { 

        if(x==y[i].getAttribute("name")){
           //document.getElementById("demo"+i).innerHTML = "You selected: igual "+i;
           //document.getElementByName(y[i].getAttribute("name")).style.visibility="inline";
           y[i].style.display="table-row";
        }
        else{
            //document.getElementById("demo"+i).innerHTML = "You selected: diferente "+i;
            y[i].style.display="none";
        }
    }

}
</script>

<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    <div class="row">
                        <form action="" class="form-group">
                            <div class="col-sm-5">
                                <select class="form-control" id="mySelect" onclick="myFunction()">
                                    @foreach ($pacientes as $paciente)
                                        <option value={{$paciente->id}}>{{$paciente->nombre}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>
                <div class="panel-body">
                    <table class="table table-condensed">
                        <thead>
                          <tr>
                            <th>Juego</th>
                            <th>Paciente</th>
                            <th>Orden</th>
                            <th>Jugado</th>
                            <th>Disponible</th>
                            <th>Fecha</th>
                            <th></th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($configuraciones as $configuracion)
                                @foreach ($configurados as $configurado)
                                    @if ($configurado->id==$configuracion->id_conf)
                                    <tr data-toggle="tooltip" data-placement="bottom" title="Sonido: {{$configurado->sonido}}, Instruccion: {{$configurado->instruccion}}" name="{{$configuracion->id_paciente}}" >
                                    @endif
                                @endforeach 
                            
                                
                                <td  >
                                    @foreach ($juegos as $juego)
                                        @if ($juego->id==$configuracion->id_juego)
                                            {{$juego->nombre}}
                                        @endif
                                    @endforeach 
                                </td>
                                <td>
                                    @foreach ($pacientes as $paciente)
                                        @if ($paciente->id==$configuracion->id_paciente)
                                            {{$paciente->nombre}}
                                        @endif
                                    @endforeach 
                                </td>
                                <td>
                                    {{$configuracion->orden}}
                                </td>
                                <td>
                                    @if ($configuracion->juegado==0)
                                        No
                                    @endif
                                    @if ($configuracion->juegado==1)
                                        Si
                                    @endif
                                </td>
                                <td>
                                    {!!Form::open(['route'=>array('index.update', $configuracion->id), 'method'=>'PUT'])!!}
                                    
                                        @if ($configuracion->disponible==0)
                                            <button type="submit" class= "btn btn-danger col-md-4" >
                                            No
                                            </button>
                                        @endif
                                        @if ($configuracion->disponible==1)
                                            <button type="submit" class= "btn btn-success col-md-4" >
                                            Si
                                            </button>
                                        @endif
                                    {!!Form::close()!!}


                                </td>
                                <td>
                                    {{$configuracion->fecha}}
                                </td>
                                <td>
                                    <button class= "btn btn-primary col-md-4" onclick="" id="b">
                                        Editar
                                    </button>
                                </td>

                            </tr>
                            @endforeach
                        </tbody>
                      </table>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="edit" class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Registro de usuario</div>
                <div class="panel-body">
                    {!!Form::open(['route'=>'agregar.store', 'method'=>'POST'])!!}
                        @foreach ($configuraciones as $configuracion)
                                @foreach ($configurados as $configurado)
                                    @if ($configurado->id==$configuracion->id_conf)
                                    <tr data-toggle="tooltip" data-placement="bottom" title="Sonido: {{$configurado->sonido}}, Instruccion: {{$configurado->instruccion}}" name="{{$configuracion->id_paciente}}" >
                                    @endif
                                @endforeach 
                            
                                
                                <td  >
                                    @foreach ($juegos as $juego)
                                        @if ($juego->id==$configuracion->id_juego)
                                            {{$juego->nombre}}
                                        @endif
                                    @endforeach 
                                </td>
                                <td>
                                    @foreach ($pacientes as $paciente)
                                        @if ($paciente->id==$configuracion->id_paciente)
                                            {{$paciente->nombre}}
                                        @endif
                                    @endforeach 
                                </td>
                                <td>
                                    {{$configuracion->orden}}
                                </td>
                                <td>
                                    @if ($configuracion->juegado==0)
                                        No
                                    @endif
                                    @if ($configuracion->juegado==1)
                                        Si
                                    @endif
                                </td>
                                <td>
                                    @inject('index', 'App\Http\Controllers\IndexController')
                                    
                                        @if ($configuracion->disponible==0)
                                            <button class= "btn btn-danger col-md-4" onclick="">
                                            No
                                            </button>
                                        @endif
                                        @if ($configuracion->disponible==1)
                                            <button class= "btn btn-success col-md-4" onclick="">
                                            Si
                                            </button>
                                        @endif
                                    


                                </td>
                                <td>
                                    {{$configuracion->fecha}}
                                </td>
                                <td>
                                    <button class= "btn btn-primary col-md-4" onclick="" id="b">
                                        Editar
                                    </button>
                                </td>

                            </tr>
                            @endforeach
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-btn fa-user"></i> Registrar
                                </button>
                            </div>
                        </div>
                    {!!Form::close()!!}
                </div>
            </div>
        </div>
    </div>
</div>

<script>
$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();
});

$(document).ready(function(){
        $("#edit").hide();
        $("#b").click(function(){
            $("#edit").show();

        });
    });
</script>
@endsection
