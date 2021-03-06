@extends('layout.master')


@section('headlinks')

    <!-- DataTables CSS -->
    <link href="packages/sbadmin2/vendor/datatables-plugins/dataTables.bootstrap.css" rel="stylesheet">

    <!-- DataTables Responsive CSS -->
    <link href="packages/sbadmin2/vendor/datatables-responsive/dataTables.responsive.css" rel="stylesheet">

@stop



@section('content')

    <h1 class="page-header">Compras</h1>

    @if (count($purchases))

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Listado
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <table width="100%" class="table table-striped table-bordered table-hover" id="purchaseList">
                        <thead>
                            <tr>
                                <th>Fecha</th>
                                <th>Cliente</th>
                                <th>Ingresado por</th>
                                <th>Factura</th>
                                <th>Forma de pago</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($purchases as $purchase)
                            <tr>
                                <td><a href="purchase/{{ $purchase->id }}">{{ formatDatetime($purchase->created_at) }}</a></td>
                                <td>{{ $purchase->customer->customername }}</td>
                                <td>{{ $purchase->user->realname }}</td>
                                <td class="text-right">{{ $purchase->invoice }}</td>
                                <td>{{ $purchase->payment }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <!-- /.table-responsive -->
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->

    @else
        <p>No hay purchaseos</p>
    @endif

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
    $('#purchaseList').DataTable({
        "order": [[ 0, 'desc' ]]
        responsive: true
    });
});
</script>

@stop
