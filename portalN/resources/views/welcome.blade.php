@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Bienvenido!</div>
                <div class="panel-body">
                    <div class="container">
                        <h2>Juegos</h2>
                        <div class="col-md-9">
                        <ul class="nav nav-tabs">
                            <li class="active"><a data-toggle="tab" href="#home">Inicio</a></li>
                            @foreach ($juegos as $juego)
                                <li><a data-toggle="tab" href="#{{$juego->id_conf}}">
                                    @foreach ($juegosNom as $j)
                                        @if($j->id==$juego->id_juego)
                                            {{$j->nombre}}
                                        @endif
                                    @endforeach 
                                </a></li>
                            @endforeach 
                            
                            
                        </ul>

                        <div class="tab-content">
                            <div id="home" class="tab-pane fade in active">
                                <h3>INICIO</h3>
                                <p>Selecciona la pestaña del juego que deseas jugar.</p>
                            </div>
                            @foreach ($juegos as $juego)
                                <div id={{$juego->id_conf}} class="tab-pane fade">
                                    <br>
                                    <iframe src="users/{{$user}}/{{$juego->id_conf}}/{{$juego->id_juego}}/" height="480" width="640">
                                      <p>Your browser does not support iframes.</p>
                                    </iframe>
                                </div>

                            @endforeach 
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
