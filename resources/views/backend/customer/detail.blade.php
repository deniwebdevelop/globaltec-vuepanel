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
                        <li class="breadcrumb-item">Cliente</li>
                        <li class="breadcrumb-item">Editar</li>
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
                    <h3 class="font-weight-lighter text-white">Editar
                        <a href="{{ route('customers.view') }}" class="btn bg-white float-right btn-sm">
                          <i class="fa fa-list"></i>
                            Lista de Clientes
                        </a>
                    </h3>
                </div><!-- /.Card Header -->
                <div class="card-body">
                    <form method="get" action="{{ route('customers.view')}}" id="myForm" enctype="multipart/form-data">
                        @csrf
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="name">Nombre del Cliente</label>
                            <input type="text" name="name" value="{{ $detailData->name }}" class="form-control" readonly>
                        </div>
                        <div class="form-group col-md-6">
                          <label for="company">Empresa</label>
                          <input type="text" name="company" value="{{ $detailData->company }}" class="form-control" readonly>
                      </div>
                        <div class="form-group col-md-6">
                            <label for="mobile_no">Telefono</label>
                            <input type="text" name="mobile_no" value="{{ $detailData->mobile_no }}" class="form-control" readonly>
                        </div>
                        <div class="form-group col-md-6">
                          <label for="mobile_two">Telefono 2</label>
                          <input type="text" name="mobile_two" value="{{ $detailData->mobile_two}}" class="form-control" readonly>
                        </div>
                        <div class="form-group col-md-6">
                          <label for="mobile_three">Telefono 3</label>
                          <input type="text" name="mobile_three" value="{{ $detailData->mobile_three }}" class="form-control" readonly>
                      </div>
                        <div class="form-group col-md-6">
                            <label for="email">Email</label>
                            <input type="email" name="email" value="{{ $detailData->email }}" class="form-control" readonly>
                        </div>
                        <div class="form-group col-md-6">
                          <label for="position">Puesto</label>
                          <input type="text" name="position" value="{{ $detailData->position }}" class="form-control" readonly>
                      </div>
                      <div class="form-group col-md-6">
                        <label for="country">Pais</label>
                        <input type="text" name="country" value="{{ $detailData->country }}" class="form-control" readonly>
                    </div>
                        <div class="form-group col-md-6">
                            <label for="state">Provincia | Estado</label>
                            <input type="text" name="address" value="{{ $detailData->state }}" class="form-control" readonly>
                        </div>
                      <div class="form-group col-md-6">
                        <label for="city">Ciudad</label>
                        <input type="text" name="city" value="{{ $detailData->city }}" class="form-control" readonly>
                    </div>
                        <div class="form-group col-md-6">
                            <label for="address">Direccion</label>
                            <input type="text" name="address" value="{{ $detailData->address }}" class="form-control" readonly>
                        </div>
                        <div class="form-group col-md-6">
                          <label for="postal">Codigo Postal</label>
                          <input type="text" name="postal" value="{{ $detailData->postal }}" class="form-control" readonly>
                      </div>
                      <div class="form-group col-md-6">
                        <label for="cuit">Cuit</label>
                        <input type="text" name="cuit" value="{{ $detailData->cuit }}" class="form-control" readonly>
                    </div>
                    <div class="form-group col-md-6">
                      <label for="website">Website</label>
                      <input type="text" name="website" value="{{ $detailData->website }}" class="form-control" readonly>
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