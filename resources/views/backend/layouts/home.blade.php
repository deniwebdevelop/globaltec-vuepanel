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
 
          
            <div class="col-md-3 py-5">
              <!-- small box -->
              <div class="small-box bg-gradient-light">
                <div class="inner">
                  <h3>Proveedores</h3>
  
                  <a class="text-dark" href="{{ route('suppliers.view') }}"><p>Ver Proveedores</p></a>
                </div>
                <div class="icon">
                  <i class="ion ion-person-add text-dark"></i>
                </div>
                <a href="{{ route('suppliers.add') }}" class="small-box-footer text-dark">  Agregar Proveedor  <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <!-- ./col -->
            <div class="col-md-3 py-5">
              <!-- small box -->
              <div class="small-box bg-gradient-light">
                <div class="inner">
                  <h3 class="text-dark">Clientes</h3>
  
                  <a class="text-dark" href="{{ route('customers.view') }}"><p>Ver clientes</p></a>
                </div>
                <div class="icon">
                  <i class="ion ion-person-add text-dark"></i>
                </div>
                <a href="{{ route('customers.add') }}" class="small-box-footer text-dark"> Nuevo Cliente <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>

  
            <!-- ./col -->
            <div class="col-md-3 py-5">
              <!-- small box -->
              <div class="small-box bg-gradient-light">
                <div class="inner">
                  <h3 class="text-dark">Compras</h3>
  
                  <a class="text-dark" href="{{ route('purchase.view') }}"><p>Ver Compras</p></a>
                </div>
                <div class="icon">
                  <i class="ion ion-card text-dark"></i>
                </div>
                <a href="{{ route('purchase.add') }}" class="small-box-footer text-dark"> Nueva Compra <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <!-- ./col -->

            <div class="col-md-3 py-5">
              <!-- small box -->
              <div class="small-box bg-gradient-light">
                <div class="inner">
                  <h3 class="text-dark">Facturacion<sup style="font-size: 20px"></sup></h3>
  
                  <a class="text-dark" href="{{ route('invoice.view') }}"><p>Ver facturas</p></a>
                </div>
                <div class="icon">
                  <i class="ion ion-stats-bars text-dark"></i>
                </div>
                <a href="{{ route('invoice.add') }}" class="small-box-footer text-dark"> Nueva Factura <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>


            <div class="col-md-3 py-5">
              <!-- small box -->
              <div class="small-box bg-gradient-light">
                <div class="inner">
                  <h3 class="text-dark">Productos</h3>
  
                 <a class="text-dark" href="{{ route('products.view') }}"><p>Ver productos</p></a> 
                </div>
                <div class="icon">
                  <i class="ion ion-bag text-dark"></i>
                </div>
                <a href="{{ route('products.add') }}" class="small-box-footer text-dark"> Nuevo Producto <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <!-- ./col -->
            <!-- ./col -->
            <div class="col-md-3 py-5">
              <!-- small box -->
              <div class="small-box bg-gradient-light">
                <div class="inner">
                  <h3 class="text-dark">Stock</h3>
  
                  <a class="text-dark" href="{{ route('stock.report') }}"><p>Ver Stock</p></a>
                </div>
                <div class="icon">
                  <i class="ion ion-social-buffer text-dark"></i>
                </div>
                <a href="{{ route('stock.report') }}" class="small-box-footer text-dark"> Reporte Stock <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>

            <div class="col-md-3 py-5">
              <!-- small box -->
              <div class="small-box bg-gradient-light">
                <div class="inner">
                  <h3>Categorias</h3>
  
                  <a class="text-dark" href="{{ route('categories.view') }}"><p>Ver Categorias</p></a>
                </div>
                <div class="icon">
                  <i class="ion ion-navicon text-dark"></i>
                </div>
                <a href="{{ route('categories.add') }}" class="small-box-footer text-dark">  Agregar Categoria  <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <!-- ./col -->

            <div class="col-md-3 py-5">
              <!-- small box -->
              <div class="small-box bg-gradient-light">
                <div class="inner">
                  <h3>Unidades</h3>
  
                  <a class="text-dark" href="{{ route('units.view') }}"><p>Ver Unidades</p></a>
                </div>
                <div class="icon">
                  <i class="ion ion-ios-photos-outline text-dark"></i>
                </div>
                <a href="{{ route('units.add') }}" class="small-box-footer text-dark">  Agregar Unidad  <i class="fas fa-arrow-circle-right"></i></a>
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
