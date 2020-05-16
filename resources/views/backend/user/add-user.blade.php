@extends('backend.layouts.master')
@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper bg-white">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">

          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
              <li class="breadcrumb-item active">Usuarios</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Main row -->
        <div class="row">
          <!-- Left col -->
          <section class="col-md-12">
            <!-- Custom tabs (Charts with tabs)-->
            <div class="card">
              <div class="card-header">
                 <h3 class="p-1 font-weight-light">Agregar Usuario
                     <a class="btn btn-success float-right btn-sm" href="{{ route('users.view') }}"><i class="fa fa-list p-2"></i>Lista de Usuarios</a>
                 </h3>
                </div>
              </div><!-- /.card-header -->
              <div class="card-body">
                <form method="post" action="{{route('users.store')}}" id="myForm">
                    @csrf
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="usertype">Perfil de Usuario</label>
                            <select name="usertype" id="usertype" class="form-control">
                                <option value="">Seleccionar Rol</option>
                                <option value="Admin">Administrador</option>
                                <option value="User">Usuario</option>
                            </select>
                        </div>
                    <div class="form-group col-md-6">
                        <label for="name">Nombre</label>
                        <input type="text" name="name" class="form-control">
                        <font style="red">
                        {{ ($errors->has('name')) ? ($errors->first('name')):'' }}
                        </font>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="email">Email</label>
                      <input type="email" name="email" class="form-control">
                      <font style="red">
                      {{ ($errors->has('email')) ? ($errors->first('email')):'' }}
                      </font>
                    </div>
                  </div>
                  <div class="form-row">
                    <div class="form-group col-md-6">
                      <label for="password">Contraseña</label>
                      <input type="password" name="password" class="form-control">
                  </div>
                  <div class="form-group col-md-6">
                      <label for="password">Confirmar Contraseña</label>
                      <input type="password" name="password2" class="form-control">
                  </div>
                  <div class="fom-group col-md-6">
                      <input type="submit" value="Agregar" class="btn btn-primary">
                  </div>
                  </div>
           
                </form>
              </div><!-- /.card-body -->
            </div>
            <!-- /.card -->
          </section>
          <!-- right col -->
        </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->     

<script type="text/javascript">
$(document).ready(function (){
  $('#myForm').validate({
    rules:{
      usertype: {
        required: true,
      },
      email: {
        required:true,
        email:true,
      },
      password: {
        required:true,
        minLength: 6
      },
      password2: {
        required: true,
        equalTo: '#password'
      }
    },
    messages: {
      name: {
                required: "Por favor ingresar nombre",
      },
      usertype: {
                required: "Por favor seleccionar rol de usuario",
      },
       email: {
              required: "Por favor ingresa un email",
              email: "Por favor ingresar un email <em>valido</em>",
      },
      password: {
                required: "Debe ingresar una contraseña",
                minlength: "Tu contraseña debe tener al menos 6 caracteres",
      },
      password2: {
                required: "Debe confirmar la contraseña",
                equalTo: "La confirmacion no coincide",
      }
    },
    errorElement: 'span',
    errorPlacement: function(error, element){
      error.addClass('invalid-feedback');
      element.closest('.form-group').append(error);
    },
    highlight: function (element, errorClass, validClass){
      $(element).addClass('is-invalid');
    },
    unhighlight: function (element, errorClass, validClass){
      $(element).removeClass('is-invalid');
    }
  });
});
</script>
@endsection
 