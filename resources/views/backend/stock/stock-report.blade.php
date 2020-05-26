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
              <li class="breadcrumb-item active">Stock</li> 
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
                 <h3 class="p-1 font-weight-light">Stock
                    <a class="btn btn-success float-right btn-sm"  href="{{ route('stock.report.pdf') }}" target="_blank">
                    <i class="fa fa-download p-2"></i>Descargar PDF</a>
                 </h3>
                </div>
              </div><!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-hover">
                    <thead class="thead">
                        <tr>
                            <th>Codigo</th>
                            <th>Proveedor</th>
                            <th>Categoria</th>
                            <th>Producto</th>
                            <th>Entrante</th>
                            <th>Saliente</th>
                            <th>Stock</th>
                            <th>Unidad</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($allData as $key => $product)
                    @php
                        $buying_total = App\Model\Purchase::where('category_id',$product->category_id)->where('product_id',$product->id)->where('status','1')->sum('buying_qty');
                        $selling_total = App\Model\InvoiceDetail::where('category_id',$product->category_id)->where('product_id',$product->id)->where('status','1')->sum('selling_qty');
                    @endphp
                        <tr>
                            <td>{{ $key+1 }}</td>
                            <td>{{ $product['supplier']['name']}}</td>
                            <td>{{ $product['category']['name']}}</td>
                            <td>{{ $product->name }}</td>
                            <td>{{ $buying_total }}</td>
                            <td>{{ $selling_total }}</td>
                            <td>{{ $product->quantity }}</td>
                            <td>{{ $product['unit']['name']}}</td>
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
 