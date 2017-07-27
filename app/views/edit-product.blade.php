@extends('layout.master')

@section('content')

    <h1 class="page-header">Editar Producto</h1>

    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                Ingrese los datos
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-lg-6">

                        {{ Form::model($product, ['route' => ['update-product', $product->id]]) }}

                            <div class="form-group">
                                {{ Form::label('productname', 'Nombre del Producto') }}
                                {{ Form::text('productname', Input::old('productname'), ['class'=>'form-control'])  }}
                                @if ($errors->has('productname'))
                                <div class="alert alert-danger">{{ $errors->first('productname') }}</div>
                                @endif
                            </div>

                            <div class="form-group">
                                {{ Form::label('brand', 'Marca') }}
                                {{ Form::text('brand', Input::old('brand'), ['class'=>'form-control'])  }}
                                @if ($errors->has('brand'))
                                <div class="alert alert-danger">{{ $errors->first('brand') }}</div>
                                @endif
                            </div>

                            <div class="form-group">
                                {{ Form::label('category', 'Categoría') }}
                                {{ Form::text('category', Input::old('category'), ['class'=>'form-control'])  }}
                                @if ($errors->has('category'))
                                <div class="alert alert-danger">{{ $errors->first('category') }}</div>
                                @endif
                            </div>

                            <div class="form-group">
                                {{ Form::label('price', 'Precio') }}
                                {{ Form::text('price', Input::old('price'), ['class'=>'form-control'])  }}
                                @if ($errors->has('price'))
                                <div class="alert alert-danger">{{ $errors->first('price') }}</div>
                                @endif
                            </div>

                            <div class="form-group">
                                {{ Form::label('quantity', 'Cantidad') }}
                                {{ Form::text('quantity', Input::old('quantity'), ['class'=>'form-control'])  }}
                                @if ($errors->has('quantity'))
                                <div class="alert alert-danger">{{ $errors->first('quantity') }}</div>
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
