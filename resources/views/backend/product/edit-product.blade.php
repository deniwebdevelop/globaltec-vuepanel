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
                <div class="card-header">
                    <h3 class="font-weight-lighter">Editar Producto
                        <a href="{{ route('products.store') }}" class="btn btn-success float-right btn-sm">
                            Lista de Productos
                        </a>
                    </h3>
                </div><!-- /.Card Header -->
                <div class="card-body">
                    <form method="post" action="{{ route('products.update', $editData->id) }}" id="myForm" enctype="multipart/form-data">
                        @csrf
                    <div class="form-row">
                        <div class="form-group col-md-6">
                          <label for="name">Nombre del Proveedor</label>
                        <select name="supplier_id" class="form-control">
                          <option value="">Seleccionar Proveedor</option>
                          @foreach ($suppliers as $supplier)
                          <option value="{{ $supplier->id }}" {{ ($editData->supplier_id==$supplier->id)?"selected":'' }}>{{ $supplier->name }}</option>
                          @endforeach
                        </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="unit_id">Unidad</label>
                            <select name="unit_id" class="form-control">
                              <option value="">Seleccionar Unidad</option>
                              @foreach ($units as $unit)
                              <option value="{{ $unit->id }}" {{ ($editData->unit_id==$unit->id)?"selected":'' }}>{{ $unit->name }}</option>
                              @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="category_id">Categoria</label>
                            <select name="category_id" class="form-control">
                              <option value="">Seleccionar Categoria</option>
                              @foreach ($categories as $category)
                              <option value="{{ $category->id }}" {{ ($editData->category_id==$category->id)?"selected":'' }}>{{ $category->name }}</option>
                              @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="name">Producto</label>
                            <input type="text" name="name" value="{{ $editData->name }}" class="form-control">
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
          supplier_id: {
            required:true,
          },
          unit_id: {
            required:true,
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