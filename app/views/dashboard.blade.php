@extends('layout.master')

@section('logout')
    @parent
    @include('logout')
@stop

@section('content')

    @include('list-product')

    @include('list-customer')

@stop


