<!DOCTYPE html>
  <html lang="en" data-layout-mode="detached" data-topbar-color="light" data-menu-color="light" data-sidenav-user="true">
    <head>
        <meta charset="utf-8" />
        <title>LOGBOOK ADMIN PANEL</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
        <meta content="Coderthemes" name="author" />


        <!-- App favicon -->
        <link rel="shortcut icon" href="{{asset('assets/images/favicon.png')}}">

        <!-- Daterangepicker css -->
        <link rel="stylesheet" href="{{asset('assets/vendor/daterangepicker/daterangepicker.css')}}">

        <!-- Vector Map css -->
        <link rel="stylesheet" href="{{asset('assets/vendor/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.css')}}">

        <!-- Theme Config Js -->
        <script src="{{asset('assets/js/hyper-config.js')}}"></script>

        <!-- App css -->
        <link href="{{asset('assets/css/app-modern.min.css')}}" rel="stylesheet" type="text/css" id="app-style" />

        <!-- Icons css -->
        <link href="{{asset('assets/css/icons.min.css')}}" rel="stylesheet" type="text/css" />

        <!--START DATA TABLES-->
        <link href="{{asset('assets/vendor/datatables.net-bs5/css/dataTables.bootstrap5.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('assets/vendor/datatables.net-responsive-bs5/css/responsive.bootstrap5.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('assets/vendor/datatables.net-fixedcolumns-bs5/css/fixedColumns.bootstrap5.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('assets/vendor/datatables.net-fixedheader-bs5/css/fixedHeader.bootstrap5.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('assets/vendor/datatables.net-buttons-bs5/css/buttons.bootstrap5.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('assets/vendor/datatables.net-select-bs5/css/select.bootstrap5.min.css')}}" rel="stylesheet" type="text/css" />
        <!--END DATA TABLES-->
    </head>

    <body>
      <div class="wrapper">

            
        @include('layouts.topbar')

        @include('layouts.sidebar')
            

        <!-- Start Page Content here -->
        @yield('content')
        <!-- End Page content -->

      </div>

      @include('layouts.settingtheme')
        

      <!-- Vendor js -->
      <script src="{{asset('assets/js/vendor.min.js')}}"></script>

      <!-- Daterangepicker js -->
      <script src="{{asset('assets/vendor/daterangepicker/moment.min.js')}}"></script>
      <script src="{{asset('assets/vendor/daterangepicker/daterangepicker.js')}}"></script>

      <!-- Apex Charts js -->
      <script src="{{asset('assets/vendor/apexcharts/apexcharts.min.js')}}"></script>

      <!-- Vector Map js -->
      <script src="{{asset('assets/vendor/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.min.js')}}"></script>
      <script src="{{asset('assets/vendor/admin-resources/jquery.vectormap/maps/jquery-jvectormap-world-mill-en.js')}}"></script>

      <!-- Dashboard App js -->
      <script src="{{asset('assets/js/pages/demo.dashboard.js')}}"></script>

      <!-- App js -->
      <script src="{{asset('assets/js/app.min.js')}}"></script>

      <!--Start Datatables js -->
      <script src="{{asset('assets/vendor/datatables.net/js/jquery.dataTables.min.js')}}"></script>
      <script src="{{asset('assets/vendor/datatables.net-bs5/js/dataTables.bootstrap5.min.js')}}"></script>
      <script src="{{asset('assets/vendor/datatables.net-responsive/js/dataTables.responsive.min.js')}}"></script>
      <script src="{{asset('assets/vendor/datatables.net-responsive-bs5/js/responsive.bootstrap5.min.js')}}"></script>
      <script src="{{asset('assets/vendor/datatables.net-fixedcolumns-bs5/js/fixedColumns.bootstrap5.min.js')}}"></script>
      <script src="{{asset('assets/vendor/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js')}}"></script>
      <script src="{{asset('assets/vendor/datatables.net-buttons/js/dataTables.buttons.min.js')}}"></script>
      <script src="{{asset('assets/vendor/datatables.net-buttons-bs5/js/buttons.bootstrap5.min.js')}}"></script>
      <script src="{{asset('assets/vendor/datatables.net-buttons/js/buttons.html5.min.js')}}"></script>
      <script src="{{asset('assets/vendor/datatables.net-buttons/js/buttons.flash.min.js')}}"></script>
      <script src="{{asset('assets/vendor/datatables.net-buttons/js/buttons.print.min.js')}}"></script>
      <script src="{{asset('assets/vendor/datatables.net-keytable/js/dataTables.keyTable.min.js')}}"></script>
      <script src="{{asset('assets/vendor/datatables.net-select/js/dataTables.select.min.js')}}"></script>

      <script src="{{asset('assets/js/pages/demo.datatable-init.js')}}"></script>

      <!--End Datatables js -->

    </body>
</html>