@extends('layout.master')


@section('content')

    <h1 class="page-header">Editar Cliente</h1>

    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                Ingrese los datos
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-lg-6">


                        {{ Form::model($customer, ['route' => ['update-customer', $customer->id]]) }}

                            <div class="form-group">
                                {{ Form::label('customername', 'Nombre del cliente') }}
                                {{ Form::text('customername', Input::old('customername'), ['class'=>'form-control'])  }}
                                @if ($errors->has('customername'))
                                <div class="alert alert-danger">{{ $errors->first('customername') }}</div>
                                @endif
                            </div>

                            <div class="form-group">
                                {{ Form::label('phone', 'Teléfonos') }}
                                {{ Form::text('phone', Input::old('phone'), ['class'=>'form-control'])  }}
                                @if ($errors->has('phone'))
                                <div class="alert alert-danger">{{ $errors->first('phone') }}</div>
                                @endif
                            </div>

                            <div class="form-group">
                                {{ Form::label('address', 'Dirección') }}
                                {{ Form::text('address', Input::old('address'), ['class'=>'form-control'])  }}
                                @if ($errors->has('address'))
                                <div class="alert alert-danger">{{ $errors->first('address') }}</div>
                                @endif
                            </div>

                            <div class="form-group">
                                {{ Form::label('email', 'E-mail') }}
                                {{ Form::text('email', Input::old('email'), ['class'=>'form-control'])  }}
                                @if ($errors->has('email'))
                                <div class="alert alert-danger">{{ $errors->first('email') }}</div>
                                @endif
                            </div>

                            <div class="form-group">
                                {{ Form::label('nit', 'NIT') }}
                                {{ Form::text('nit', Input::old('nit'), ['class'=>'form-control'])  }}
                                @if ($errors->has('nit'))
                                <div class="alert alert-danger">{{ $errors->first('nit') }}</div>
                                @endif
                            </div>

                            <div class="form-group">
                                {{ Form::label('comments', 'Comentarios') }}
                                {{ Form::textarea('comments', Input::old('comments'), ['class'=>'form-control'])  }}
                                @if ($errors->has('comments'))
                                <div class="alert alert-danger">{{ $errors->first('comments') }}</div>
                                @endif
                            </div>

                            <div class="form-group">
                                {{ Form::submit('Guardar &#x2714;', ['class'=>'btn btn-success'])  }}
                            </div>

                        {{ Form::close() }}

                    </div>
                </div>
            </div>
        </div>
    </div>

@stop

