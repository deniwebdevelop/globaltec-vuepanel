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

                    <h3 class="font-weight-lighter">Detalle Reparacion
                        <a href="{{ route('repair.index') }}" class="btn bg-white float-right btn-sm">
                            <i class="fa fa-list"></i>
                           Lista de Reparaciones
                        </a>
                    </h3>
                </div><!-- /.Card Header -->
                <div class="card-body">
                    <form method="post" action="{{ route('repair.update',$reviewData->id) }}" id="myForm" enctype="multipart/form-data">
                        @csrf
                    <div class="form-row text-center">
                        <div class="form-group col-md-3 mb-5">
                            <label for="repair_no">Numero</label>
                              <input type="text" name="admission" id="repair_no" value="{{ $reviewData->repair_no }}"
                            class="form-control form-control-sm bg-gradient-navy text-white text-center" placeholder="Nro" readonly>
                         </div>
                    </div>
                    <div class="form-row text-center">
                        <div class="form-group col-md-3">
                            <label for="admission">Ingreso</label>
                              <input type="text" name="admission" id="admission" value="{{ $reviewData->admission }}"
                            class="form-control form-control-sm text-center" placeholder="Fecha De Ingreso" readonly>
                         </div>

                        <div class="form-group col-md-3">
                            <label for="laboratory">Envio Laboratorio</label>
                            <input type="text" name="labsent" id="labsent" class="form-control form-control-sm text-center" value="{{ $reviewData->labsent }}"
                            placeholder="Envio a Laboratorio" readonly>
                        </div>

                        <div class="form-group col-md-3">
                            <label for="laboratory">Devolucion Laboratorio</label>
                            <input type="text" name="labreturn" id="labreturn" value="{{ $reviewData->labreturn }}"
                            class="form-control form-control-sm text-center" placeholder="Devolución Laboratorio" readonly>
                        </div>

                        <div class="form-group col-md-3">
                            <label for="laboratory">Entrega Cliente</label>
                            <input type="text" name="deliver" id="deliver" class="form-control form-control-sm text-center" value="{{ $reviewData->deliver }}"
                            placeholder="Entrega al Cliente" readonly>
                        </div>
                    </div>
                    <div class="form-row text-center mt-5">
                        <div class="form-group col-md-3">
                            <label for="laboratory">Laboratorio</label>
                            <input type="text" name="laboratory" value="{{ $reviewData->laboratory }}" class="form-control form-control-sm" readonly>
                        </div>
                   
                
                        <div class="form-group col-md-3">
                            <label for="product_id">Modelo</label>
                            <select name="product_id" class="form-control select2">
                              <option value="">Seleccionar</option>
                              @foreach ($products as $data)
                              <option value="{{ $data->id }}" {{ ($reviewData->product_id==$data->id)?"selected":'' }}>{{ $data->brand }} - {{ $data->model }}</option>
                              @endforeach
                            </select>
                        </div>


                    <div class="form-group col-md-3">
                        <label for="serial_number">S/N</label>
                        <input type="text" name="serial_number" id="serial_number" class="form-control form-control-sm" value="{{ $reviewData->serial_number }}" readonly>
                      </div> 

                      <div class="form-group col-md-3">
                        <label>Accesorios</label>
                        <input type="text" name="accesories" id="accesories" class="form-control form-control-sm" value="{{ $reviewData->accesories }}" readonly>
                      </div> 
                    </div>
       
                      <div class="form-row text-center mt-5">
                    <div class="form-group col-md-3">
                        <label>Repuesto 1</label>
                        <input type="text" name="spare_1" id="spare_1" class="form-control form-control-sm" value="{{ $reviewData->spare_1 }}" readonly>
                    </div> 
                    
                    <div class="form-group col-md-2">
                        <label>Repuesto 2</label>
                        <input type="text" name="spare_2" id="spare_2" class="form-control form-control-sm" value="{{ $reviewData->spare_2 }}" readonly>
                    </div> 
                
                    <div class="form-group col-md-2">
                        <label>Repuesto 3</label>
                        <input type="text" name="spare_3" id="spare_3" class="form-control form-control-sm" value="{{ $reviewData->spare_3 }}" readonly>
                    </div> 
                   
                    <div class="form-group col-md-2">
                        <label>Repuesto 4</label>
                        <input type="text" name="spare_4" id="spare_4" class="form-control form-control-sm" value="{{ $reviewData->spare_4 }}" readonly>
                    </div> 
                   
                    <div class="form-group col-md-3">
                        <label>Repuesto 5</label>
                        <input type="text" name="spare_5" id="spare_5" class="form-control form-control-sm" value="{{ $reviewData->spare_5 }}" readonly>
                    </div> 
                </div>

  
                    <div class="form-row text-center mt-5">
                        <div class="form-group col-md-3">
                            <label for="labcost">Laboratorio</label>
                            <input type="decimal" name="labcost" value="{{ $reviewData->labcost }}" class="form-control form-control-sm" readonly>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="repaircost">Repuesto</label>
                            <input type="decimal" name="repaircost" value="{{ $reviewData->repaircost }}" class="form-control form-control-sm" readonly>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="transportcost">Transporte</label>
                            <input type="decimal" name="transportcost" value="{{ $reviewData->transportcost }}" class="form-control form-control-sm" readonly>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="markup">MarkUp</label>
                            <input type="decimal" name="markup" value="{{ $reviewData->markup }}" class="form-control form-control-sm" readonly>
                        </div>
                    </div>
              
                    <div class="form-row mt-5">
                        <div class="form-group col-md-12">
                            <label for="fail_description">Descripcion Falla</label>
                            <input type="text" name="fail_description" id="fail_description" class="form-control" value="{{ $reviewData->fail_description }}" readonly>
                        </div>
                        <div class="form-group col-md-12">
                            <label for="repair_description">Descripcion Reparacion</label>
                            <input type="text" name="repair_description" class="form-control " id="repair_description" value="{{ $reviewData->repair_description }}" readonly>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="status">Estado</label>
                      <input type="text" name="status" value="{{ $reviewData->status }}" class="form-control" readonly>
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
@endsection