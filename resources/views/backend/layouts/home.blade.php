  @extends('backend.layouts.master')
  @section('content')
  <style>
    .small-box{
background-image: linear-gradient(200deg, #070525e1 1%, rgba(1, 0, 5, 0.932)100%);
 
    }
  </style>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Main content -->
      <section class="content bg-white">
        <div class="container-fluid">
          <!-- Small boxes (Stat box) -->
          <div class="row mt-4">
                <!-- ./col -->
                <div class="col-md-6 py-4">
                  <!-- small box -->
                  <div class="small-box ">
                    <div class="inner">
                      <h3 class="text-white">Tareas</h3>
      
                      <a class="text-white" href="{{ route('duty.index') }}"><p>Ver Tareas</p></a>
                    </div>
                    <div class="icon">
                      <i class="fa fa-edit text-white"></i>
                    </div>
                    <a href="{{ route('duty.create') }}" class="small-box-footer text-white bg-white"> Nueva Tarea <i class="fas fa-arrow-circle-up"></i></a>
                  </div>
                </div>
                <!-- ./col -->

                

                <div class="col-md-6 py-4">
                  <!-- small box -->
                  <div class="small-box ">
                    <div class="inner">
                      <h3 class="text-white">Agenda</h3>
      
                      <a class="text-white" href="{{ route('customers.view') }}"><p>Ver Agenda</p></a>
                    </div>
                    <div class="icon">
                      <i class="fa fa-address-book text-white" aria-hidden="true"></i>
                    </div>
                    <a href="{{ route('customers.add') }}" class="small-box-footer text-white bg-white"> Nuevo Contacto <i class="fas fa-arrow-circle-up"></i></a>
                  </div>
                </div>

  
            <!-- ./col -->
            <div class="col-md-6 py-4">
              <!-- small box -->
              <div class="small-box ">
                <div class="inner">
                  <h3 class="text-white">Compras</h3>
  
                  <a class="text-white" href="{{ route('purchase.view') }}"><p>Ver Compras</p></a>
                </div>
                <div class="icon">
                  <i class="ion ion-card text-white"></i>
                </div>
                <a href="{{ route('purchase.add') }}" class="small-box-footer text-white bg-white"> Nueva Compra <i class="fas fa-arrow-circle-up"></i></a>
              </div>
            </div>
            <!-- ./col -->



            <div class="col-md-6 py-4">
              <!-- small box -->
              <div class="small-box ">
                <div class="inner">
                  <h3 class="text-white">Ventas<sup style="font-size: 20px"></sup></h3>
  
                  <a class="text-white" href="{{ route('invoice.view') }}"><p>Ver Ventas</p></a>
                </div>
                <div class="icon">
                  <i class="ion ion-stats-bars text-white"></i>
                </div>
                <a href="{{ route('invoice.add') }}" class="small-box-footer text-white bg-white"> Nuevo Presupuesto <i class="fas fa-arrow-circle-up"></i></a>
              </div>
            </div>

            <div class="col-md-4 py-5">
              <!-- small box -->
              <div class="small-box ">
                <div class="inner">
                  <h3 class="text-white">Reparaciones</h3>
  
                 <a class="text-white" href="{{ route('repair.index') }}"><p>Ver Reparaciones</p></a> 
                </div>
                <div class="icon">
                  <i class="fa fa-wrench text-white" aria-hidden="true"></i>
                </div>
                <a href="{{ route('repair.create') }}" class="small-box-footer text-white bg-white"> Nueva Reparacion <i class="fas fa-arrow-circle-up"></i></a>
              </div>
            </div>

            
            <div class="col-md-4 py-5">
              <!-- small box -->
              <div class="small-box ">
                <div class="inner">
                  <h3 class="text-white">Productos</h3>

                 <a class="text-white" href="{{ route('products.view') }}"><p>Ver Productos</p></a> 
                </div>
                <div class="icon">
                  <i class="ion ion-bag text-white"></i>
                </div>
                <a href="{{ route('products.add') }}" class="small-box-footer text-white bg-white"> Nuevo Producto <i class="fas fa-arrow-circle-up"></i></a>
              </div>
            </div>
            <!-- ./col -->

            <div class="col-md-4 py-5">
              <!-- small box -->
              <div class="small-box ">
                <div class="inner">
                  <h3 class="text-white">Categorias</h3>

                 <a class="text-white" href="{{ route('categories.view') }}"><p>Ver Categorias</p></a> 
                </div>
                <div class="icon">
                  <i class="ion ion-bag text-white"></i>
                </div>
                <a href="{{ route('categories.add') }}" class="small-box-footer text-white bg-white"> Nueva Categoria <i class="fas fa-arrow-circle-up"></i></a>
              </div>
            </div>
            <!-- ./col -->
          <!-- /.row (main row) -->
        </div><!-- /.container-fluid -->
      </section>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->     
  @endsection
