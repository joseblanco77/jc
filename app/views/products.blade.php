@extends('layout.master')


@section('headlinks')

    <!-- DataTables CSS -->
    <link href="packages/sbadmin2/vendor/datatables-plugins/dataTables.bootstrap.css" rel="stylesheet">

    <!-- DataTables Responsive CSS -->
    <link href="packages/sbadmin2/vendor/datatables-responsive/dataTables.responsive.css" rel="stylesheet">

@stop



@section('content')

    <h1 class="page-header">Productos</h1>

    @include('add-product')

    @if (count($products))

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Listado
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <table width="100%" class="table table-striped table-bordered table-hover" id="productList">
                        <thead>
                            <tr>
                                <th>Producto</th>
                                <th>Marca</th>
                                <th>Categoría</th>
                                <th>Precio</th>
                                <th>Cantidad</th>
                                <th>Opciones</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($products as $product)
                            <tr>
                                <td>{{ $product->productname }}</td>
                                <td>{{ $product->brand }}</td>
                                <td>{{ $product->category }}</td>
                                <td class="text-right td-currency"><span></span> {{ number_format($product->price, 2) }}</td>
                                <td class="text-right">{{ $product->quantity }}</td>
                                <td>
                                    {{ link_to('/edit-product/'.$product->id,'Editar &#x270e;') }}
                                    {{-- link_to('/delete-product/'.$product->id,'Borrar &#x2718;') --}}
                                </td>
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
        <p>No hay productos</p>
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
    $('#productList').DataTable({
        responsive: true
    });
});
</script>

@stop
