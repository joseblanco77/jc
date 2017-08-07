<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-green">
            <div class="panel-heading">
                Detalle
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <div class="table-responsive">
                    @if (count($report['data']))
                    <table class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>Producto</th>
                                <th>Marca</th>
                                <th>Categoría</th>
                                <th>Cliente</th>
                                <th>Precio Unitario</th>
                                <th>Cantidad</th>
                                <th>Monto</th>
                                <th>Fecha</th>
                                <th>Vendedor</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php $total = 0; ?>
                        @foreach ($report['data'] as $report)
                            <?php
                                $amount = ($report->price * $report->quantity);
                                $total  = $total + $amount;
                            ?>
                            <tr>
                                <td>{{ $report->product->productname }}</td>
                                <td>{{ $report->product->brand }}</td>
                                <td>{{ $report->product->category }}</td>
                                <td>{{ $report->purchase->customer->customername }}</td>
                                <td class="text-right td-currency"><span></span> {{ number_format($report->price, 2) }}</td>
                                <td class="text-right">{{ $report->quantity }}</td>
                                <td class="text-right td-currency"><span></span> {{ number_format($amount, 2) }}</td>
                                <td>{{ formatDatetime($report->created_at) }}</td>
                                <td>{{ $report->user->realname }}</td>
                            </tr>
                        @endforeach
                            <tr class="info">
                                <td colspan="5">Total</td>
                                <td class="text-right td-currency"><span></span> {{ number_format($total, 2) }}</td>
                                <td colspan="3"></td>
                            </tr>
                        </tbody>
                    </table>
                    @else
                        <p>No hay productos</p>
                    @endif
                </div>
                <!-- /.table-responsive -->
            </div>
            <!-- /.panel-body -->
        </div>
        <!-- /.panel -->
    </div>
</div>
