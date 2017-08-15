<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-green">
            <div class="panel-heading">
                Detalle
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <div class="table-responsive">
                    @if (count($data['details']))
                    <table class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>Producto</th>
                                <th>Marca</th>
                                <th>Categoría</th>
                                <th>Precio Unitario</th>
                                <th>Cantidad</th>
                                <th>Monto</th>
                                <th>Vendedor</th>
                                <th>Opciones</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php $total = 0; ?>
                        @foreach ($data['details'] as $detail)
                            <?php
                                $amount = ($detail->price * $detail->quantity);
                                $total  = $total + $amount;
                            ?>
                            <tr>
                                <td>{{ $detail->productname }}</td>
                                <td>{{ $detail->brand }}</td>
                                <td>{{ $detail->category }}</td>
                                <td class="text-right td-currency"><span></span> {{ number_format($detail->price, 2) }}</td>
                                <td class="text-right">{{ $detail->quantity }}</td>
                                <td class="text-right td-currency"><span></span> {{ number_format($amount, 2) }}</td>
                                <td>{{ $detail->realname }}</td>
                                <td>

                                    {{ link_to('/delete-detail/'.$detail->id,'Borrar &#x2718;',['class'=>'delete-detail']) }}
                                </td>
                            </tr>
                        @endforeach
                            <tr class="info">
                                <td colspan="5">Total</td>
                                <td class="text-right td-currency"><span></span> {{ number_format($total, 2) }}</td>
                                <td colspan="2"></td>
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
