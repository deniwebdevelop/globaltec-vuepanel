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
                    <div class="card" style="background-image: linear-gradient(200deg, #070525ce 1%, rgb(1, 0, 5)100%);">
                        <div class="card-header">
                            <h3 class="font-weight-light text-white">Productos
                                <a class="btn bg-white float-right btn-sm" href="{{ route('products.add') }}"><i
                                        class="fa fa-plus-circle"></i> Agregar Producto</a>
                            </h3>
                        </div>
                    </div><!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class="table table-striped table-responsive" width="100%">
                            <thead class="thead">
                                <tr>
                                    <th style="display: none">Codigo</th>
                                    <th>Categoria</th>
                                    <th>Tipo de Producto</th>
                                    <th>Modelo</th>
                                    <th>Marca</th>
                                    <th>Descripcion</th>
                                    <th>Costo FOB</th>
                                    <th>Moneda de Compra</th>
                                    <th>Moneda de Venta</th>
                                    <th>Precio de Venta</th>
                                    <th style="width: 12%">Accion</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($file as $key => $product)
                                <tr>
                                    <td style="display: none">{{ $key+1 }}</td>
                                    <td>{{ $product['category']['name']}}</td>
                                    <td>{{ $product['ptype']['name']}}</td>
                                    <td>{{ $product->model }}</td>
                                    <td>{{ $product->brand }}</td>
                                    <td>{{ $product->description }}</td>
                                    <td>{{ $product->fob }}</td>
                                    <td>{{ $product->buy_coin }}</td>
                                    <td>{{ $product->sale_coin }}</td>
                                    <td>{{ $product->sale_price }}</td>
                                    @php
                                    $count_product = App\Model\Purchase::where('product_id',$product->id)->count();
                                    @endphp
                                    <td>


                                        <a title="Download" id="download" class="btn btn-sm btn-success"
                                            href="/products/download/{{ $product->file }}"><i
                                                class="fa fa-download"></i></a>
                                        <a title="Edit" class="btn btn-sm text-white"
                                            style="background-image: linear-gradient(200deg, #070525ce 1%, rgb(1, 0, 5)100%);"
                                            href="{{ route('products.edit', $product->id) }}"><i
                                                class="fa fa-edit"></i></a>
                                        <a title="Delete" id="delete" class="btn btn-sm btn-danger"
                                            href="{{ route('products.delete', $product->id) }}"><i
                                                class="fa fa-trash"></i></a>
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
