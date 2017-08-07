<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <base href="{{ URL::to('/') }}">

    <title>Sistema de Control MW Salon</title>

    <!-- Bootstrap Core CSS -->
    <link href="packages/sbadmin2/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="packages/sbadmin2/vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="packages/sbadmin2/dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- CSS Culero -->
    <link href="css/style.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="packages/sbadmin2/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    @yield('headlinks')

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body class="logged">

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="/">
                    Sistema de control
                    @if(Auth::user()->usertype==1)
                    - Administrador
                    @else
                    - Vendedor
                    @endif
                </a>
            </div>
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li>
                            <a><i class="fa fa-user fa-fw"></i> {{ Auth::user()->realname; }}</a>
                        </li>
                        <li>
                            <a href="/"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                        </li>
                        <li>
                            <a href="products"><i class="fa fa-shopping-cart fa-fw"></i> Productos</a>
                        </li>
                        <li>
                            <a href="customers"><i class="fa fa-dashboard fa-fw"></i> Clientes</a>
                        </li>
                        @if(Auth::user()->usertype==1)
                        <li>
                            <a href="reports"><i class="fa fa-dashboard fa-fw"></i> Reportes</a>
                        </li>
                        @endif
                        <li>
                            <a href="/logout"><i class="fa fa-sign-out fa-fw"></i> Salir</a>
                        </li>
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>

        <div id="page-wrapper">
            <div class="row">

                <div class="col-lg-12">

                    @yield('content')

                </div>
                <!-- /.col-lg-12 -->
            </div>
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="packages/sbadmin2/vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="packages/sbadmin2/vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="packages/sbadmin2/vendor/metisMenu/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="packages/sbadmin2/dist/js/sb-admin-2.js"></script>

    @yield('footscripts')

    <!-- JavaScript culero -->
    <script type="text/javascript" src="{{ URL::asset('js/functions.js') }}"></script>

</body>

</html>
