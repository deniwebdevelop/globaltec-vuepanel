<!DOCTYPE html>
<html>
<head>
@include('backend.layouts.head')
</head>
<body class="hold-transition sidebar-mini sidebar-collapse">
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand border-0 navbar-white text-dark">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link text-dark" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
 
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link text-dark" data-toggle="dropdown" href="#">
          <span>{{ Auth::user()->name }}</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <div class="dropdown-divider"></div>
          <a href="{{ route('users.view') }}" class="dropdown-item dropdown-footer">Usuarios</a>
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
  <aside class="main-sidebar" style="background-image: linear-gradient(200deg, #fff 100%, rgba(59, 35, 167, 0.856)100%);">
    <!-- Brand Logo -->
    <a href="{{ route('home') }}" class="brand-link text-center">
      <h3 class="brand-text" style="color:#0c0847ea; font-weight:lighter; font-size:1.5vm;">GTT</h3>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">

    @include('backend.layouts.sidebar')
    </div>
    <!-- /.sidebar -->
  </aside> 
@yield('content')</div>
<!-- ./wrapper -->

<!-- Scripts -->
<script src="{{ asset('backend/plugins/jquery/jquery.min.js') }}"></script>
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
      confirmButtonColor: '#070525ce',
      cancelButtonColor: '',
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
      confirmButtonColor: '#070525ce',
      cancelButtonColor: '',
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
toastr.success('Actualizado')
</script> 
@endif

@if(Session::has('error'))
<script>
toastr.error('Error')
</script>
@endif
</body>
</html>
