@extends('layout.master')

@section('content')

    <h1 class="page-header">Reportes</h1>

    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                Ingrese los datos
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-lg-6">


                        {{ Form::open(['url' => 'reports-show', 'method' => 'post']) }}

                        <div class="form-group">
                            {{ Form::label('user', 'Vendedores') }}</dt>
                            {{ Form::select('user', ['todos'=>'Todos']+$users,null,['required'=>'required', 'class'=>'form-control'])  }}
                        </div>

                        <div class="form-group">
                            {{ Form::label('date_range', 'Fecha') }}</dt>
                            {{ Form::select('date_range', ['hoy'=>'Hoy','semana'=>'Ultimos 7 días','mes'=>'Últimos 30 días'],null,['required'=>'required', 'class'=>'form-control'])  }}
                        </div>

                        <div class="form-group">
                            {{ Form::submit('Generar', ['class'=>'btn btn-success'])  }}
                        </div>

                        {{ Form::close() }}

                    </div>
                </div>
            </div>
        </div>
    </div>


@stop


