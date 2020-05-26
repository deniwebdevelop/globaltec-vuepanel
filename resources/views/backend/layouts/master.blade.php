<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>GT Panel</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- CSS Files -->
  <link rel="stylesheet" href="{{ asset('backend/plugins/fontawesome-free/css/all.min.css') }}">
  <link rel="stylesheet" href="{{ asset('https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css') }}">
  <link rel="stylesheet" href="{{ asset('backend/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('backend/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ asset('backend/plugins/jqvmap/jqvmap.min.css') }}">
  <link rel="stylesheet" href="{{ asset('backend/dist/css/adminlte.min.css') }}">
  <link rel="stylesheet" href="{{ asset('backend/dist/css/adminlte.css') }}">
  <link rel="stylesheet" href="{{ asset('backend/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
  <link rel="stylesheet" href="{{ asset('backend/plugins/daterangepicker/daterangepicker.css') }}">
  <link rel="stylesheet" href="{{ asset('backend/plugins/summernote/summernote-bs4.css') }}">
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('backend/plugins/datatables-bs4/css/dataTables.bootstrap4.css') }}">
  <link rel="stylesheet" href="{{ asset('css/toastr.min.css') }}">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
  <script src="{{ asset('backend/plugins/jquery/jquery.min.js') }}"></script>
  <script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js"></script>
  <link rel="stylesheet" href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css">
  <link rel="stylesheet" href="{{ asset('backend/plugins/select2/css/select2.min.css') }}">
  <link rel="stylesheet" href="{{ asset('backend/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
</head>

<body class="hold-transition sidebar-mini layout-fixed font-weight-lighter">
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-light navbar-white text-dark border-transparent">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link text-dark" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link text-dark" data-toggle="dropdown" href="#">
          <span>{{ Auth::user()->name }}</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <div class="dropdown-divider"></div>
          <a href="{{ route('profiles.view') }}" class="dropdown-item dropdown-footer">Mi Perfil</a>
          <a href="{{ route('profiles.password.view') }}" class="dropdown-item dropdown-footer">Cambiar Contraseña</a>
          <a href="{{ route('logout') }}"onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
          class="dropdown-item dropdown-footer">Salir</a>
          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-collapse layout-fixed" style="background-image: linear-gradient(200deg, rgba(9, 9, 59, 0.836)40%, rgba(8, 8, 61, 0.822) 70%);">
    <!-- Brand Logo -->
    <a href="{{ route('home') }}" class="brand-link text-center" style="border-bottom:1px solid white">
      <h2 class="brand-text text-white" style="font-family: 'Satisfy', cursive; font-size: 40px">Gtt</h2>
    </a>

    <!-- Sidebar -->
    <div class="sidebar mt-4">

    @include('backend.layouts.sidebar')
    </div>
    <!-- /.sidebar -->
  </aside> 
@yield('content')
  <footer class="main-footer border-top-0  font-weight-lighter" style="background-color: #fff;">
    <strong>Copyright &copy; 2020 <a target="_blank" class="text-green" href="http://www.globaltectrade.com.ar">Global Tec Trade</a></strong>
    <div class="float-right d-none d-sm-inline-block font-weight-lighter">
      <b>Designed & Developed by</b> <b class="text-green"> Deni</b>
    </div>
  </footer>
</div>
<!-- ./wrapper -->

<!-- Scripts -->
<script src="{{ asset('backend/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
<script>
$.widget.bridge('uibutton', $.ui.button)
</script>
<script src="{{ asset('backend/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('backend/plugins/chart.js/Chart.min.js') }}"></script>
<script src="{{ asset('backend/plugins/sparklines/sparkline.js') }}"></script>
<script src="{{ asset('backend/plugins/jqvmap/jquery.vmap.min.js') }}"></script>
<script src="{{ asset('backend/plugins/jquery-knob/jquery.knob.min.js') }}"></script>
<script src="{{ asset('backend/plugins/moment/moment.min.js') }}"></script>
<script src="{{ asset('backend/plugins/daterangepicker/daterangepicker.js') }}"></script>
<script src="{{ asset('backend/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
<script src="{{ asset('backend/plugins/summernote/summernote-bs4.min.js') }}"></script>
<script src="{{ asset('backend/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
<script src="{{ asset('backend/dist/js/adminlte.js') }}"></script>
<script src="{{ asset('backend/dist/js/pages/dashboard.js') }}"></script>
<script src="{{ asset('backend/dist/js/demo.js') }}"></script>
<script src="{{ asset('backend/plugins/datatables/jquery.dataTables.js') }}"></script>
<script src="{{ asset('backend/plugins/datatables-bs4/js/dataTables.bootstrap4.js') }}"></script>
<script src="{{asset('backend/plugins/jquery-validation/jquery.validate.min.js')}}"></script>
<script src="{{asset('backend/plugins/jquery-validation/additional-methods.min.js')}}"></script>
<script src="{{ asset('backend/dist/js/handlebars.min.js') }}"></script>
<script src="{{ asset('js/toastr.min.js') }}"></script>
<script src="{{ asset('backend/plugins/select2/js/select2.full.min.js') }}"></script>
<script>
  $(function () {
    $("#example1").DataTable();
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
    });
  });
</script>
<!-- Delete Sweet Alert -->
<script>
  $(function(){
    $(document).on('click','#delete',function(e){
    e.preventDefault();
    var link = $(this).attr("href");
    Swal.fire({
      title: 'Seguro?',
      text: "Se eliminara para siempre!",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Si, eliminar!'
    }).then((result) => {
      if (result.value) {
        window.location.href = link; 
        Swal.fire(
          'Listo!',
          'El registro se elimino correctamente.',
          'success'
        )
      }
    })
  });
});
</script>
<!-- Approval Sweet Alert -->
<script type="text/javascript">
$(function(){
  $(document).on('click','#approve',function(e){
    e.preventDefault();
    var link - $(this).attr("href");
    Swal.fire({
      title: 'Estas seguro?',
      text: "Aprobar",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Si, aprobar'
    }).then(result) => {
      if (result.value) {
        window.location.href = link;
        Swal.fire(
          'Aprobado',
          'Operacion aprobada'
        )
      }
    })
  });
});
</script>

<!--Image -->
<script type="text/javascript"> 
$(document).ready(function(){
  $('#image').change(function(e){
    var reader = new FileReader();
    reader.onload = function(e){
      $('#showImage').attr('src',e.target.result);
    }
    reader.readAsDataURL(e.target.files['0']);
  });
});
</script>
<!--Select 2 -->
<script>
$(function(){
  $('.select2').select2();
})
</script>

@if(Session::has('success'))
<script>
toastr.success('Success')
</script> 
@endif

@if(Session::has('error'))
<script>
toastr.error('Error')
</script>
@endif
</body>
</html>
