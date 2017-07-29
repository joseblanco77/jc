@extends('layout.master')

@section('headlinks')

    <!-- DataTables CSS -->
    <link href="packages/sbadmin2/vendor/datatables-plugins/dataTables.bootstrap.css" rel="stylesheet">

    <!-- DataTables Responsive CSS -->
    <link href="packages/sbadmin2/vendor/datatables-responsive/dataTables.responsive.css" rel="stylesheet">

@stop



@section('content')

    <h2>Agregar compra</h2>

    @include('purchase-form')
    @include('purchase-products')

@stop

@section('footscripts')

<!-- DataTables JavaScript -->
<script src="packages/sbadmin2/vendor/datatables/js/jquery.dataTables.min.js"></script>
<script src="packages/sbadmin2/vendor/datatables-plugins/dataTables.bootstrap.min.js"></script>
<script src="packages/sbadmin2/vendor/datatables-responsive/dataTables.responsive.js"></script>

<!-- Custom Theme JavaScript -->
<script src="packages/sbadmin2/dist/js/sb-admin-2.js"></script>

<!-- Page-Level Demo Scripts - Tables - Use for reference -->
<script>
$(document).ready(function() {
    $('#productList').DataTable({
        responsive: true
    });
});
</script>

@stop


