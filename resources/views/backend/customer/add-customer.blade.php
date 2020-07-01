@extends('backend.layouts.master')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper bg-white">
    <!--Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm 6">
              
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item active">Cliente</li>
                    </ol>
                </div><!-- /.col-->
             </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main Content -->
    <section class="content">
     <div class="container-fluid">
     <!-- Main Row -->
         <div class="row">
        <!-- Left Col -->
        <section class="col-md-12">
            <!-- Custom Tabs -->
            <div class="card">
                <div class="card-header text-white"  style="background-image: linear-gradient(200deg, #070525ce 1%, rgb(1, 0, 5)100%);">
                    <h3 class="font-weight-lighter">Agregar Contacto
                        <a href="{{ route('customers.view') }}" class="btn bg-white float-right btn-sm"><i class="fa fa-list"></i>
                            Agenda
                        </a>
                    </h3>
                </div><!-- /.Card Header -->
                <div class="card-body">
                    <form method="post" action="{{ route('customers.store') }}" id="myForm" enctype="multipart/form-data">
                        @csrf
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="name">Nombre</label>
                            <input type="text" name="name" class="form-control">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="company">Empresa</label>
                            <input type="text" name="company" class="form-control">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="mobile_no">Telefono</label>
                            <input type="text" name="mobile_no" class="form-control">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="mobile_two">Telefono 2</label>
                            <input type="text" name="mobile_two" class="form-control">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="mobile_three">Telefono 3</label>
                            <input type="text" name="mobile_three" class="form-control">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="email">Email</label>
                            <input type="text" name="email" class="form-control">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="position">Puesto</label>
                            <input type="text" name="position" class="form-control">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="country">Pais</label>
                            <input type="text" name="country" class="form-control">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="state">Provincia/Estado</label>
                            <input type="text" name="state" class="form-control">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="city">Ciudad</label>
                            <input type="text" name="city" class="form-control">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="address">Direccion</label>
                            <input type="text" name="address" class="form-control">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="postal">Codigo Postal</label>
                            <input type="text" name="postal" class="form-control">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="cuit">Cuit</label>
                            <input type="text" name="cuit" class="form-control">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="website">Website</label>
                            <input type="text" name="website" class="form-control">
                        </div>
                        <div class="form-group col-md-12">
                        <input type="submit" value="Agregar" class="btn btn-md text-white" style="background:#030335e8">
                        </div>
                    </div>
                    </form>
                </div><!-- /.card-body-->
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
          mobile_no: {
            required:true,
          },
          email: {
            required:true,
            email:true,
          },
          cuit: {
            required: true,
          }
        },
        messages: {
            name: {
                required: "Debe ingresar un nombre",
            },
            mobile_no: {
                required: "Debe ingresar un telefono",
            },
            email: {
                required: "Debe ingresar un e-mail",
            },
            cuit: {
                required: "Debe ingresar un cuit",
            },                
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