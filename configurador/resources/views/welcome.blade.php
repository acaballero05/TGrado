@extends('layouts.app')

@section('content')

<script language="JavaScript">
function toggle(source) {
  checkboxes = document.getElementsByName('juego[]');
  for(var i=0, n=checkboxes.length;i<n;i++) {
    checkboxes[i].checked = source.checked;
  }
}
</script>

<script>

function myFunction(elemento) {
   
    var ad = document.getElementById('adverbio').value;
    var c = document.getElementById('categoria').value;
    var t = document.getElementById('tipo').value;
    var a = document.getElementById('adjetivo').value;
    var v = document.getElementById('verbo').value;
    var y = document.getElementsByTagName("p");
    var j = document.getElementsByName("lista_juegos");

    var v1=0;
    var v2=0;
    var v3=0;
    var v4=0;
    var v5=0;
    
    for (k = 0; k < j.length; k++) {
         v1=0;
         v2=0;
         v3=0;
         v4=0;
         v5=0;
        for (i = 0; i < y.length; i++) { 
                if((y[i].getAttribute("class")==ad)&&(j[k].getAttribute("id")==y[i].getAttribute("name")))
                {
                    v1=1;
                }
                if((y[i].getAttribute("class")==c)&&(j[k].getAttribute("id")==y[i].getAttribute("name")))
                {
                    v2=1;
                }
                if((y[i].getAttribute("class")==t)&&(j[k].getAttribute("id")==y[i].getAttribute("name")))
                {
                    v3=1;
                }
                if((y[i].getAttribute("class")==a)&&(j[k].getAttribute("id")==y[i].getAttribute("name")))
                {
                    v4=1;
                }
                if((y[i].getAttribute("class")==v)&&(j[k].getAttribute("id")==y[i].getAttribute("name")))
                {
                    v5=1;

                }
        }
        if ((v2==1) && (v3==1) && (v5==1) && ((v1==1) || (v4==1) ) ) {
            j[k].style.display="table-row";

        }
        else{
            j[k].style.display="none";

        }
    }
}

function myFunction2() {
    var x = document.getElementById("Gsonido").value;
    var y = document.getElementsByClassName("soni");

    for (i = 0; i < y.length; i++) { 
        y[i].value=x;
    }

}

function myFunction3() {
    var x = document.getElementById("Ginstrucciones").value;
    var y = document.getElementsByClassName("instru");

    for (i = 0; i < y.length; i++) { 
        y[i].value=x;
    }

}

function myFunction4() {
    var x = document.getElementsByClassName("che");
    var y = document.getElementsByClassName("lstjuegos");

    for (j = 0; j < y.length; j++) {
        y[j].style.display="none";
    }
    tmp=0;
    for (i = 0; i < x.length; i++) { 
        if (x[i].checked) {
            for (j = 0; j < y.length; j++) {
                if (x[i].getAttribute("id")==y[j].getAttribute("id")) {
                    tmp=j;
                }
            }
            y[tmp].style.display="table-row";
        }
    }
}
</script>

{!!Form::open(['route'=>'index.store', 'method'=>'POST'])!!}
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Criterios de selección</div>
                <div class="panel-body ">
                    <p id="demo"></p>
                        <div class="panel-heading">
                            <h5 class="panel-title">Género</h2>
                        </div>
                        <div class="panel-body">
                            <label class="radio-inline">
                              <input type="radio" name="genero" value="m" checked><i class="fa fa-male" aria-hidden="true"></i>
                            </label>
                            <label class="radio-inline">
                              <input type="radio" name="genero" value="f"><i class="fa fa-female" aria-hidden="true"></i>
                            </label>
                        </div> 
                        <br>
                        <div class="relacion">
                            @foreach ($relaciones as $relacion)
                                <p id="texto" class="{{$relacion->id_caracteristica}}" name="{{$relacion->id_juego}}" ></p>
                            @endforeach
                        </div>
                        <div class="row">

                            <div class="col-sm-5 panel">
                                <div class="panel-heading">
                                    <h5 class="panel-title">Categoría Semántica</h2>
                                </div>
                                <div class="panel-body">
                                    <select class="form-control" name="categoria" id="categoria" onclick="myFunction()">
                                        @foreach ($caracteristicas as $caracteristica)
                                            @if ($caracteristica->id_taxonomia==2)
                                                <option value="{{$caracteristica->id}}">{{$caracteristica->nombre}}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-5 panel">
                                <div class="panel-heading">
                                    <h4 class="panel-title">Objetivo</h4>
                                </div>
                                <div class="panel-body">
                                    <select class="form-control" name="tipo" id="tipo" onclick="myFunction()">
                                        @foreach ($caracteristicas as $caracteristica)
                                            @if ($caracteristica->id_taxonomia==9)
                                                <option value={{$caracteristica->id}}>{{$caracteristica->nombre}}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>                          
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
                <div class="panel-heading">Criterios opcionales </div>
                <div class="panel-body ">
                    <p id="demo"></p>
                        <div class="row">
                            <div class="col-sm-5 panel">
                                <div class="panel-heading">
                                    <h5 class="panel-title">Adjetivo</h2>
                                </div>
                                <div class="panel-body">
                                    <select class="form-control"  name="adjetivo" id="adjetivo" onclick="myFunction()">
                                        @foreach ($caracteristicas as $caracteristica)
                                            @if ($caracteristica->id_taxonomia==1)
                                                <option value={{$caracteristica->id}}>{{$caracteristica->nombre}}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-5 panel">
                                <div class="panel-heading">
                                    <h5 class="panel-title">Verbo</h2>
                                </div>
                                <div class="panel-body">
                                    <select class="form-control"  name="verbo" id="verbo" onclick="myFunction()">
                                        @foreach ($caracteristicas as $caracteristica)
                                            @if ($caracteristica->id_taxonomia==3)
                                                <option value={{$caracteristica->id}}>{{$caracteristica->nombre}}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-5 panel">
                                <div class="panel-heading">
                                    <h5 class="panel-title">Adverbio</h2>
                                </div>
                                <div class="panel-body">
                                    <select class="form-control"  name="adverbio" id="adverbio" onclick="myFunction()">
                                        @foreach ($caracteristicas as $caracteristica)
                                            @if ($caracteristica->id_taxonomia==8)
                                                <option value={{$caracteristica->id}}>{{$caracteristica->nombre}}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            
                            
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
                <div class="panel-heading">Selección de juegos</div>
                <div class="panel-body">
                     <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                          <tr>
                            <th>Nombre</th>
                            <th>Objetivo</th>
                            <th>Tipo</th>
                            <th>Requisito</th>
                            
                            <th><input type="checkbox" onClick="toggle(this)" onchange="myFunction4()" /> Toggle All<br/></th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($juegos as $juego)
                            <tr id="{{$juego->id}}" name="lista_juegos">
                                <td>{{$juego->nombre}}</td>
                                <td>
                                    @foreach ($relaciones as $relacion)
                                        @if (($relacion->id_juego==$juego->id) and ($relacion->id_taxonomia==9))
                                            @foreach ($caracteristicas as $caracteristica)
                                                @if ($caracteristica->id==$relacion->id_caracteristica)
                                                    {{$caracteristica->nombre}}
                                                    <br>
                                                @endif
                                            @endforeach
                                        @endif
                                    @endforeach
                                </td>
                                <td>{{$juego->tipo}}<br>{{$juego->subtipo}}</td>
                                <td>{{$juego->requisito}}</td>
                                
                                <td>
                                    <div class="checkbox">
                                        <label onchange="myFunction4()"><input class="che" type="checkbox" name="juego[]" value="{{$juego->id}}" id="{{$juego->id}}" ></label>
                                    </div>
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

