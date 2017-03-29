<h3>Agregar cliente</h3>
{{ Form::open(['url' => '/add-customer', 'method' => 'post']) }}
<dl>
    <dt>{{ Form::label('customername', 'Nombre del cliente') }}</dt>
    <dd>
        {{ Form::text('customername', Input::old('customername'))  }}
        <span class="error">{{ $errors->customers->first('customername') }}</span>
    </dd>
    <dt>{{ Form::label('phone', 'Teléfonos') }}</dt>
    <dd>
        {{ Form::text('phone', Input::old('phone'))  }}
        <span class="error">{{ $errors->customers->first('phone') }}</span>
    </dd>
    <dt>{{ Form::label('address', 'Dirección') }}</dt>
    <dd>
        {{ Form::text('address', Input::old('address'))  }}
        <span class="error">{{ $errors->customers->first('address') }}</span>
    </dd>
    <dt>{{ Form::label('email', 'E-mail') }}</dt>
    <dd>
        {{ Form::text('email', Input::old('email'))  }}
        <span class="error">{{ $errors->customers->first('email') }}</span>
    </dd>
    <dt>{{ Form::label('nit', 'NIT') }}</dt>
    <dd>
        {{ Form::text('nit', Input::old('nit'))  }}
        <span class="error">{{ $errors->customers->first('NIT') }}</span>
    </dd>
    <dt>{{ Form::label('comments', 'Comentarios') }}</dt>
    <dd>
        {{ Form::textarea('comments', Input::old('comments'))  }}
        <span class="error">{{ $errors->customers->first('comments') }}</span>
    </dd>
    <dt></dt>
    <dd>{{ Form::submit('Guardar &#x2714;')  }}</dd>
</dl>
{{ Form::close() }}