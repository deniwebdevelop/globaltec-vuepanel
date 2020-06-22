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
                        <li class="breadcrumb-item active">Producto</li>
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
                    <h3 class="font-weight-lighter">Editar Producto
                        <a href="{{ route('products.view') }}" class="btn bg-white float-right btn-sm">
                          <i class="fa fa-list"></i>
                             Lista de Productos
                        </a>
                    </h3>
                </div><!-- /.Card Header -->
                <div class="card-body">
                    <form method="post" action="{{ route('products.update', $editData->id) }}" id="myForm" enctype="multipart/form-data">
                        @csrf
                    <div class="form-row">
                        <div class="form-group col-md-3">
                            <label for="category_id">Categoria</label>
                            <select name="category_id" class="form-control">
                              <option value="">Seleccionar Categoria</option>
                              @foreach ($categories as $category)
                              <option value="{{ $category->id }}" {{ ($editData->category_id==$category->id)?"selected":'' }}>{{ $category->type }} | {{ $category->name }}</option>
                              @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-3">
                          <label for="name">Producto</label>
                          <input type="text" name="name" value="{{ $editData->name }}" class="form-control">
                      </div>
                        <div class="form-group col-md-3">
                          <label for="brand">Marca</label>
                          <input type="text" name="brand" class="form-control" value="{{ $editData->brand }}">
                      </div>
             
                        <div class="form-group col-md-6">
                          <label for="coin">Moneda</label>
                          <select name="coin" class="form-control">
                            <option value="">Seleccionar Moneda</option>
                            <option value="ARS">ARS</option>
                            <option value="USD">USD</option>
                            <option value="EUR">EUR</option>
                            <option value="GBP">GBP</option>
                          </select>
                      </div>
                  
                        <div class="form-group col-md-12">
                        <input type="submit" value="Actualizar" class="btn btn-md text-white" style="background:#030335e8">
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
          category_id: {
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