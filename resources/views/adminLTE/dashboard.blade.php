
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"
{{--[--}}
{{--  <!ATTLIST tag math CDATA #IMPLIED>--}}
{{--]--}}
>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" xmlns="http://www.w3.org/1999/html">
<head>
        <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{asset('plugins/fontawesome-free/css/all.min.css')}}">
    <link rel="stylesheet" href="{{asset('plugins/sortowanie/style.css')}}">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{asset('plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
    <!-- Theme style -->
{{--    <link rel="stylesheet" href="dist/css/adminlte.min.css">--}}
    <link rel="stylesheet" href="{{asset('dist/css/adminlte.css')}}">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

</head>
<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
<div class="wrapper">
    <!-- Navbar -->
    @include('layouts.navbar')
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    @include('layouts.sidebar')


    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <h1 class="m-0 text-dark" align="center">Witaj na platformie EDU</h1>
{{--                <div class="row mb-2">--}}
{{--                    <div class="col-sm-6">--}}


{{--                    </div><!-- /.col -->--}}
{{--                    <div class="col-sm-6">--}}
{{--                        <ol class="breadcrumb float-sm-right">--}}
{{--                            @if (\Request::is('/'))--}}
{{--                                <li class="breadcrumb-item"><a href="/">Home</a></li>--}}
{{--                            @else--}}

{{--                            <li class="breadcrumb-item"><a href="/">Home</a></li>--}}
{{--                            <li class="breadcrumb-item active"><i>{{\Request::path(' / ')}}</i></li>--}}
{{--                                @endif--}}
{{--                        </ol>--}}
{{--                    </div><!-- /.col -->--}}
{{--                </div><!-- /.row -->--}}
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->
        <!-- Main content -->
        @section('content')
    @include('layouts.maincontent')

             @include('layouts.mainrow');
    <!-- /.control-sidebar -->

    <!-- Main Footer -->
    @endsection
    @yield('content')

@include('layouts.footer')
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<script src={{asset('plugins/jquery/jquery.min.js')}}></script>
<!-- Bootstrap -->
<script src={{asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}></script>
<!-- overlayScrollbars -->
<script src={{asset('plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}></script>
<!-- AdminLTE App -->
<script src={{asset('dist/js/adminlte.js')}}></script>

<!-- OPTIONAL SCRIPTS -->
<script src={{asset('dist/js/demo.js')}}></script>


<!-- PAGE PLUGINS -->
<!-- jQuery Mapael -->
<script src={{asset('plugins/jquery-mousewheel/jquery.mousewheel.js')}}></script>
<script src={{asset('plugins/raphael/raphael.min.js')}}></script>
<script src={{asset('plugins/jquery-mapael/jquery.mapael.min.js')}}></script>
<script src={{asset('plugins/jquery-mapael/maps/usa_states.min.js')}}></script>
<!-- ChartJS -->
<script src={{asset('plugins/chart.js/Chart.min.js')}}></script>

<!-- PAGE SCRIPTS -->
<script src={{asset('dist/js/pages/dashboard2.js')}}></script>
</body>
</html>
