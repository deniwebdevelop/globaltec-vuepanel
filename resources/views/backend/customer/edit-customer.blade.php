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
                        <li class="breadcrumb-item">Cliente</li>
                        <li class="breadcrumb-item">Editar</li>
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
                    <h3 class="font-weight-lighter text-white">Editar
                        <a href="{{ route('customers.view') }}" class="btn bg-white float-right btn-sm">
                          <i class="fa fa-list"></i>
                            Lista de Clientes
                        </a>
                    </h3>
                </div><!-- /.Card Header -->
                <div class="card-body">
                    <form method="post" action="{{ route('customers.update',$editData->id) }}" id="myForm" enctype="multipart/form-data">
                        @csrf
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="name">Nombre del Cliente</label>
                            <input type="text" name="name" value="{{ $editData->name }}" class="form-control">
                        </div>
                        <div class="form-group col-md-6">
                          <label for="company">Empresa</label>
                          <input type="text" name="company" value="{{ $editData->company }}" class="form-control">
                      </div>
                        <div class="form-group col-md-6">
                            <label for="mobile_no">Telefono</label>
                            <input type="text" name="mobile_no" value="{{ $editData->mobile_no }}" class="form-control">
                        </div>
                        <div class="form-group col-md-6">
                          <label for="mobile_two">Telefono 2</label>
                          <input type="text" name="mobile_two" value="{{ $editData->mobile_two}}" class="form-control">
                        </div>
                        <div class="form-group col-md-6">
                          <label for="mobile_three">Telefono 3</label>
                          <input type="text" name="mobile_three" value="{{ $editData->mobile_three }}" class="form-control">
                      </div>
                        <div class="form-group col-md-6">
                            <label for="email">Email</label>
                            <input type="email" name="email" value="{{ $editData->email }}" class="form-control">
                        </div>
                        <div class="form-group col-md-6">
                          <label for="position">Puesto</label>
                          <input type="text" name="position" value="{{ $editData->position }}" class="form-control">
                      </div>
                      <div class="form-group col-md-6">
                        <label for="city">Ciudad</label>
                        <input type="text" name="city" value="{{ $editData->city }}" class="form-control">
                    </div>
                        <div class="form-group col-md-6">
                            <label for="address">Direccion</label>
                            <input type="text" name="address" value="{{ $editData->address }}" class="form-control">
                        </div>
                        <div class="form-group col-md-6">
                          <label for="postal">Codigo Postal</label>
                          <input type="text" name="postal" value="{{ $editData->postal }}" class="form-control">
                      </div>
                      <div class="form-group col-md-6">
                        <label for="cuit">Cuit</label>
                        <input type="text" name="cuit" value="{{ $editData->cuit }}" class="form-control">
                    </div>
                    <div class="form-group col-md-6">
                      <label for="website">Website</label>
                      <input type="text" name="website" value="{{ $editData->website }}" class="form-control">
                  </div>
                        <div class="form-group col-md-6">
                        <input type="submit" value="Actualizar" class="btn btn-md text-white" style="background:#070525ce;">
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