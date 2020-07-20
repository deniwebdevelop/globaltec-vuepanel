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
                 </h3>
                </div>
              </div><!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-striped">
                    <thead>
                        <tr>
                             <th>Presupuesto Nro</th>
                            <th>Cliente</th>
                            <th>Empresa</th>
                        
                            <th>Fecha</th>
                            <th>Condicion De pago</th>
                            <th>Vigencia</th>
                            <th>Monto</th>
                            <th>Estado de Pago</th>
                            <th>PDF</th>
                        </tr>
                    </thead>
                    <tbody>
                      @foreach ($allData as $key => $invoice)
                      <tr>
                        <td>{{ $invoice->invoice_no}}</td>
                        <td>{{ $invoice['payment']['customer']['name'] }}</td>
                         <td>  {{ $invoice['payment']['customer']['company'] }} </td> 
                        </td>
 
                        <td>{{ date('d-m-Y'),strtotime($invoice->date) }}</td>
                        <td>{{ $invoice->payment_condition }}</td>
                        <td>{{ $invoice->description }}</td>
                        <td>{{ number_format($invoice['payment']['total_amount'], 2) }}</td>
                        <td>
                            @if($invoice['payment']['paid_status'] =='partial_paid')
                          <a href="{{ route('customers.credit') }}"><span style="color: #d61b0d;padding:5px">Monto Parcial Pendiente</span></a>
                            @elseif($invoice['payment']['paid_status'] =='full_paid')
                           <a href="{{ route('customers.paid') }}"><span style="color: #5EAB00;padding:5px">Pagada</span></a> 
                            @elseif($invoice['payment']['paid_status'] =='full_due')
                            <a href="{{ route('customers.credit') }}"><span style="color: #d61b0d;padding:5px">Monto Total Pendiente</span></a>
                            @endif
                          </td>
                          <td>   <a title="details" class="btn btn-sm btn-success" href="{{ route('invoice.details.pdf',$invoice['payment']['invoice_id']) }}" target="_blank">
                            <i class="fa fa-eye"></i></a></td>
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