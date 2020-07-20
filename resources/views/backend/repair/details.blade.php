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
                    <div class="form-row">
                        <div class="form-group col-md-1">
                            <label for="repair_no">Numero</label>
                            <input type="text" name="repair_no" id="repair_no"
                            class="form-control form-control-sm text-center text-white" value="{{ $reviewData->repair_no }}"
                            readonly style="background-color: #030335e8">
                         </div>
                    </div>

                    <div class="form-row py-2">
                        <div class="form-group col-md-2">
                            <label for="admission">Ingreso</label>
                              <input type="text" name="admission" id="admission" value="{{ $reviewData->admission }}"
                            class="form-control form-control-sm" placeholder="Fecha De Ingreso" readonly>
                         </div>

                        <div class="form-group col-md-2">
                            <label for="laboratory">Envio Laboratorio</label>
                            <input type="text" name="labsent" id="labsent" class="form-control form-control-sm" value="{{ $reviewData->labsent }}"
                            placeholder="Envio a Laboratorio" readonly>
                        </div>

                        <div class="form-group col-md-2">
                            <label for="laboratory">Devolucion Laboratorio</label>
                            <input type="text" name="labreturn" id="labreturn" value="{{ $reviewData->labreturn }}"
                            class="form-control form-control-sm" placeholder="Devolución Laboratorio" readonly>
                        </div>

                        <div class="form-group col-md-2">
                            <label for="laboratory">Entrega Cliente</label>
                            <input type="text" name="deliver" id="deliver" class="form-control form-control-sm" value="{{ $reviewData->deliver }}"
                            placeholder="Entrega al Cliente" readonly>
                        </div>
                    </div>

                    <div class="form-row py-3">
                        <div class="form-group col-md-2">
                            <label for="laboratory">Nombre Laboratorio</label>
                            <input type="text" name="laboratory" value="{{ $reviewData->laboratory }}" class="form-control form-control-sm" readonly>
                        </div>
                   
                 <div class="form-group col-md-3">
                            <label>Producto</label>
                            <select name="product_id" id="product_id" class="form-control form-control-sm" readonly>
                              <option value="">Seleccionar Producto</option>
                              @foreach($products as $data)
                
                              <option value="{{ $data->id }}" {{ ($reviewData->product_id==$data->id)?"selected":'' }}>{{ $data->model }}</option>
                            @endforeach
                       
                            </select>
                          </div> 


                    <div class="form-group col-md-2">
                        <label for="serial_number">S/N</label>
                        <input type="text" name="serial_number" id="serial_number" class="form-control form-control-sm" value="{{ $reviewData->serial_number }}" readonly>
                      </div> 

                      <div class="form-group col-md-2">
                        <label>Accesorios</label>
                        <input type="text" name="accesories" id="accesories" class="form-control form-control-sm" value="{{ $reviewData->accesories }}" readonly>
                      </div> 
                    </div>
       
                      <div class="form-row">
                    <div class="form-group col-md-2">
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
                   
                    <div class="form-group col-md-2">
                        <label>Repuesto 5</label>
                        <input type="text" name="spare_5" id="spare_5" class="form-control form-control-sm" value="{{ $reviewData->spare_5 }}" readonly>
                    </div> 
                </div>

  
                    <div class="form-row text-center">
                        <div class="form-group col-md-1">
                            <label for="labcost">Laboratorio</label>
                            <input type="decimal" name="labcost" value="{{ $reviewData->labcost }}" class="form-control form-control-sm" readonly>
                        </div>
                        <div class="form-group col-md-1">
                            <label for="labcost_coin">Moneda</label>
                   <input class="form-control form-control-sm text-center" type="text" id="labcost_coin" name="labcoist_coin" value="{{ $reviewData->transportcost_coin }}" readonly>
                        </div>
                        <div class="form-group col-md-1">
                            <label for="repaircost">Repuesto</label>
                            <input type="decimal" name="repaircost" value="{{ $reviewData->repaircost }}" class="form-control form-control-sm" readonly>
                        </div>
                        <div class="form-group col-md-1">
                            <label for="repaircost_coin">Moneda</label>
                   <input class="form-control form-control-sm text-center" type="text" id="repaircost_coin" name="repaircost_coin" value="{{ $reviewData->transportcost_coin }}" readonly>
                        </div>
                        <div class="form-group col-md-2">
                            <label for="transportcost">Transporte</label>
                            <input type="decimal" name="transportcost" value="{{ $reviewData->transportcost }}" class="form-control form-control-sm" readonly>
                        </div>
                        <div class="form-group col-md-1">
                            <label for="transportcost_coin">Moneda</label>
                   <input class="form-control form-control-sm text-center" type="text" id="transportcost_coin" name="transportcost_coin" value="{{ $reviewData->transportcost_coin }}" readonly>
                        </div>
                        <div class="form-group col-md-2">
                            <label for="markup">MarkUp</label>
                            <input type="decimal" name="markup" value="{{ $reviewData->markup }}" class="form-control form-control-sm" readonly>
                        </div>
                        <div class="form-group col-md-1">
                            <label for="markup_coin">Moneda</label>
                   <input class="form-control form-control-sm text-center" type="text" id="markup_coin" name="markup_coin" value="{{ $reviewData->transportcost_coin }}" readonly>
                        </div>
                    </div>
              
                    <div class="form-row mt-2">
                        <div class="form-group col-md-12">
                            <label for="fail_description">Descripcion Falla</label>
                            <input type="text" name="fail_description" id="fail_description" class="form-control form-control-sm" value="{{ $reviewData->fail_description }}" readonly>
                        </div>
                        <div class="form-group col-md-12">
                            <label for="repair_description">Descripcion Reparacion</label>
                            <input type="text" name="repair_description" class="form-control form-control-sm" id="repair_description" value="{{ $reviewData->repair_description }}" readonly>
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