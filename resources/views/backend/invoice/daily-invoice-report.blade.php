@extends('backend.layouts.master')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Ventas | Facturacion</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item active">Ventas</li>
                        <li class="breadcrumb-item active">Facturacion</li>
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
                            <h3>Selecctionar Criterio
                                <!--  <a class="btn btn-success float-right btn-sm" href=""><i class="fa fa-list"></i> Ver Facturas</a> -->
                            </h3>
                        </div><!-- /.card-header -->

                        <div class="card-body">
                            <form action="{{ route('invoice.daily.report.pdf') }}" target="_blank" method="GET" id="myForm">
                                <div class="form-row">
                                    <div class="form-group col-md-4">
                                        <label>Fecha Inicio</label>
                                        <input type="text" name="start_date" id="start_date"
                                            class="form-control datepicker form-control-sm" placeholder="DD-MM-YYY"
                                            readonly>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label>Fecha Final</label>
                                        <input type="text" name="end_date" id="end_date"
                                            class="form-control datepicker1 form-control-sm" placeholder="DD-MM-YYY"
                                            readonly>
                                    </div>
                                    <div class="form-group col-md-1" style="padding-top: 30px;">
                                        <button type="submit" class="btn btn-primary btn-sm">Buscar</button>
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
    $('.datepicker').datepicker({
        uiLibrary: 'bootstrap4',
        format: 'yyyy-mm-dd'
    });
    $('.datepicker1').datepicker({
        uiLibrary: 'bootstrap4',
        format: 'yyyy-mm-dd'
    });
</script>
<script type="text/javascript">
    $(document).ready(function (){
      $('#myForm').validate({
        rules:{
          start_date: {
            required: true,
          },
          end_date: {
            required:true,
          }
        },
        messages: {
            name: {
                required: "Debe ingresar nombre",
            },
            mobile_no: {
                required: "Debe ingresar un telefono",
            },
            email: {
                required: "Debe ingresar un email",
                email: "Por favor ingresar un email <em>valido</em>",
            },
            address: {
                required: "Debe ingresar una direccion",
            },                
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
@endsection
