<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="Digital Serra Tecnologia Digital">
    <title>Administração</title>
    <!-- Bootstrap Core CSS -->
    <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="{{ Module::asset('admin:css/plugins/morris.css') }}" rel="stylesheet">

    <!-- Sweetalert CSS -->
    <link href="{{ asset('css/sweetalert.css') }}" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="{{ asset('css/font-awesome.css') }}" rel="stylesheet" type="text/css">

    <!-- Custom CSS -->
    <link href="{{ Module::asset('admin:css/sb-admin.css') }}" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
<body>
<div id="wrapper">

    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{{ route('admin.index') }}">{{ $app['name'].' '.$app['version'] }}</a>
        </div>
        <!-- Top Menu Items -->
        <ul class="nav navbar-right top-nav">
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> {{ $user }} <b
                            class="caret"></b></a>
                <ul class="dropdown-menu">
                    <li>
                        <a href="{{ route('home.index') }}"><i class="fa fa-home"></i> Voltar ao site</a>
                    </li>
                    <li class="divider"></li>
                    <li>
                        <a href="{{ route('auth.logout') }}"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                    </li>
                </ul>
            </li>
        </ul>
        <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
        <div class="collapse navbar-collapse navbar-ex1-collapse">
            <ul class="nav navbar-nav side-nav">
                <li class="active">
                    <a href="{{ route('admin.index') }}"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
                </li>
                <li>
                    <a href="javascript:;" data-toggle="collapse" data-target="#ofertas"><i
                                class="fa fa-fw fa-gift"></i> Ofertas <i class="fa fa-fw fa-caret-down"></i></a>
                    <ul id="ofertas" class="collapse">
                        <li>
                            <a href="{{ route('offer.index') }}"><i class="fa fa-fw fa-eye"></i> Ver ofertas</a>
                        </li>
                        <li>
                            <a href="{{ route('offer.add') }}"><i class="fa fa-fw fa-plus"></i> Nova oferta</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="javascript:;" data-toggle="collapse" data-target="#galeria"><i
                                class="fa fa-fw fa-photo"></i> Projetos <i class="fa fa-fw fa-caret-down"></i></a>
                    <ul id="galeria" class="collapse">
                        <li>
                            <a href="{{ route('gallery.index') }}"><i class="fa fa-fw fa-eye"></i> Ver Projetos</a>
                        </li>
                        <li>
                            <a href="{{ route('gallery.add') }}"><i class="fa fa-fw fa-plus"></i> Novo Projeto</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </nav>

    <div id="page-wrapper">

        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">
                        Dashboard
                        <small>{{ $page_name }}</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li class="active">
                            <i class="fa fa-dashboard"></i> Dashboard <small>{{ ' / '.$page_name }}</small>
                        </li>
                    </ol>
                </div>
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-gift fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">{{ $offers->count() }}</div>
                                    <div>Ofertas</div>
                                </div>
                            </div>
                        </div>
                        <a href="{{ route('offer.index') }}">
                            <div class="panel-footer">
                                <span class="pull-left">Veja</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>

                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="panel panel-green">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-photo fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">{{ $projects->count() }}</div>
                                    <div>Projetos</div>
                                </div>
                            </div>
                        </div>
                        <a href="{{ route('gallery.index') }}">
                            <div class="panel-footer">
                                <span class="pull-left">Veja</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>

                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <!-- /.row -->

            <div class="row">
                <div class="col-lg-12">
                    @if(Session::has('success'))
                        <p class="alert alert-success">
                            <a href="#" class="close" data-dismiss="alert"
                               aria-label="close">&times;</a>
                            {{ Session::get('success') }}
                        </p>
                    @endif
                    @unless($errors->isEmpty())
                        <ul style="list-style: none;">
                            @foreach($errors->getMessages() as $error)
                                <li>
                                    <p class="alert alert-danger">
                                        <a href="#" class="close" data-dismiss="alert"
                                           aria-label="close">&times;</a>
                                        {{ $error[0] }}
                                    </p>
                                </li>
                            @endforeach
                        </ul>
                    @endunless
                    @foreach (Alert::getMessages() as $type => $messages)
                        @foreach ($messages as $message)
                            <div class="alert alert-{{ ($type == 'error' ? 'danger' : $type) }}">
                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                {{ $message }}
                            </div>
                        @endforeach
                    @endforeach
                </div>
            </div>
            <!-- /.row -->

            @yield('content')


        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->
</body>
<!-- jQuery -->
<script src="{{ asset('js/jquery.min.js') }}"></script>

<!-- Bootstrap Core JavaScript -->
<script src="{{ asset('js/bootstrap.min.js') }}"></script>

<script src="{{ asset('js/sweetalert.min.js') }}"></script>

<!-- Morris Charts JavaScript -->
<script src="{{ Module::asset('admin:js/plugins/morris/raphael.min.js') }}"></script>
<script src="{{ Module::asset('admin:js/plugins/morris/morris.min.js') }}"></script>
<script src="{{ Module::asset('admin:js/plugins/morris/morris-data.js') }}"></script>

<script>
    function click_del(url) {
        swal({
                    title: "Aviso",
                    text: "Tem certeza?",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "Sim, tenho!",
                    cancelButtonText: "Cancelar",
                    closeOnConfirm: false
                },
                function(){
                    window.location.href = url;
                });
    }
</script>

</html>