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
            <div class="card">
              <div class="card-header">
                 <h3 class="p-1 font-weight-light">Reparaciones
                    <a class="btn btn-success float-right btn-sm"
                    href="{{ route('repair.add') }}"><i class="fa fa-plus-circle mr-2"></i>Agregar Reparacion</a>
                 </h3>
                </div>
              </div><!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-hover" width="100%">
                  <thead style="font-size: 14px">
                      <tr>
                          <th style="display: none">Codigo</th>
                          <th>Numero</th>
                          <th>Laboratorio</th>
                          <th>Ingreso</th>
                          <th>Envio Laboratorio</th>
                          <th>Devolucion Laboratorio</th>
                          <th>Entrega Ciente</th>
                          <th>Producto - S/N</th>
                          <th>Costo Lab</th>
                          <th>Costo Repuesto</th>
                          <th>Costo Transporte</th>
                          <th>Costo Markup</th>
                          <th>Archivos</th>
   
                      </tr>
                  </thead>
                  <tbody>
                  @foreach($allData as $key => $repair)
                      <tr>
                          <td style="display: none">{{$key+1}}</td>
                          <td>{{$repair->number}}</td>
                          <td>{{$repair->lab}}</td>
                          <td>{{$repair->entry}}</td>
                          <td>{{$repair->sent}}</td>
                          <td>{{$repair->dev}}</td>
                          <td>{{$repair->deliver}}</td>
                          <td>{{$repair->serial}}</td>
                          <td>{{$repair->labcost}}</td>
                          <td>{{$repair->sparecost}}</td>
                          <td>{{$repair->shipcost }}</td>
                          <td>{{$repair->markup}}</td>
                          <td>{{ $repair->file }}</td>
             
                          <td>
                              <a title="Edit" class="btn btn-sm btn-primary" href="#"><i
                              class="fa fa-edit"></i></a>
                              <a title="Delete" id="delete" class="btn btn-sm btn-danger" href="{{ route('repair.delete', $repair->id) }}"><i
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
 