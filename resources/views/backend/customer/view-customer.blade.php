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
              <li class="breadcrumb-item active">Clientes</li>
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
                 <h3 class="p-1 font-weight-light">Clientes
                     <a class="btn btn-success float-right btn-sm" href="{{ route('customers.add') }}"><i class="fa fa-plus-circle p-2"></i>Agregar Cliente</a>
                 </h3>
                </div>
              </div><!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-hover table-responsive" width="100%">
                    <thead style="font-size: 14px">
                        <tr>
                            <th>Codigo</th>
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
                    @foreach($allData as $key => $customer)
                        <tr>
                            <td>{{$key+1}}</td>
                            <td>{{$customer->name}}</td>
                            <td>{{ $customer->company }}</td>
                            <td>{{$customer->mobile_no}}</td>
                            <td>{{$customer->mobile_two}}</td>
                            <td>{{$customer->mobile_three}}</td>
                            <td>{{$customer->email}}</td>
                            <td>{{$customer->position}}</td>
                            <td>{{$customer->city}}</td>
                            <td>{{$customer->address}}</td>
                            <td>{{$customer->postal }}</td>
                            <td>{{$customer->cuit}}</td>
                            <td>{{$customer->website}}</td>
                            <td>
                                <a title="Edit" class="btn btn-sm btn-primary" href="{{ route('customers.edit', $customer->id) }}"><i
                                class="fa fa-edit"></i></a>
                                <a title="Delete" id="delete" class="btn btn-sm btn-danger" href="{{ route('customers.delete', $customer->id) }}"><i
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
 