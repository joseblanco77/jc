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
                            {{ Form::label('product_id', 'Productos') }}</dt>
                            {{ Form::select('product_id', [''=>'Seleccione producto']+$data['products'],null,['required'=>'required', 'class'=>'form-control'])  }}
                            @if ($errors->has('customername'))
                            <div class="alert alert-danger">{{ $errors->first('customername') }}</div>
                            @endif
                        </div>

                        <div class="form-group">
                            {{ Form::label('price', 'Cantidad') }}</dt>
                            {{ Form::text('price', '0.00' , ['min'=>1,'required'=>'required', 'class'=>'form-control'])  }}
                            @if ($errors->has('customername'))
                            <div class="alert alert-danger">{{ $errors->first('customername') }}</div>
                            @endif
                        </div>

                        <div class="form-group">
                            {{ Form::label('quantity', 'Cantidad') }}</dt>
                            {{ Form::number('quantity', 1, ['min'=>1,'required'=>'required', 'class'=>'form-control'])  }}
                            @if ($errors->has('customername'))
                            <div class="alert alert-danger">{{ $errors->first('customername') }}</div>
                            @endif
                        </div>


                        <div class="form-group">
                            {{ Form::submit('Agregar', ['class'=>'btn btn-success'])  }}
                        </div>

                    {{ Form::hidden('purchase_id', $data['purchase']->id)  }}

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
        </div>
    </div>
</div>

<script>
    var productPricesList = {{ json_encode($data['prices']) }};
</script>
{{ Form::close() }}


