<!DOCTYPE html>

<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>@yield('title')</title>
        @section('styles')
        {!! Html::style('css/HoldOn.min.css') !!}
        <link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet" />
        <link rel="stylesheet" href="{!! url('/css/adminlte.css') !!}">
        <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
        {!! Html::style('plugins/dark-tooltip/darktooltip.css') !!}
        <link rel="stylesheet" href="{!! url('/css/custom.css') !!}">
        {!! Html::style('plugins/fontawesome-free/css/all.min.css') !!}
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

        <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
        @show
    </head>
    <body class="hold-transition sidebar-mini">
        <div class="wrapper">
            <!-- Navbar -->
            @include('partials.header')
            @include('partials.aside-left')
            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <div class="content-header">
                    <div class="container-fluid">
                        <div class="row mb-2">
                            <div class="col-sm-6">
                                <h1 class="m-0 text-dark">@yield('main-title')</h1>
                            </div><!-- /.col -->
                            <div class="col-sm-6">
                                <ol class="breadcrumb float-sm-right">
                                    <li class="breadcrumb-item">
                                        <a href="{!! url('/') !!}">Accueil</a>
                                    </li>
                                    @yield('breadcrumb')
                                </ol>
                            </div><!-- /.col -->
                        </div><!-- /.row -->
                    </div><!-- /.container-fluid -->
                </div>
                <!-- /.content-header -->

                <!-- Main content -->
                <div class="content">
                    <div class="container-fluid">

                        @yield('content')

                    </div><!-- /.container-fluid -->
                </div>
                <!-- /.content -->
            </div>
            <!-- /.control-sidebar -->

            <!-- Main Footer -->
            <footer class="main-footer" style="background-color: f73f0d;">
                <!-- To the right -->
                <div class="float-right d-none d-sm-inline">

                </div>
                <!-- Default to the left -->
                <strong>Copyright &copy; 2020 <a href="https://esc-ouaga.com">Ecole Supérieure de Commerce</a>.</strong> Tous droits réservés.
            </footer>
        </div>
        @section('scripts')
        <script>var ajaxFormHandlerSuccessCallback = null;drawDataTableCallback=function(){}</script>
        {!! Html::script('plugins/jquery/jquery.min.js') !!}
        {!! Html::script('plugins/jquery-ui/jquery-ui.min.js') !!}
        {!! Html::script('plugins/bootstrap/js/bootstrap.bundle.min.js') !!}
        {!! Html::script('js/sweetalert2.all.min.js') !!}
        {!! Html::script('js/HoldOn.min.js') !!}
        {!! Html::script('js/deleteHandler.js') !!}
        {!! Html::script('js/ajaxFormHandler.js') !!}
        {!! Html::script('js/adminlte.min.js') !!}
        {!! Html::script('plugins/dark-tooltip/jquery.darktooltip.js') !!}
        <script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>
        <script src="https://cloud.tinymce.com/5/tinymce.min.js"></script>
        <script src="https://unpkg.com/ionicons@5.0.0/dist/ionicons.js"></script>

        <script>
            setInterval(function () {
                $('.data-tooltip').darkTooltip({animation: 'none', gravity: 'west', theme: 'dark'});
            }, 2000)
            $(document).ready(function() {
                $('.select2').select2({
                    language: "fr"
                });
            });
            //tinymce.init({selector: 'textarea'})
        </script>
        @show()
    </body>
</html>
