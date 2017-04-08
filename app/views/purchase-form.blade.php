<h3>Agregar producto a la compra</h3>

{{ Form::open(['url' => '/add-detail', 'method' => 'post']) }}
<dl>
    <dt>{{ Form::label('product_id', 'Productos') }}</dt>
    <dd>
        {{ Form::select('product_id', [''=>'Seleccione producto']+$data['products'],null,['required'=>'required'])  }}
        <span class="error">{{ $errors->details->first('product_id') }}</span>
    </dd>
    <dt>{{ Form::label('price', 'Cantidad') }}</dt>
    <dd>
        {{ Form::text('price', '0.00' , ['min'=>1,'required'=>'required']) }}
        <span class="error">{{ $errors->details->first('price') }}</span>
    </dd>
    <dt>{{ Form::label('quantity', 'Cantidad') }}</dt>
    <dd>
        {{ Form::number('quantity', 1, ['min'=>1,'required'=>'required']) }}
        <span class="error">{{ $errors->details->first('quantity') }}</span>
    </dd>
</dl>
<dt>* datos requeridos</dt>
<dd>
    {{ Form::submit('Agregar') }}
</dd>
{{ Form::hidden('purchase_id', $data['purchase']->id)  }}
<script>
    var productPricesList = {{ json_encode($data['prices']) }};
</script>
{{ Form::close() }}


