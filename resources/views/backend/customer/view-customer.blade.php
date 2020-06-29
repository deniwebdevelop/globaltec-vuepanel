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
            <div class="card" style="background-image: linear-gradient(200deg, #070525ce 1%, rgb(1, 0, 5)100%);">
              <div class="card-header">
                 <h3 class="font-weight-light text-white">Agenda
                     <a class="btn bg-white float-right btn-sm" href="{{ route('customers.add') }}"><i class="fa fa-plus-circle mr-2"></i> Agregar Contacto</a>
                 </h3>
                </div>
              </div><!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-hover table-responsive">
                    <thead style="font-size: 14px">
                        <tr>
                            <th style="display:none ">Codigo</th>
                            <th>Nombre</th>
                            <th>Empresa</th>
                            <th width="10%">Telefonos</th>
                            <th>Email</th>
                            <th>Puesto</th>
                            <th>Ciudad</th>
                            <th>Direccion</th>
                            <th>CPostal</th>
                            <th>Cuit</th>
                            <th width="2%">Website</th>
                            <th width="20%">Accion</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($allData as $key => $customer)
                        <tr>
                            <td style="display: none;">{{$key+1}}</td>
                            <td>{{$customer->name}}</td>
                            <td>{{ $customer->company }}</td>
                            <td>{{$customer->mobile_no}} - {{ $customer->mobile_two }} - {{ $customer->mobile_three }}</td>
                            <td>{{$customer->email}}</td>
                            <td>{{$customer->position}}</td>
                            <td>{{$customer->city}}</td>
                            <td>{{$customer->address}}</td>
                            <td>{{$customer->postal }}</td>
                            <td>{{$customer->cuit}}</td>
                            <td>{{$customer->website}}</td>
                            <td>
                                <a title="Edit" class="btn btn-sm text-white" style="background-image: linear-gradient(200deg, #070525ce 1%, rgb(1, 0, 5)100%);" href="{{ route('customers.edit', $customer->id) }}"><i
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
 