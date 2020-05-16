@extends('backend.layouts.master')
@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper bg-white">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-white">Administrar Perfil</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Perfil</li>
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
                 <h3>Editar Perfil
                     <a class="btn btn-success float-right btn-sm" href="{{ route('profiles.view') }}"><i class="fa fa-list mr-2"></i>Tu Perfil</a>
                 </h3>
                </div>
              </div><!-- /.card-header -->
              <div class="card-body">
                <form method="post" action="{{route('profiles.update')}}" id="myForm"
                enctype="multipart/form-data">
                    @csrf
                    <div class="form-row">
                        <div class="form-group col-md-8">
                            <label for="name">Nombre</label>
                            <input type="text" name="name" value="{{ $editData->name }}"
                            class="form-control">
                        </div>
                    <div class="form-group col-md-8">
                      <label for="email">Email</label>
                      <input type="email" name="email" class="form-control" value="{{ $editData->email }}">
                    </div>
                    <div class="form-group col-md-8">
                      <label for="mobile">Mobile</label>
                      <input type="mobile" name="mobile" class="form-control" value="{{ $editData->mobile }}">
                    </div>
                    <div class="form-group col-md-6">
                      <label for="image">Imagen</label>
                      <input type="file" name="image" class="form-control" id="image">
                    </div>
                  </div>
                  <div class="form-group col-md-12">
                    <img id="showImage" src="{{(!empty($editData->image))?url('upload/user_images/'.
                    $editData->image):url('upload/no_image.jpeg') }}" style="width:180px;height:180px;border:1px solid #000;">
                  </div>
                    <div class="form-group col-md-6" style="padding-top: 30px;">
                        <input type="submit" value="Actualizar" class="btn btn-primary">
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
          name: {
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
          mobile: {
            required: true,
          }
          image: {
            required: true,
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
 