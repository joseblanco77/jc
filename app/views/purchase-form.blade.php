<div class="row">
    <div class="col-lg-12">
        <div class="col-lg-6">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    Agregar producto
                </div>
                <div class="panel-body">

                    {{ Form::open(['url' => '/add-detail', 'method' => 'post']) }}

                        <div class="form-group">
                            {{ Form::label('product_id', 'Productos') }}
                            {{ Form::select('product_id', [''=>'Seleccione producto']+$data['products'],null,['required'=>'required', 'class'=>'form-control'])  }}
                            @if ($errors->has('product_id'))
                            <div class="alert alert-danger">{{ $errors->first('product_id') }}</div>
                            @endif
                        </div>

                        <div class="form-group">
                            {{ Form::label('price', 'Precio') }}
                            {{ Form::text('price', '0.00' , ['min'=>1,'required'=>'required', 'class'=>'form-control'])  }}
                            @if ($errors->has('price'))
                            <div class="alert alert-danger">{{ $errors->first('price') }}</div>
                            @endif
                        </div>

                        <div class="form-group">
                            {{ Form::label('quantity', 'Cantidad') }}
                            {{ Form::number('quantity', 1, ['min'=>1,'required'=>'required', 'class'=>'form-control'])  }}
                            @if ($errors->has('quantity'))
                            <div class="alert alert-danger">{{ $errors->first('quantity') }}</div>
                            @endif
                        </div>

                        @if(Auth::user()->usertype==1)
                        <div class="form-group">
                            {{ Form::label('user_id', 'Vendedor') }}
                            {{ Form::select('user_id', $data['users'], Auth::user()->id, ['class'=>'form-control']) }}
                        </div>
                        @else
                            {{ Form::hidden('user_id', Auth::user()->id)  }}
                        @endif

                        {{ Form::hidden('purchase_id', $data['purchase']->id)  }}

                        <div class="form-group">
                            {{ Form::submit('Agregar', ['class'=>'btn btn-success'])  }}
                        </div>
                    {{ Form::close() }}

                </div>
            </div>
        </div>
        <div class="col-lg-6">

            <div class="panel panel-primary">
                <div class="panel-heading">
                    Datos del cliente
                </div>
                <div class="panel-body">
                    <ul>
                        <li><strong>Nombre:</strong> {{ $data['purchase']->customer->customername }}</li>
                        <li><strong>Teléfonos:</strong> {{ $data['purchase']->customer->phone }}</li>
                        <li><strong>Dirección:</strong> {{ $data['purchase']->customer->address }}</li>
                        <li><strong>Email:</strong> {{ $data['purchase']->customer->email }}</li>
                        <li><strong>NIT:</strong> {{ $data['purchase']->customer->nit ? $data['purchase']->customer->nit : 'C/F' }}</li>
                    </ul>
                </div>
            </div>

            <div class="panel panel-primary">
                <div class="panel-heading">
                    Datos de la compra
                </div>
                <div class="panel-body">

                    {{ Form::open(['url' => '/edit-purchase/'.$data['purchase']->id, 'method' => 'post']) }}

                        <div class="form-group">
                            <?php
                                $invoiceOptions = ['id'=>'invoiceInput','required'=>'required', 'class'=>'form-control', 'disabled'=>'disabled'];
                            ?>
                            {{ Form::label('invoice', 'Número de factura') }}
                            {{ Form::text('invoice', $data['purchase']->invoice, $invoiceOptions)  }}
                            @if ($errors->has('invoice'))
                            <div class="alert alert-danger">{{ $errors->first('invoice') }}</div>
                            @endif
                        </div>

                        <div class="form-group">
                            <?php
                                $paymentMethods = [''=>'Seleccione','Efectivo'=>'Efectivo', 'Tarjeta'=>'Tarjeta', 'Cheque'=>'Cheque', 'Paquete'=>'Paquete', 'Crédito'=>'Crédito'];
                                $paymentOptions = ['id'=>'paymentSelect','required'=>'required', 'class'=>'form-control', 'disabled'=>'disabled'];
                            ?>
                            {{ Form::label('payment', 'Forma de pago') }}
                            {{ Form::select('payment', $paymentMethods, $data['purchase']->payment, $paymentOptions)  }}
                            @if ($errors->has('payment'))
                            <div class="alert alert-danger">{{ $errors->first('payment') }}</div>
                            @endif
                        </div>
                        <?php
                            $savePurchaseOptions = ['class'=>'btn btn-success', 'id'=>'savePurchase'];
                            $editPurchaseOptions = ['class'=>'btn btn-primary', 'id'=>'editPurchase', 'disabled'=>'disabled'];
                            if(isset($invoiceOptions['disabled']) || isset($paymentOptions['disabled'])) {
                                $savePurchaseOptions['disabled'] = 'disabled';
                                unset($editPurchaseOptions['disabled']);
                            }
                        ?>
                        {{ Form::submit('Guardar', $savePurchaseOptions) }}
                        {{ Form::button('Editar', $editPurchaseOptions) }}
                    {{ Form::close() }}

                </div>
            </div>

        </div>
    </div>
</div>

<script>
    var productPricesList = {{ json_encode($data['prices']) }};
</script>
{{ Form::close() }}


