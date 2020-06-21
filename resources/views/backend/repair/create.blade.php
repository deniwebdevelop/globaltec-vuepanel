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
                        <li class="breadcrumb-item active">Proveedor</li>
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
                            <h3 class="font-weight-lighter">Agregar Reparacion
                                <a href="{{ route('repair.index') }}" class="btn bg-white float-right btn-sm">
                                    <i class="fa fa-list"></i>
                                    Lista de Reparaciones
                                </a>
                            </h3>
                        </div><!-- /.Card Header -->
                        <div class="card-body">
                            <form method="post" action="/repair" id="myForm" enctype="multipart/form-data" class="bg-white">
                                @csrf
                                <div class="form-row">
                                    <div class="form-group col-md-1">
                                        <label>Numero</label>
                                        <input type="text" name="repair_no" id="repair_no"
                                            class="form-control form-control-sm text-center text-white" value="{{ $repair_no }}"
                                            readonly style="background-color: #030335e8">
                                    </div>
                                </div>
                                <div class="form-row py-2">    
                                    <div class="form-group col-md-3">
                                        <label for="admission">Ingreso</label> 
                                          <input type="text" name="admission" id="admission"
                                        class="form-control form-control-sm" placeholder="Fecha De Ingreso" readonly>
                                     </div>

                                    <div class="form-group col-md-3">
                                        <label for="laboratory">Envio Laboratorio</label>
                                        <input type="text" name="labsent" id="labsent" class="form-control form-control-sm"
                                        placeholder="Envio a Laboratorio" readonly>
                                    </div>

                                    <div class="form-group col-md-3">
                                        <label for="laboratory">Devolucion Laboratorio</label>
                                        <input type="text" name="labreturn" id="labreturn"
                                        class="form-control form-control-sm" placeholder="Devolución Laboratorio" readonly>
                                    </div>

                                    <div class="form-group col-md-3">
                                        <label for="laboratory">Entrega Cliente</label>
                                        <input type="text" name="deliver" id="deliver" class="form-control form-control-sm"
                                        placeholder="Entrega al Cliente" readonly>
                                    </div>
                                </div>

                        <div class="form-row py-3">
                            <div class="form-group col-md-3">
                                <label for="laboratory">Nombre Laboratorio</label>
                                <input type="text" name="laboratory" id="laboratory"
                                    class="form-control form-control-sm" placeholder="Nombre Laboratorio">
                            </div>
                        </div>
                        <div class="form-row py-3">
                            <div class="form-group col-md-3">
                                <label for="producto">Producto</label>
                                <input type="text" name="producto" id="producto"
                                    class="form-control form-control-sm">
                            </div>
                            <div class="form-group col-md-3">
                                <label for="modelo">Modelo</label>
                                <input type="text" name="modelo" id="modelo"
                                    class="form-control form-control-sm">
                            </div>
                            <div class="form-group col-md-3">
                                <label for="marca">Marca</label>
                                <input type="text" name="marca" id="marca"
                                    class="form-control form-control-sm">
                            </div>
                            <div class="form-group col-md-2">
                                <label for="serial">Numero de Serie</label>
                                <input type="text" name="serial" id="serial"
                                    class="form-control form-control-sm">
                            </div>
                        </div>    
                        
                        <div class="form-row">
                            <div class="form-group col-md-2">
                                <label for="labcost">Costo Laboratorio</label>
                                <input type="decimal" name="labcost" id="labcost"
                                    class="form-control form-control-sm">
                            </div>

                            <div class="form-group col-md-2">
                                <label for="repaircost">Repuesto</label>
                                <input type="decimal" name="repaircost" id="repaircost"
                                    class="form-control form-control-sm">
                            </div>

                            <div class="form-group col-md-2">
                                <label for="transportcost">Transporte</label>
                                <input type="decimal" name="transportcost" id="transportcost"
                                    class="form-control form-control-sm">
                            </div>

                            <div class="form-group col-md-2">
                                <label for="markup">Mark Up</label>
                                <input type="decimal" name="markup" id="markup"
                                    class="form-control form-control-sm">
                            </div>
                        
                            <div class="form-group col-md-2">
                                <label for="repair_total">Total</label>
                                <input type="decimal" name="repair_total" id="repair_total" value="0"
                                    class="form-control form-control-sm text-white" style="background:#030335e8">
                            </div> 
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-4">
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
                                <input type="submit" value="Agregar" class="btn btn-md text-white" style="background:#030335e8">
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
        format: 'yy-mm-dd'
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
