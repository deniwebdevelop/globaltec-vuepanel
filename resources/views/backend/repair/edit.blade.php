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
                    <form method="post" action="{{ route('repair.update',$editData->id) }}" id="myForm" enctype="multipart/form-data">
                        @csrf
                    <div class="form-row text-center">
                        <div class="form-group col-md-3">
                            <label for="admission">Ingreso</label>
                              <input type="text" name="admission" id="admission" value="{{ $editData->admission }}"
                            class="form-control form-control-sm" placeholder="Fecha De Ingreso" readonly>
                         </div>

                        <div class="form-group col-md-3">
                            <label for="laboratory">Envio Laboratorio</label>
                            <input type="text" name="labsent" id="labsent" class="form-control form-control-sm" value="{{ $editData->labsent }}"
                            placeholder="Envio a Laboratorio" readonly>
                        </div>

                        <div class="form-group col-md-3">
                            <label for="laboratory">Devolucion Laboratorio</label>
                            <input type="text" name="labreturn" id="labreturn" value="{{ $editData->labreturn }}"
                            class="form-control form-control-sm" placeholder="Devolución Laboratorio" readonly>
                        </div>

                        <div class="form-group col-md-3">
                            <label for="laboratory">Entrega Cliente</label>
                            <input type="text" name="deliver" id="deliver" class="form-control form-control-sm" value="{{ $editData->deliver }}"
                            placeholder="Entrega al Cliente" readonly>
                        </div>
                    </div>
                    <div class="form-row text-center mt-5">
                        <div class="form-group col-md-2 offset-2">
                            <label for="laboratory">Laboratorio</label>
                            <input type="text" name="laboratory" value="{{ $editData->laboratory }}" class="form-control form-control-sm">
                        </div>
                   
                    <div class="form-group col-md-2">
                        <label for="product_id">Producto</label>
                        <select name="product_id" class="form-control form-control-sm">
                          <option value="">Seleccionar</option>
                          @foreach ($products as $product)
                          <option value="{{ $product->id }}" {{ ($editData->product_id==$product->id)?"selected":'' }}>{{ $product->model }}</option>
                          @endforeach
                        </select>
                    </div>

                    <div class="form-group col-md-2">
                        <label for="serial_number">S/N</label>
                        <input type="text" name="serial_number" id="serial_number" class="form-control form-control-sm" value="{{ $editData->serial_number }}">
                      </div> 

                      <div class="form-group col-md-2">
                        <label>Accesorios</label>
                        <input type="text" name="accesories" id="accesories" class="form-control form-control-sm" value="{{ $editData->accesories }}">
                      </div> 
                    </div>
       
                      <div class="form-row text-center mt-5">
                    <div class="form-group col-md-2 offset-1">
                        <label>Repuesto 1</label>
                        <input type="text" name="spare_1" id="spare_1" class="form-control form-control-sm" value="{{ $editData->spare_1 }}">
                    </div> 
                    
                    <div class="form-group col-md-2">
                        <label>Repuesto 2</label>
                        <input type="text" name="spare_2" id="spare_2" class="form-control form-control-sm" value="{{ $editData->spare_2 }}">
                    </div> 
                
                    <div class="form-group col-md-2">
                        <label>Repuesto 3</label>
                        <input type="text" name="spare_3" id="spare_3" class="form-control form-control-sm" value="{{ $editData->spare_3 }}">
                    </div> 
                   
                    <div class="form-group col-md-2">
                        <label>Repuesto 4</label>
                        <input type="text" name="spare_4" id="spare_4" class="form-control form-control-sm" value="{{ $editData->spare_4 }}">
                    </div> 
                   
                    <div class="form-group col-md-2">
                        <label>Repuesto 5</label>
                        <input type="text" name="spare_5" id="spare_5" class="form-control form-control-sm" value="{{ $editData->spare_5 }}">
                    </div> 
                </div>

                <h4 class="font-weight-lighter text-center mt-5">Costos</h4>
                    <div class="form-row text-center">
                        <div class="form-group col-md-2 offset-2">
                            <label for="labcost">Laboratorio</label>
                            <input type="decimal" name="labcost" value="{{ $editData->labcost }}" class="form-control form-control-sm">
                        </div>
                        <div class="form-group col-md-2">
                            <label for="repaircost">Repuesto</label>
                            <input type="decimal" name="repaircost" value="{{ $editData->repaircost }}" class="form-control form-control-sm">
                        </div>
                        <div class="form-group col-md-2">
                            <label for="transportcost">Transporte</label>
                            <input type="decimal" name="transportcost" value="{{ $editData->transportcost }}" class="form-control form-control-sm">
                        </div>
                        <div class="form-group col-md-2">
                            <label for="markup">MarkUp</label>
                            <input type="decimal" name="markup" value="{{ $editData->markup }}" class="form-control form-control-sm">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-3 mt-5">
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