<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Configuración</div>
                <div class="panel-body">
                        <div class="col-sm-5 panel">
                            <div class="panel-heading">
                                <h4 class="panel-title">Sonido</h4>
                            </div>
                            <div class="panel-body">
                                <select class="form-control" name="Gsonido" id="Gsonido" onchange="myFunction2()">
                                    <option value="1">Si</option>
                                    <option value="0">No</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-5 panel">
                            <div class="panel-heading">
                                <h5 class="panel-title">Instrucciones</h5>
                            </div>
                            <div class="panel-body">
                                <select class="form-control" name="Ginstrucciones" id="Ginstrucciones"   onchange="myFunction3()">
                                    <option value="texto">Texto</option>
                                    <option value="audio">Audio</option>
                                    <option value="ideografica">Ideografica</option>
                                </select>
                            </div>
                        </div>
                        <table class="table table-condensed" >
                            <thead>
                              <tr>
                                <th>Nombre</th>
                                <th>Dificultad</th>
                                <th>Distractores</th>
                                <th>Sonido</th>
                                <th>Instrucciones</th>
                              </tr>
                            </thead>
                            <tbody>
                                    @foreach ($juegos as $juego)
                                            <tr class="lstjuegos" id="{{$juego->id}}">
                                                <td>{{$juego->tipo}}<br>{{$juego->subtipo}}</td>
                                                <td>
                                                    <select class="form-control" name="{{$juego->id}}dificultad">
                                                        @foreach ($relaciones as $relacion)
                                                            @if (($relacion->id_juego==$juego->id) and ($relacion->id_taxonomia==5))
                                                                <option value={{$relacion->id_caracteristica}}>
                                                                    @foreach ($caracteristicas as $caracteristica)
                                                                        @if ($caracteristica->id==$relacion->id_caracteristica)
                                                                            {{$caracteristica->nombre}}
                                                                        @endif
                                                                    @endforeach
                                                                </option>
                                                            @endif
                                                        @endforeach
                                                    </select>
                                                </td>
                                                <td> 
                                                    <select class="form-control" name="{{$juego->id}}distractores">
                                                        @foreach ($relaciones as $relacion)
                                                            @if (($relacion->id_juego==$juego->id) and ($relacion->id_taxonomia==7))
                                                                <option value={{$relacion->id_caracteristica}}>
                                                                    @foreach ($caracteristicas as $caracteristica)
                                                                        @if ($caracteristica->id==$relacion->id_caracteristica)
                                                                            {{$caracteristica->nombre}}
                                                                        @endif
                                                                    @endforeach
                                                                </option>
                                                            @endif
                                                        @endforeach
                                                    </select>

                                                </td>
                                                <td>
                                                    <select class="form-control soni" name="{{$juego->id}}sonido">
                                                        <option value="1" >Si</option>
                                                        <option value="0">No</option>
                                                    </select>
                                                </td>
                                                <td>
                                                    <select class="form-control instru" name="{{$juego->id}}instruccion">
                                                        <option value="texto">Texto</option>
                                                        <option value="audio">Audio</option>
                                                        <option value="ideografica" >Ideografica</option>
                                                    </select>
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

<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Asignar usuarios</div>
                <div class="panel-body">
                    <div class="row">
                        <div class="panel-body">
                            <div class="col-sm-5">
                                <select class="form-control" name="username">
                                    @foreach ($pacientes as $paciente)
                                        <option value={{$paciente->id}}>{{$paciente->nombre}}</option>
                                    @endforeach
                                </select>
                                <br>
                                <div class="col-md-5">
                                    <input class= "btn btn-success btn-lg btn-block"  type="submit" value="Asignar">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



{!!Form::close()!!}
@endsection



