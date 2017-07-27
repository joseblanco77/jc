@extends('layout.master')


@section('headlinks')

    <!-- DataTables CSS -->
    <link href="packages/sbadmin2/vendor/datatables-plugins/dataTables.bootstrap.css" rel="stylesheet">

    <!-- DataTables Responsive CSS -->
    <link href="packages/sbadmin2/vendor/datatables-responsive/dataTables.responsive.css" rel="stylesheet">

@stop




@section('content')

    <h1 class="page-header">Clientes</h1>

    @include('add-customer')

    @if (count($customers))

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Listado
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <table width="100%" class="table table-striped table-bordered table-hover" id="customerList">
                        <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Opciones</th>
                            <th>Teléfono</th>
                            <th>Dirección</th>
                            <th>E-mail</th>
                            <th>NIT</th>
                            <th>Acciones</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($customers as $customer)
                            <tr>
                                <td>
                                    @if(!empty($customer->comments))
                                        <a data-toggle="tooltip" data-placement="top" title="{{ $customer->comments }}">{{ $customer->customername }}</a>
                                    @else
                                        {{ $customer->customername }}
                                    @endif
                                 </td>
                                <td>
                                    {{ link_to('/edit-customer/'.$customer->id,'&#x270e; Editar') }} -
                                    {{-- link_to('/delete-customer/'.$customer->id,'Borrar &#x2718;') --}}
                                </td>
                                <td>{{ $customer->phone }}</td>
                                <td>{{ $customer->address }}</td>
                                <td>{{ $customer->email }}</td>
                                <td>{{ $customer->nit ? $customer->nit : 'C/F' }}</td>
                                <td>
                                    {{ link_to('/create-purchase/'.$customer->id,'Crear nueva compra &#x27a4;') }}
                                </td>
                            </tr>
                        @endforeach
                        <tbody>
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
        <p>No hay clientes</p>
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
    $('#customerList').DataTable({
        responsive: true
    });
});
</script>

@stop
