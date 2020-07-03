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
                <table id="example1" class="table table-striped">
                    <thead>
                        <tr>
                            <th>Cliente</th>
                            <th>Numero</th>
                            <th>Fecha</th>
                            <th>Condicion De pago</th>
                            <th>Descripcion</th>
                            <th>Monto</th>
                            <th width="20%">Estado</th>
                            <th>Accion</th>
                        </tr>
                    </thead>
                    <tbody>
                      @foreach ($allData as $key => $invoice)
                      <tr>
                        <td>{{ $invoice['payment']['customer']['name'] }} - 
                            {{ $invoice['payment']['customer']['company'] }} 
                        </td>
                        <td>{{ $invoice->invoice_no}}</td>
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
                          <td>
                            @if($invoice['payment']['paid_status'] =='partial_paid')
                            <a title="Edit" class="btn btn-sm btn-primary" href="{{ route('customers.edit.invoice', $invoice['payment']['invoice_id']) }}"><i
                              class="fa fa-edit"></i></a>
                              @endif
                              @if($invoice['payment']['paid_status'] =='full_due')
                              <a title="Edit" class="btn btn-sm btn-primary" href="{{ route('customers.edit.invoice', $invoice['payment']['invoice_id']) }}"><i
                                class="fa fa-edit"></i></a>
                                @endif
                            <a title="details" class="btn btn-sm btn-success" href="{{ route('invoice.details.pdf',$invoice['payment']['invoice_id']) }}" target="_blank">
                              <i class="fa fa-eye"></i></a>
                          </td>
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