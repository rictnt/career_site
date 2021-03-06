<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>CENTURY 21 Scheetz</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- Bootstrap 3.3.2 -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- FontAwesome 4.3.0 -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Ionicons 2.0.0 -->
    <link href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" rel="stylesheet" type="text/css" />
    <!-- Theme style -->
    <link href="{{asset('adminlte/css/AdminLTE.css')}}" rel="stylesheet" type="text/css" />
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link href="{{asset('adminlte/css/skins/_all-skins.css')}}" rel="stylesheet" type="text/css" />
    <!-- iCheck -->
    <link href="{{asset('adminlte/plugins/iCheck/all.css')}}" rel="stylesheet" type="text/css" />

    <!-- jvectormap -->
    <link href="{{asset('adminlte/plugins/jvectormap/jquery-jvectormap-1.2.2.css')}}" rel="stylesheet" type="text/css" />
    <!-- Date Picker -->
    <link href="{{asset('adminlte/plugins/datepicker/datepicker3.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('adminlte/plugins/daterangepicker/daterangepicker-bs3.css')}}" rel="stylesheet" type="text/css" />
    <!-- Daterange picker -->
    <link href="{{asset('adminlte/plugins/daterangepicker/daterangepicker-bs3.css')}}" rel="stylesheet" type="text/css" />
    <!-- bootstrap wysihtml5 - text editor -->
    <link href="{{asset('adminlte/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('adminlte/css/custom.css')}}" rel="stylesheet" type="text/css" />
    @yield('header-section')
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
</head>
<body class="skin-yellow">
<div class="wrapper">

    @include('admin.parts.header')
    <!-- Left side column. contains the logo and sidebar -->
    <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        @include('admin.parts.sidebar')
        <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                @yield('page_title')
            </h1>
        </section>

        <!-- Main content -->
        <section class="content">
            @include('flash::message')
            @yield('content')

        </section><!-- /.content -->
    </div><!-- /.content-wrapper -->
    @include('admin.parts.footer')

</div><!-- ./wrapper -->

<!-- jQuery 2.1.3 -->
<script src="{{asset('adminlte/plugins/jQuery/jQuery-2.1.3.min.js')}}"></script>
<!-- jQuery UI 1.11.2 -->
<script src="http://code.jquery.com/ui/1.11.2/jquery-ui.min.js" type="text/javascript"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.2 JS -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js" type="text/javascript"></script>

<!-- Sparkline -->
<script src="{{asset('adminlte/plugins/sparkline/jquery.sparkline.min.js')}}" type="text/javascript"></script>
<!-- jvectormap -->
<script src="{{asset('adminlte/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js')}}" type="text/javascript"></script>
<script src="{{asset('adminlte/plugins/jvectormap/jquery-jvectormap-world-mill-en.js')}}" type="text/javascript"></script>
<!-- jQuery Knob Chart -->
<script src="{{asset('adminlte/plugins/knob/jquery.knob.js')}}" type="text/javascript"></script>
<!-- daterangepicker -->
{{--<script src="{{asset('adminlte/plugins/daterangepicker/daterangepicker.js')}}" type="text/javascript"></script>--}}
<!-- datepicker -->
<script src="{{asset('adminlte/plugins/datepicker/bootstrap-datepicker.js')}}" type="text/javascript"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="{{asset('adminlte/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js')}}" type="text/javascript"></script>
<!-- iCheck -->
<script src="{{asset('adminlte/plugins/iCheck/icheck.min.js')}}" type="text/javascript"></script>
<!-- Slimscroll -->
<script src="{{asset('adminlte/plugins/slimScroll/jquery.slimscroll.min.js')}}" type="text/javascript"></script>
<script src="{{asset('adminlte/plugins/iCheck/icheck.min.js')}}" type="text/javascript"></script>
<!-- FastClick -->
<script src='{{asset('adminlte/plugins/fastclick/fastclick.min.js')}}'></script>
<script src="{{asset('adminlte/js/moment.min.js')}}" type="text/javascript"></script>
<script src="{{asset('adminlte/js/bootstrap-datetimepicker.js')}}" type="text/javascript"></script>
<!-- AdminLTE App -->
<script src="{{asset('adminlte/js/app.min.js')}}" type="text/javascript"></script>

<script src="{{asset('adminlte/js/pages/dashboard.js')}}" type="text/javascript"></script>
{{-- Custom csss--}}
<script src="{{asset('adminlte/js/custom.js')}}" type="text/javascript"></script>
@yield('footer-content')
@yield('models')
<script>
    $(document).ready(function(){
        $('#datetimepicker1').datetimepicker({
            format: 'YYYY-MM-DD HH:mm:ss'
        });
        Custom.init();
        @yield('init')
    });
</script>

</body>
</html>
