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
              <li class="breadcrumb-item active">Reparaciones</li>
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
                 <h3 class="font-weight-light text-white">Reparaciones
                     <a class="btn float-right bg-white btn-sm" href="{{ route('repair.create') }}"><i class="fa fa-plus-circle mr-2"></i>Nueva Reraparacion</a>
                 </h3>
                </div>
              </div><!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-striped table-responsive" width="100%">
                    <thead style="font-size: 14px">
                        <tr>
                            <th style="display: none">Codigo</th>
                            <th>Nro</th>
                            <th>Ingreso</th>
                            <th>Envio</th>
                            <th>Devolucion</th>
                            <th>Entrega</th>
                            <th>Laboratorio</th>
                            <th>Falla</th>
                            <th>Reparacion</th>
                            <th>S/N</th>
                            <th>Accesorios</th>
                            <th>Estado</th>
                            <th width="15%">Accion</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($file as $key => $data)
                        <tr>
                            <td style="display: none">{{$key+1}}</td>
                            <td>{{$data->repair_no}}</td>
                            <td>{{$data->admission}}</td>
                            <td>{{$data->labsent}}</td>
                            <td>{{$data->labreturn}}</td>
                            <td>{{$data->deliver}}</td>
                            <td>{{ $data->laboratory }}</td>
                            <td>{{ $data->fail_description }}</td>
                            <td>{{ $data->repair_description }}</td>
                            <td>{{ $data->serial_number }}</td>
                            <td>{{ $data->accesories }}</td>
                            <td>{{ $data->status }}</td>
                            <td>
                                <a title="View" target="_blank" class="btn btn-sm btn-warning" href="{{ route('repair.review', $data->id) }}"><i
                                class="fa fa-eye"></i></a>

                                <a title="Download" id="download" class="btn btn-sm btn-success"
                                href="/repair/download/{{ $data->file }}"><i
                                    class="fa fa-download"></i></a>
                        
                              <a title="Edit" class="btn btn-sm text-white" style="background-image: linear-gradient(200deg, #070525ce 1%, rgb(1, 0, 5)100%);" href="{{ route('repair.edit', $data->id) }}"><i
                                class="fa fa-edit"></i></a>
                                <a title="Delete" id="delete" class="btn btn-sm btn-danger" href="{{ route('repair.delete', $data->id) }}"><i
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