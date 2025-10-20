<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>{{ \Info::nama() }}</title>

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ url('admlte/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bbootstrap 4 -->
    <link rel="stylesheet"
        href="{{ url('admlte/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">

    <!-- DataTables -->
    <link rel="stylesheet" href="{{ url('admlte/plugins/datatables-bs4/css/dataTables.bootstrap4.css') }}">

    <!-- summernote -->
    <link rel="stylesheet" href="{{ url('admlte/plugins/summernote/summernote-bs4.css') }}">

    <!-- iCheck -->
    <link rel="stylesheet" href="{{ url('admlte/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
    <!-- JQVMap -->
    <link rel="stylesheet" href="{{ url('admlte/plugins/jqvmap/jqvmap.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ url('admlte/dist/css/adminlte.min.css') }}">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{ url('admlte/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="{{ url('admlte/plugins/daterangepicker/daterangepicker.css') }}">
    <!-- summernote -->
    <link rel="stylesheet" href="{{ url('admlte/plugins/summernote/summernote-bs4.css') }}">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

    <!-- Select2 -->
    <link rel="stylesheet" href="{{ url('admlte/plugins/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ url('admlte/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">

    <style type="text/css">
        /* .grad {
            background-image: linear-gradient(90deg, #e92275, white);
            color: white;
        } */
    </style>

    <!-- jQuery -->
    <script src="{{ url('admlte/plugins/jquery/jquery.min.js') }}"></script>
  

</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
                </li>

            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <!-- Navbar Search -->
                @include('adm.layouts.menuatas')
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4" xstyle="background: #00695C">
            <!-- Brand Logo -->
            <a href="#" class="brand-link">
                <span class="brand-text font-weight-light">
                    {{ \Info::nama() }}
                </span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar" xstyle="background: #00695C">

                <!-- Sidebar Menu -->
                @include('adm.layouts.menu')
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        <!-- /.content-wrapper -->
        @yield('content')



        <footer class="main-footer">
            <strong> {{ \Info::nama() }} &copy; <?php echo date('Y'); ?></strong>
        </footer>

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->


    <!-- jQuery UI 1.11.4 -->
    <script src="{{ url('admlte/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
        $.widget.bridge('uibutton', $.ui.button)
    </script>
    <!-- Bootstrap 4 -->
    <script src="{{ url('admlte/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>


    <!-- overlayScrollbars -->
    <script src="{{ url('admlte/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>


    <script src="{{ url('admlte/plugins/datatables/jquery.dataTables.js') }}"></script>
    <script src="{{ url('admlte/plugins/datatables-bs4/js/dataTables.bootstrap4.js') }}"></script>

    <!-- AdminLTE App -->
    <script src="{{ url('admlte/dist/js/adminlte.js') }}"></script>

    <!-- AdminLTE for demo purposes -->
    <script src="{{ url('admlte/dist/js/demo.js') }}"></script>

    <script src="{{ url('admlte/plugins/summernote/summernote-bs4.min.js') }}"></script>

    <!-- Select2 -->
    <script src="{{ url('admlte/plugins/select2/js/select2.full.min.js') }}"></script>

    <script>
        $(function() {
            $("#example1").DataTable();
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false,
            });

            $(".tabledata").DataTable();

            //Initialize Select2 Elements
            $('.select2').select2()

            //Initialize Select2 Elements
            $('.select2bs4').select2({
                theme: 'bootstrap4'
            })
            $('.textarea').summernote()
        });
    </script>
</body>

</html>
