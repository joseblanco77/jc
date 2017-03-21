<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Login</title>
</head>
<body>
	<h1>Sistemita culero</h1>
	{{ Form::open(['url' => 'login', 'method' => 'post']) }}
	<dl>
		<dt>{{ Form::label('email', 'Correo electrónico') }}</dt>
		<dd>{{ Form::email('username', null, ['placeholder' => 'username@domain.com'])  }}</dd>
		<dt>{{ Form::label('password', 'Contraseña') }}</dt>
		<dd>{{ Form::password('password')  }}</dd>
		<dt></dt>
		<dd>{{ Form::submit('Ingresar')  }}</dd>
	</dl>
	{{ Form::close() }}

	@if( Session::get('loginfail') )
		<p style="color:#f00">Login failed</p>
	@endif
</body>
</html>
