@extends('backend.layouts.master')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper bg-white">
    <!--Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm 6">
                    <h1 class="m-0 text-white">Administrar Clientes</h1>
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
                <div class="card-header">
                    <h3>Agregar Cliente
                        <a href="{{ route('customers.view') }}" class="btn btn-success float-right btn-sm">
                            Lista de Clientes
                        </a>
                    </h3>
                </div><!-- /.Card Header -->
                <div class="card-body">
                    <form method="post" action="{{ route('customers.store') }}" id="myForm" enctype="multipart/form-data">
                        @csrf
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="name">Nombre del Cliente</label>
                            <input type="text" name="name" class="form-control">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="mobile_no">Telefono</label>
                            <input type="text" name="mobile_no" class="form-control">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="email">Email</label>
                            <input type="text" name="email" class="form-control">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="address">Direccion</label>
                            <input type="text" name="address" class="form-control">
                        </div>
                        <div class="form-group col-md-6">
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
            email:true,
          },
          address: {
            required: true,
          }
        },
        messages: {
            name: {
                required: "Debe ingresar nombre",
            },
            mobile_no: {
                required: "Debe ingresar un telefono",
            },
            email: {
                required: "Debe ingresar un email",
                email: "Por favor ingresar un email <em>valido</em>",
            },
            address: {
                required: "Debe ingresar una direccion",
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