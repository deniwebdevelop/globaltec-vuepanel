@extends('backend.layouts.master')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper bg-white">
    <!--Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm 6">
                    <h1 class="m-0 text-white">Reparaciones</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item active">Reparacion</li>
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

                    <h3 class="font-weight-lighter">Editar Reparacion
                        <a href="{{ route('repair.index') }}" class="btn bg-white float-right btn-sm">
                            <i class="fa fa-list"></i>
                           Lista de Reparaciones
                        </a>
                    </h3>
                </div><!-- /.Card Header -->
                <div class="card-body">
                    <form method="post" action="{{ route('repair.update',$data->id) }}" id="myForm" enctype="multipart/form-data">
                        @csrf
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="admission">Ingreso</label>
                              <input type="text" name="admission" id="admission" value="{{ $data->admission }}"
                            class="form-control form-control-sm" placeholder="Fecha De Ingreso" readonly>
                         </div>

                        <div class="form-group col-md-6">
                            <label for="laboratory">Envio Laboratorio</label>
                            <input type="text" name="labsent" id="labsent" class="form-control form-control-sm" value="{{ $data->labsent }}"
                            placeholder="Envio a Laboratorio" readonly>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="laboratory">Devolucion Laboratorio</label>
                            <input type="text" name="labreturn" id="labreturn" value="{{ $data->labreturn }}"
                            class="form-control form-control-sm" placeholder="Devolución Laboratorio" readonly>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="laboratory">Entrega Cliente</label>
                            <input type="text" name="deliver" id="deliver" class="form-control form-control-sm" value="{{ $data->deliver }}"
                            placeholder="Entrega al Cliente" readonly>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="laboratory">Laboratorio</label>
                            <input type="text" name="laboratory" value="{{ $data->laboratory }}" class="form-control">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-3">
                            <label for="model">Modelo</label>
                            @foreach ($products as $products)
                            <input type="text" name="product_id" value="{{ $product['products']['model'] }}" class="form-control" readonly>
                            @endforeach
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-3">
                            <label for="labcost">Costo Laboratorio</label>
                            <input type="decimal" name="labcost" value="{{ $data->labcost }}" class="form-control">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="repaircost">Repuesto</label>
                            <input type="decimal" name="repaircost" value="{{ $data->repaircost }}" class="form-control">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="transportcost">Transporte</label>
                            <input type="decimal" name="transportcost" value="{{ $data->transportcost }}" class="form-control">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="markup">MarkUp</label>
                            <input type="decimal" name="markup" value="{{ $data->markup }}" class="form-control">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="status">Estado</label>
                            <select name="status" id="status" class="form-control form-control-sm">
                                <option value="Recibido">Recibido De Cliente</option>
                                <option value="Enviado">Enviado a Laboratorio</option>
                                <option value="Reparado">Reparado</option>
                                <option value="Entregado">Entregado A Cliente</option>
                            </select>
                        </div>
                        <div class="form-group col-md-12">
                            <label for="file">Archivos</label>
                            <input type="file" name="file" multiple class="form-control py-5">
                        </div>
                        <div class="form-group col-md-12">
                        <input type="submit" value="Actualizar" class="btn btn-md text-white" style="background:#070525ce;">
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
    $('#admission').datepicker({
        uiLibrary: 'bootstrap4',
        format: 'yyyy-mm-dd'
    });
    $('#labsent').datepicker({
        uiLibrary: 'bootstrap4',
        format: 'yyyy-mm-dd'
    });
    $('#labreturn').datepicker({
        uiLibrary: 'bootstrap4',
        format: 'yyyy-mm-dd'
    });
    $('#deliver').datepicker({
        uiLibrary: 'bootstrap4',
        format: 'yyyy-mm-dd'
    });

</script>
@endsection