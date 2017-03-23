@extends('layout.master')

@section('logout')
    @parent
    @include('logout')
@stop

@section('content')

    <h2>Productos</h2>

    @if ($data['user']->usertype == 1)
        @include('add-product')
    @endif

    @include('list-product')

@stop


