@extends('backend.layouts.master')
@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper bg-white">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
              <li class="breadcrumb-item active">Ventas</li> 
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
            <div class="card" style="background-image: linear-gradient(200deg, #070525ce 1%, rgb(1, 0, 5)100%);">
              <div class="card-header">
                 <h3 class="font-weight-light text-white">Ventas
                    <a class="btn bg-white float-right btn-sm"
                    href="{{ route('invoice.add') }}"><i class="fa fa-plus-circle"></i> Nuevo Presupuesto</a>
                 </h3>
                </div>
              </div><!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>Numero</th>
                            <th>Fecha</th>
                            <th>Cliente</th>
                            <th>Descripcion</th>
                            <th>Monto</th>
                        </tr>
                    </thead>
                    <tbody>
                      @foreach ($allData as $key => $invoice)
                      <tr>
                        <td>Factura Numero{{ $invoice->invoice_no}}</td>
                        <td>{{ date('d-m-Y'),strtotime($invoice->date) }}</td>
                        <td>{{ $invoice['payment']['customer']['name'] }}
                            ({{ $invoice['payment']['customer']['mobile_no'] }} - {{ $invoice['payment']['customer']['address'] }})
                        </td>
                        <td>{{ $invoice->description }}</td>
                        <td>{{ $invoice['payment']['total_amount'] }}</td>
                    </tr>                          
                      @endforeach
                    </tbody>
                </table>
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
@endsection