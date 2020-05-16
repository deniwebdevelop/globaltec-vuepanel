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
              <li class="breadcrumb-item active">Contraseña</li>
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
                 <h3 class="p-2 font-weight-light">Cambiar contraseña
                 </h3>
                </div>
              </div><!-- /.card-header -->
              <div class="card-body">
                <form method="post" action="{{route('profiles.password.update')}}" id="myForm"> 
                    @csrf
                    <div class="form-row">
                      <div class="form-group col-md-7">
                        <label for="current_password">Contraseña Actual</label>
                        <input type="password" name="current_password" class="form-control">
                    </div>
                    <div class="form-group col-md-7">
                        <label for="new_password">Nueva Contraseña</label>
                        <input type="password" name="new_password" id="new_password" class="form-control">
                    </div>
                    <div class="form-group col-md-7">
                        <label for="confirm">Confirmar Contraseña</label>
                        <input type="password" name="confirm" class="form-control">
                    </div>
                    <div class="form-group col-md-6">
                        <input type="submit" value="Actualizar" class="btn btn-primary">
                    </div>
                  </div>
                </form>
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
<script>
</script>
@endsection
 