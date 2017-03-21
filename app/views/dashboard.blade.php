@extends('layout.master')

@section('content')

    <h2>Productos</h2>

    @if ($data['user']->usertype == 1)
    <h3>Agregar Producto</h3>
    {{ Form::open(['url' => '/add-product', 'method' => 'post']) }}
    <dl>
        <dt>{{ Form::label('productname', 'Nombre del Producto') }}</dt>
        <dd>{{ Form::text('productname')  }}</dd>
        <dt>{{ Form::label('brand', 'Marca') }}</dt>
        <dd>{{ Form::text('brand')  }}</dd>
        <dt>{{ Form::label('category', 'Categoría') }}</dt>
        <dd>{{ Form::text('category')  }}</dd>
        <dt>{{ Form::label('price', 'Precio') }}</dt>
        <dd>{{ Form::text('price')  }}</dd>
        <dt>{{ Form::label('quantity', 'Cantidad') }}</dt>
        <dd>{{ Form::text('quantity')  }}</dd>
        <dt></dt>
        <dd>{{ Form::submit('Guardar')  }}</dd>
    </dl>
    {{ Form::close() }}
    @endif

    <h3>Listado</h3>
    @if (count($data['products']))
        <table>
            <tr>
                <th>Producto</th>
                <th>Marca</th>
                <th>Categoría</th>
                <th>Precio</th>
                <th>Cantidad</th>
            </tr>
            @foreach ($data['products'] as $product)
                <tr>
                    <th>{{ $product->productname }}</th>
                    <th>{{ $product->brand }}</th>
                    <th>{{ $product->category }}</th>
                    <th>{{ $product->price }}</th>
                    <th>{{ $product->quantity }}</th>
                </tr>
            @endforeach
        </table>
    @else
        <p>No hay productos</p>
    @endif

@stop


