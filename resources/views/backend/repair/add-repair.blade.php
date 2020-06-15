@extends('backend.layouts.master')
@section('content')
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
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
                <h3>Agregar Reparacion
                  <a class="btn btn-success float-right btn-sm" href="{{route('repair.view')}}"><i class="fa fa-list"></i> Reparaciones</a>
                </h3>
              </div><!-- /.card-header -->

              <div class="card-body">
                <form method="post" action="{{ route('repair.store') }}" id="myForm" enctype="multipart/form-data">
                  @csrf
              <div class="form-row">

                <div class="form-group col-md-6">
                  <label for="number">Numero</label>
                  <input type="text" name="number" class="form-control">
              </div>
              <div class="form-group col-md-6">
                  <label for="lab">Laboratorio</label>
                  <input type="text" name="lab" class="form-control">
              </div>
              <div class="form-group col-md-4">
                  <label for="entry">Fecha Ingreso</label>
                  <input type="text" name="entry" class="form-control datepicker entry">
              </div>
              <div class="form-group col-md-4">
                  <label for="sent">Fecha Envio Lab</label>
                  <input type="text" name="sent" class="form-control datepicker sent">
              </div>
              <div class="form-group col-md-4">
                  <label for="dev">Fecha Dev Lab</label>
                  <input type="text" name="dev" class="form-control datepicker dev">
              </div>
              <div class="form-group col-md-4">
                  <label for="deliver">Fecha Entrega Cliente</label>
                  <input type="text" name="deliver" class="form-control datepicker deliver">
              </div>
              <div class="form-group col-md-6">
                  <label for="serial">Producto - S/N</label>
                  <input type="text" name="serial" class="form-control">
              </div>
              <div class="form-group col-md-6">
                  <label for="labcost">Costo Lab</label>
                  <input type="number" name="labcost" class="form-control">
              </div>
              <div class="form-group col-md-6">
                  <label for="sparecost">Costo Repuesto</label>
                  <input type="number" name="sparecost" class="form-control">
              </div>
              <div class="form-group col-md-6">
                  <label for="shipcost">Costo Transporte</label>
                  <input type="number" name="shipcost" class="form-control">
              </div>
              <div class="form-group col-md-6">
                  <label for="markup">Markup</label>
                  <input type="number" name="markup" class="form-control">
              </div>
              <div class="form-group col-md-6">
                <label for="file">Archivos</label>
                <input type="file" name="file" class="form-control">
            </div>
    
              <div class="form-group col-md-12">
              <input type="submit" value="Agregar" class="btn btn-primary">
              </div>
              </div>
              </form>
              </div>

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
    $('.entry').datepicker({
        uiLibrary: 'bootstrap4',
        format :'dd-mm-yyyy'
    });
    $('.sent').datepicker({
        uiLibrary: 'bootstrap4',
        format :'dd-mm-yyyy'
    });
    $('.dev').datepicker({
        uiLibrary: 'bootstrap4',
        format :'dd-mm-yyyy'
    });
    $('.deliver').datepicker({
        uiLibrary: 'bootstrap4',
        format :'dd-mm-yyyy'
    });
</script>

@endsection