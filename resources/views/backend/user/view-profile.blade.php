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
        <div class="row offset-4">
          <!-- Left col -->
          <section class="col-md-8">
            <!-- Profile Image -->
            <div class="card card-primary">
              <div class="card-body box-profile">
                <div class="text-center">
                  <img class="profile-user-img img-fluid img-circle"
                       src="{{(!empty($user->image))?url('upload/user_images/'.
                       $user->image):url('upload/no_image.jpeg') }}"
                       alt="User profile picture">
                </div>

                <h3 class="profile-username text-center">{{ $user->name }}</h3>

                <p class="text-muted text-center">Mi Peril</p>

                  <table width="100%" class="table table-bordered">
                    <tbody>
                    <tr>
                        <td>Mobile</td>
                        <td>{{ $user->mobile }}</td>
                      </tr>
                    <tr>
                      <td>E-Mail</td>
                      <td>{{ $user->email }}</td>
                    </tr>
                    </tbody>
                  </table>

                <a href="{{ route('profiles.edit') }}" class="btn btn-primary btn-block mt-5"><b>Editar Perfil</b></a>
              </div>
              <!-- /.card-body -->
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
 