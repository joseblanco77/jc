@extends('layout.master')

@section('logout')
    @parent
    @include('logout')
@stop

@section('content')


<h2>Editar Producto</h2>
{{ Form::model($data['product'], ['route' => ['update-product', $data['product']->id]]) }}
<dl>
    <dt>{{ Form::label('productname', 'Nombre del Producto') }}</dt>
    <dd>
        {{ Form::text('productname', Input::old('productname'))  }}
        <span class="error">{{ $errors->products->first('productname') }}</span>
    </dd>
    <dt>{{ Form::label('brand', 'Marca') }}</dt>
    <dd>
        {{ Form::text('brand', Input::old('brand'))  }}
        <span class="error">{{ $errors->products->first('brand') }}</span>
    </dd>
    <dt>{{ Form::label('category', 'Categoría') }}</dt>
    <dd>
        {{ Form::text('category', Input::old('category'))  }}
        <span class="error">{{ $errors->products->first('category') }}</span>
    </dd>
    <dt>{{ Form::label('price', 'Precio') }}</dt>
    <dd>
        {{ Form::text('price', Input::old('price'))  }}
        <span class="error">{{ $errors->products->first('price') }}</span>
    </dd>
    <dt>{{ Form::label('quantity', 'Cantidad') }}</dt>
    <dd>
        {{ Form::text('quantity', Input::old('quantity'))  }}
        <span class="error">{{ $errors->products->first('quantity') }}</span>
    </dd>
    <dt></dt>
    <dd>{{ Form::submit('Guardar &#x2714;')  }}</dd>
</dl>
{{ Form::close() }}

@stop
s