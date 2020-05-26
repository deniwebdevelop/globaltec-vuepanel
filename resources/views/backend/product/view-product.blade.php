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
              <li class="breadcrumb-item active">Productos</li> 
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
                 <h3 class="p-1 font-weight-light">Productos
                    <a class="btn btn-success float-right btn-sm"
                    href="{{ route('products.add') }}"><i class="fa fa-plus-circle p-2"></i>Agregar Producto</a>
                 </h3>
                </div>
              </div><!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-hover">
                  <thead class="thead">
                        <tr>
                            <th style="display: none">Codigo</th>
                            <th>Proveedor</th>
                            <th>Categoria</th>
                            <th>Nombre</th>
                            <th>Marca</th>
                            <th>Modelo</th>
                            <th>Moneda</th>
                            <th>Unidad</th>
                            <th style="width: 12%;">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($allData as $key => $product)
                        <tr>
                            <td style="display: none">{{ $key+1 }}</td>
                            <td>{{ $product['supplier']['name']}}</td>
                            <td>{{ $product['category']['name']}}</td>
                            <td>{{ $product->name }}</td>
                            <td>{{ $product->brand }}</td>
                            <td>{{ $product->model }}</td>
                            <td>{{ $product->coin }}</td>
                            <td>{{ $product['unit']['name']}}</td>
                            @php
                            $count_product = App\Model\Purchase::where('product_id',$product->id)->count(); 
                            @endphp
                            <td>
                            <a title="Edit" class="btn btn-sm btn-primary" href="{{ route('products.edit', $product->id) }}">
                            <i class="fa fa-edit"></i></a>
                            @if($count_product<1)
                            <a title="Delete" id="delete" class="btn btn-sm btn-danger" href="{{ route('products.delete', $product->id) }}"><i
                            class="fa fa-trash"></i></a>
                            @endif
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
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
@endsection
 