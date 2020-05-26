  @extends('backend.layouts.master')
  @section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper bg-white">
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0 text-white">Home</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                <li class="breadcrumb-item active">GT Panel</li>
              </ol>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->
  
      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          <!-- Small boxes (Stat box) -->
          <div class="row">
            <div class="col-md-6">
              <!-- small box -->
              <div class="small-box bg-info">
                <div class="inner">
                  <h3>Productos</h3>
  
                 <a class="text-white" href="{{ route('products.view') }}"><p>Ver productos</p></a> 
                </div>
                <div class="icon">
                  <i class="ion ion-bag"></i>
                </div>
                <a href="{{ route('products.add') }}" class="small-box-footer"> Nuevo Producto <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <!-- ./col -->
            <div class="col-md-6">
              <!-- small box -->
              <div class="small-box bg-success">
                <div class="inner">
                  <h3>Facturacion<sup style="font-size: 20px"></sup></h3>
  
                  <a class="text-white" href="{{ route('invoice.view') }}"><p>Ver facturas</p></a>
                </div>
                <div class="icon">
                  <i class="ion ion-stats-bars"></i>
                </div>
                <a href="{{ route('invoice.add') }}" class="small-box-footer"> Nueva Factura <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <!-- ./col -->
            <div class="col-md-6">
              <!-- small box -->
              <div class="small-box bg-warning">
                <div class="inner">
                  <h3>Clientes</h3>
  
                  <a class="text-dark" href="{{ route('customers.view') }}"><p>Ver clientes</p></a>
                </div>
                <div class="icon">
                  <i class="ion ion-person-add"></i>
                </div>
                <a href="{{ route('customers.add') }}" class="small-box-footer"> Nuevo Cliente <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <!-- ./col -->
            <div class="col-md-6">
              <!-- small box -->
              <div class="small-box bg-danger">
                <div class="inner">
                  <h3>Reparaciones</h3>
  
                  <p>Ver Reparaciones</p>
                </div>
                <div class="icon">
                  <i class="ion ion-pie-graph"></i>
                </div>
                <a href="#" class="small-box-footer"> Nueva Reparacion <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <!-- ./col -->
          </div>
          <!-- /.row -->
          <!-- Main row -->
          <div class="row">
            <!-- Left col -->
            <!-- right col -->
          </div>
          <!-- /.row (main row) -->
        </div><!-- /.container-fluid -->
      </section>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->     
  @endsection
