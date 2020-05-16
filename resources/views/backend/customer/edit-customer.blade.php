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
                    <h3>Editar Cliente
                        <a href="{{ route('suppliers.view') }}" class="btn btn-success float-right btn-sm">
                            Lista de Clientes
                        </a>
                    </h3>
                </div><!-- /.Card Header -->
                <div class="card-body">
                    <form method="post" action="{{ route('suppliers.update',$editData->id) }}" id="myForm" enctype="multipart/form-data">
                        @csrf
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="name">Nombre del Cliente</label>
                            <input type="text" name="name" value="{{ $editData->name }}" class="form-control">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="mobile_no">Telefono </label>
                            <input type="text" name="mobile_no" value="{{ $editData->mobile_no }}" class="form-control">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="email">Email</label>
                            <input type="text" name="email" value="{{ $editData->mobile_no }}" class="form-control">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="address">Direccion</label>
                            <input type="text" name="address" value="{{ $editData->mobile_no }}" class="form-control">
                        </div>
                        <div class="form-group col-md-6">
                        <input type="submit" value="Actualizar" class="btn btn-primary">
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