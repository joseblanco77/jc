@extends('layout.master')

@section('logout')
@parent
@include('logout')
@stop

@section('content')

    <h2>Agregar compra</h2>

    @include('purchase-form')
    @include('purchase-customer')
    @include('purchase-products')

@stop

