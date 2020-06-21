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
              <li class="breadcrumb-item active">Proveedores</li>
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
                 <h3 class="font-weight-light text-white">Proveedores
                     <a class="btn float-right btn-sm bg-white" href="{{ route('suppliers.add') }}"><i class="fa fa-plus-circle mr-2"></i> Agregar Proveedor</a>
                 </h3>
                </div>
              </div><!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-striped table-responsive" width="100%">
                    <thead style="font-size: 14px">
                        <tr>
                            <th style="display: none">Codigo</th>
                            <th>Nombre</th>
                            <th>Empresa</th>
                            <th>Telefono</th>
                            <th>Telefono 2</th>
                            <th>Telefono 3</th>
                            <th>Email</th>
                            <th>Puesto</th>
                            <th>Ciudad</th>
                            <th>Direccion</th>
                            <th>Codigo Postal</th>
                            <th>Cuit</th>
                            <th>Website</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($allData as $key => $supplier)
                        <tr>
                            <td style="display: none">{{$key+1}}</td>
                            <td>{{$supplier->name}}</td>
                            <td>{{$supplier->company }}</td>
                            <td>{{$supplier->mobile_no}}</td>
                            <td>{{$supplier->mobile_two}}</td>
                            <td>{{$supplier->mobile_three}}</td>
                            <td>{{$supplier->email}}</td>
                            <td>{{$supplier->position}}</td>
                            <td>{{$supplier->city}}</td>
                            <td>{{$supplier->address}}</td>
                            <td>{{$supplier->postal }}</td>
                            <td>{{$supplier->cuit}}</td>
                            <td>{{$supplier->website}}</td>
                            <td>
                                <a title="Edit" class="btn btn-sm text-white" style="background-image: linear-gradient(200deg, #070525ce 1%, rgb(1, 0, 5)100%);" href="{{ route('suppliers.edit', $supplier->id) }}"><i
                                class="fa fa-edit"></i></a>
                                <a title="Delete" id="delete" class="btn btn-sm btn-danger" href="{{ route('suppliers.delete', $supplier->id) }}"><i
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