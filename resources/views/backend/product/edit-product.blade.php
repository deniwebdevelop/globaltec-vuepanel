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
                          <label for="ptype_id">Tipo de Producto</label>
                          <select name="ptype_id" class="form-control">
                            <option value="">Seleccionar</option>
                            @foreach ($ptypes as $ptype)
                            <option value="{{ $ptype->id }}" {{ ($editData->ptype_id==$ptype->id)?"selected":'' }}>{{ $ptype->name }}</option>
                            @endforeach
                          </select>
                      </div>
                        <div class="form-group col-md-3">
                          <label for="model">Modelo</label>
                          <input type="text" name="model" value="{{ $editData->model }}" class="form-control">
                      </div>
                        <div class="form-group col-md-3">
                          <label for="brand">Marca</label>
                          <input type="text" name="brand" class="form-control" value="{{ $editData->brand }}">
                      </div>
             
                      <div class="form-group col-md-3">
                        <label for="fob">Costo Fob</label>
                        <input type="text" name="fob" class="form-control" value="{{ $editData->fob }}">
                    </div>
           
                        <div class="form-group col-md-3">
                          <label for="buy_coin">Moneda de Compra</label>
                          <select name="buy_coin" class="form-control">
                            <option value="">Seleccionar Moneda</option>
                            <option value="ARS">ARS</option>
                            <option value="USD">USD-W</option>
                            <option value="USDB">USD-B</option>
                            <option value="USDT">USD-T</option>
                            <option value="EUR">EUR</option>
                            <option value="GBP">GBP</option>
                            <option value="RBL">Real</option>
                          </select>
                      </div>

                      <div class="form-group col-md-3">
                        <label for="sale_coin">Moneda de Venta</label>
                        <select name="sale_coin" class="form-control">
                          <option value="">Seleccionar Moneda</option>
                          <option value="ARS">ARS</option>
                          <option value="USD">USD-W</option>
                          <option value="USDB">USD-B</option>
                          <option value="USDT">USD-T</option>
                          <option value="EUR">EUR</option>
                          <option value="GBP">GBP</option>
                          <option value="RBL">Real</option>
                        </select>
                    </div>
                    
                    <div class="form-group col-md-3">
                      <label for="sale_price">Precio de Venta</label>
                      <input type="number" name="sale_price" class="form-control" value="{{ $editData->sale_price }}">
                  </div>

                    <div class="form-group col-md-3">
                      <label for="description">Descripcion</label>
                      <input type="text" name="description" class="form-control" value="{{ $editData->description }}">
                  </div>

                      <div class="form-group col-md-12">
                        <label for="file">Archivos</label>
                        <input type="file" name="file" class="form-control py-5 text-white">
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
          coin: {
            required: true,
          },
          sale_coin: {
            required: true,
          }
        },
        messages: {
          coin: {
            required: "Debe ingresar una moneda",
          },
          sale_coin: {
            required: "Debe ingresar una moneda",
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