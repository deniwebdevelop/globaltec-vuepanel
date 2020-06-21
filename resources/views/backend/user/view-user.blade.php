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
              <li class="breadcrumb-item active">Usuarios</li>
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
                 <h3 class="p-1 font-weight-light">Usuarios
                     <a class="btn btn-success float-right btn-sm" href="{{ route('users.add') }}"><i class="fa fa-plus-circle p-2"></i>Agregar Usuario</a>
                 </h3>
                </div>
              </div><!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-hover">
                  <thead class="thead">
                        <tr>
                            <th>SL.</th>
                            <th>Rol</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($allData as $key => $user)
                        <tr>
                            <td>{{$key+1}}</td>
                            <td>{{$user->usertype}}</td>
                            <td>{{$user->name}}</td>
                            <td>{{$user->email}}</td>
                            <td>
                                <a title="Edit" class="btn btn-sm text-white" style="background-image: linear-gradient(200deg, #070525ce 1%, rgb(1, 0, 5)100%);" href="{{ route('users.edit', $user->id) }}"><i
                                class="fa fa-edit"></i></a>
                                <a title="Delete" id="delete" class="btn btn-sm btn-danger" href="{{ route('users.delete', $user->id) }}"><i
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
 