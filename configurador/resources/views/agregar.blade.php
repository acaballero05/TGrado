@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Registro de usuario</div>
                <div class="panel-body">
                    {!!Form::open(['route'=>'agregar.store', 'method'=>'POST'])!!}
                        <div class="form-group">
                            <label for="name" class="col-md-4 control-label">Nombre</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" required>

                            </div>
                        </div>
                        <br>
                        <br>
                        <br>
                        <div class="form-group">
                            <label for="email" class="col-md-4 control-label">Edad</label>

                            <div class="col-md-6">
                                <input id="edad" type="number" class="form-control" name="edad" required>

                            </div>
                        </div>
                        <br>
                        <br>
                        <div class="form-group">
                            <label for="password" class="col-md-4 control-label">Nombre de usuario</label>

                            <div class="col-md-6">
                                <input id="username" type="text" class="form-control" name="username" required>

                            </div>
                        </div>
                        <br>
                        <br>
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
@endsection
