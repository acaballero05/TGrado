@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                          <tr>
                            <th>Nombre</th>
                            <th>Objetivo</th>
                            <th>Tipo de juego</th>
                            <th>Subtipo</th>
                            <th>Categoría</th>
                            <th>Niveles de dificultad</th>
                            <th>Distractores</th>
                            <th>Verbo</th>
                            <th>Adjetivo</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($juegos as $juego)
                                <tr>
                                    <td>{{$juego->nombre}}</td>
                                    <td>{{$juego->objetivo}}</td>
                                    <td>
                                        {{$juego->tipo}}
                                    </td>
                                    <td>
                                        {{$juego->subtipo}}
                                    </td>
                                    <td>
                                        @foreach ($relaciones as $relacion)
                                            @if ($juego->id==$relacion->id_juego)
                                                @if ($relacion->id_taxonomia==2)
                                                    @foreach ($caracteristicas as $caracteristica)
                                                        @if ($caracteristica->id==$relacion->id_caracteristica)
                                                            {{$caracteristica->nombre}}
                                                            <br>
                                                        @endif
                                                    @endforeach
                                                @endif
                                                @endif
                                        @endforeach
                                    </td>
                                    <td>
                                        @foreach ($relaciones as $relacion)
                                            @if ($juego->id==$relacion->id_juego)
                                                @if ($relacion->id_taxonomia==5)
                                                    @foreach ($caracteristicas as $caracteristica)
                                                        @if ($caracteristica->id==$relacion->id_caracteristica)
                                                            {{$caracteristica->nombre}}
                                                            <br>
                                                        @endif
                                                    @endforeach
                                                @endif
                                                @endif
                                        @endforeach
                                    </td>
                                    <td>
                                        @foreach ($relaciones as $relacion)
                                            @if ($juego->id==$relacion->id_juego)
                                                @if ($relacion->id_taxonomia==7)
                                                    @foreach ($caracteristicas as $caracteristica)
                                                        @if ($caracteristica->id==$relacion->id_caracteristica)
                                                            {{$caracteristica->nombre}}
                                                            <br>
                                                        @endif
                                                    @endforeach
                                                @endif
                                                @endif
                                        @endforeach
                                    </td>
                                    <td>
                                        @foreach ($relaciones as $relacion)
                                            @if ($juego->id==$relacion->id_juego)
                                                @if ($relacion->id_taxonomia==3)
                                                    @foreach ($caracteristicas as $caracteristica)
                                                        @if ($caracteristica->id==$relacion->id_caracteristica)
                                                            {{$caracteristica->nombre}}
                                                            <br>
                                                        @endif
                                                    @endforeach
                                                @endif
                                                @endif
                                        @endforeach
                                    </td>
                                    <td>
                                        @foreach ($relaciones as $relacion)
                                            @if ($juego->id==$relacion->id_juego)
                                                @if ($relacion->id_taxonomia==1)
                                                    @foreach ($caracteristicas as $caracteristica)
                                                        @if ($caracteristica->id==$relacion->id_caracteristica)
                                                            {{$caracteristica->nombre}}
                                                            <br>
                                                        @endif
                                                    @endforeach
                                                @endif
                                                @endif
                                        @endforeach
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
@endsection
