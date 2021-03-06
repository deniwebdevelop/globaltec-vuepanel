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
              <li class="breadcrumb-item active">Unidades</li>
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
                 <h3 class="font-weight-light text-white">Unidades
                     <a class="btn bg-white float-right btn-sm" href="{{ route('units.add') }}"><i class="fa fa-plus-circle"></i> Agregar Unidad</a>
                 </h3>
                </div>
              </div><!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-hover">
                    <thead class="thead">
                        <tr>
                            <th style="display: none;">Codigo</th>
                            <th width="80%">Nombre</th>
                            <th>Accion</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($allData as $key => $unit)
                        <tr>
                            <td style="display: none;">{{$key+1}}</td>
                            <td>{{$unit->name}}</td>
                            <td>
                              @php
                              $count_unit = App\Model\Product::where('unit_id',$unit->id)->count(); 
                              @endphp
                                <a title="Edit" class="btn btn-sm text-white" style="background-image: linear-gradient(200deg, #070525ce 1%, rgb(1, 0, 5)100%);" href="{{ route('units.edit', $unit->id) }}"><i
                                class="fa fa-edit"></i></a>
                                @if($count_unit<1)
                                <a title="Delete" id="delete" class="btn btn-sm btn-danger" href="{{ route('units.delete', $unit->id) }}"><i
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
 