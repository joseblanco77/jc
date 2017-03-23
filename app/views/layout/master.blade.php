<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="icon" href="favicon.ico" sizes="any">
    <title>Sistemita culero</title>
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/style.css') }}">
</head>
<body>
    <h1>{{ link_to('/dashboard','Sistemita culero') }}</h1>
    @section('logout')
    @show


    @yield('content')

    <script type="text/javascript" src="{{ URL::asset('js/functions.js') }}"></script>
</body>
</html>
