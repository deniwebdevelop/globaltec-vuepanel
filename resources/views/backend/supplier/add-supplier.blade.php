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
                        <li class="breadcrumb-item active">Proveedor</li>
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
                <div class="card-header">
                    <h3 class="font-weight-lighter ">Nuevo Proveedor
                        <a href="{{ route('suppliers.view') }}" class="btn text-white float-right btn-sm" style="background: linear-gradient(200deg, #0f522c 20%, rgba(9, 136, 47, 0.829)100%)">
                            Lista de Proveedores
                        </a>
                    </h3>
                </div><!-- /.Card Header -->
                <div class="card-body">
                    <form method="post" action="{{ route('suppliers.store') }}" id="myForm" enctype="multipart/form-data">
                        @csrf
                    <div class="form-row">
                      <div class="form-group col-md-6">
                        <label for="name">Nombre del Proveedor</label>
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
                    <input type="submit" value="Agregar" class="btn btn-primary">
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
            email: true,
          },
          address: {
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
            required:"Debe ingresar un e-mail",
          },
          address: {
            required: "Debe ingresar una direccion",
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