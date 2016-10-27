@extends('layouts.app')

@section('content')
{!!Form::open(['route'=>'index.store', 'method'=>'POST'])!!}
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Login</div>
                <div class="panel-body">
                    

                        <div class="form-group">
                            <label for="email" class="col-md-4 control-label">Username</label>

                            <div class="col-md-6">
                                <input id="email" type="text" class="form-control" name="username">
                            </div>
                        </div>
                        <br>
                        <br>
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-btn fa-sign-in"></i> Login
                                </button>
                            </div>
                        </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>
{!!Form::close()!!}
@endsection
