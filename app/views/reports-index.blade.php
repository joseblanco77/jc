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
                            {{ Form::label('date_ini', 'Fecha inicio') }}</dt>
                            {{ Form::text('date_ini', date('d-m-Y'), ['required'=>'required', 'class'=>'form-control'])  }}
                        </div>

                        <div class="form-group">
                            {{ Form::label('date_end', 'Fecha final') }}</dt>
                            {{ Form::text('date_end', date('d-m-Y'), ['required'=>'required', 'class'=>'form-control'])  }}
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


@section('headlinks')
<link rel="stylesheet" type="text/css" href="packages/jquery-ui-1.12.1.custom/jquery-ui.min.css">
@stop

@section('footscripts')
<script type="text/javascript" src="packages/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
        $( "#date_ini" ).datepicker({
            dateFormat: "dd-mm-yy"
        });
        $( "#date_end" ).datepicker({
            dateFormat: "dd-mm-yy"
        });
    });
</script>
@stop



