<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Full house</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet"
    href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="{{ asset('/admin/plugins/fontawesome-free/css/all.min.css') }}">
  <!-- IonIcons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- DataTable -->
  @yield('myCss')

  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('/admin/dist/css/adminlte.min.css') }}">

</head>
<!--
`body` tag options:

  Apply one or more of the following classes to to the body tag
  to get the desired effect

  * sidebar-collapse
  * sidebar-mini
-->

<body class="hold-transition sidebar-mini">
<!-- <body class="hold-transition sidebar-collapse"> -->
  <div class="wrapper">
    <!-- Navbar -->
    @include('admin.layout.partials.header')
    <!-- /.navbar -->
    
    <!-- Main Sidebar Container -->
    @include('admin.layout.partials.sidebar')
    <!-- Main Sidebar Container -->
    
    
    <!-- Content Wrapper. Contains page content -->
    @yield('content')
    
    <!-- /.content-wrapper -->
    
    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
      <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
    
    <!-- Main Footer -->
    @include('admin.layout.partials.footer')
    
  </div>
  <!-- ./wrapper -->

  <!-- REQUIRED SCRIPTS -->

  <!-- jQuery -->
  <script src="{{ asset('/admin/plugins/jquery/jquery.min.js') }}"></script>
  <!-- Bootstrap -->
  <script src="{{ asset('/admin/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <!-- DataTable & Plugins -->
  @yield('myJS01')
  
  <!-- AdminLTE -->
  <script src="{{ asset('/admin/dist/js/adminlte.js') }}"></script>
  
  <!-- OPTIONAL SCRIPTS -->
  <script src="{{ asset('/admin/plugins/chart.js/Chart.min.js') }}"></script>
  <!-- AdminLTE for demo purposes -->
  <!-- <script src="{{ asset('/admin/dist/js/demo.js') }}"></script> -->
  <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
  <script src="{{ asset('/admin/dist/js/pages/dashboard3.js') }}"></script>
  @yield('myJS02')
</body>

</html>