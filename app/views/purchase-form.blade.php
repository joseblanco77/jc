<h3>Agregar producto a la compra</h3>

{{ Form::open(['url' => '/add-detail', 'method' => 'post']) }}
<dl>
    <dt>{{ Form::label('productname', 'Productos') }}</dt>
    <dd>
        {{ Form::select('productname', $data['products'])  }}
        <span class="error">{{ $errors->details->first('customername') }}</span>
        {{ Form::hidden('price', 0)  }}
    </dd>
</dl>
<script>
    var productPricesList = {{ json_encode($data['prices']) }};
</script>
{{ Form::close() }}


