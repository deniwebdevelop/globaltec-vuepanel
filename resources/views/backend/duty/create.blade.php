@extends('backend.layouts.master')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper bg-white">
    <!--Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm 6">

                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item active">Tareas</li>
                    </ol>
                </div><!-- /.col-->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main Content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Main Row -->
            <div class="row">
                <!-- Left Col -->
                <section class="col-md-12">
                    <!-- Custom Tabs -->
                    <div class="card">
                        <div class="card-header text-white"  style="background-image: linear-gradient(200deg, #070525ce 1%, rgb(1, 0, 5)100%);">
                            <h3 class="font-weight-lighter text-white">Agregar Tarea
                                <a href="{{ route('duty.index') }}" class="btn bg-white float-right btn-sm">
                                    <i class="fa fa-list"></i>
                                    Lista de Tareas
                                </a>
                            </h3>
                        </div><!-- /.Card Header -->
                        <div class="card-body">
                            <form method="post" action="{{ route('duty.store') }}" id="myForm"
                                enctype="multipart/form-data" class="bg-white">
                                @csrf
                                <div class="form-row">
                                    <div class="form-group col-md-3">
                                        <label for="date">Fecha</label>
                                        <input type="text" name="date" id="date"
                                            class="form-control datepicker form-control-sm" placeholder="Fecha"
                                            readonly>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="form-group col-md-3">
                                      <label>Cliente</label>
                                      <select name="customer_id" id="customer_id" class="form-control form-control-sm select2" required>
                                        <option value="">Seleccionar Cliente</option>
                                        @foreach ($customers as $customer)
                                        <option value="{{ $customer->id }}">{{ $customer->name }} ({{ $customer->company }})</option>
                                        @endforeach
                                      </select>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <label for="descripcion">Descripcion</label> 
                                        <input type="text" name="descripcion" id="descripcion"
                                            class="form-control form-control-lg">
                                    </div>

                                    <div class="form-group col-md-12">
                                        <label for="status">Estado</label>
                                        <select name="status" id="status" class="form-control form-control-sm">
                                            <option value="Pendiente">Pendiente</option>
                                            <option value="Iniciado">Iniciado</option>
                                            <option value="Avanzado">Avanzado</option>
                                            <option value="Finalizado">Finalizado</option>
                                        </select>
                                    </div>

                                    <div class="form-group col-md-12">
                                        <input type="submit" value="Agregar" class="btn bg-md text-white" style="background:#030335e8">
                                    </div>
                                </div>
                            </form>
                        </div><!-- /.card-body-->
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
    $('.datepicker').datepicker({
        uiLibrary: 'bootstrap4',
        format: 'yy-mm-dd'
    });

</script>
<script type="text/javascript">
    $(document).ready(function (){
      $('#myForm').validate({
        rules:{
          descripcion: {
            required: true,
          }
        },
        messages: {
          descripcion: {
            required: "Debe ingresar una descripción",
          }               
        },
        errorElement: 'span',
        errorPlacement: function(error, element){
          error.addClass('invalid-feedback');
          element.closest('.form-group').append(error);
        },
        highlight: function (element, errorClass, validClass){
          $(element).addClass('is-invalid');
        },
        unhighlight: function (element, errorClass, validClass){
          $(element).removeClass('is-invalid');
        }
      });
    });
    </script>
    <script>
        $(document).ready(function() {
    $('.js-example-basic-single').select2();
})
    </script>
@endsection
