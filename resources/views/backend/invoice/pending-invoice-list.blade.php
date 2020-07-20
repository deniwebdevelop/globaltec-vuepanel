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
              <li class="breadcrumb-item active">Presupuestos</li> 
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
                <h3 class="font-weight-light text-white">Presupuestos
                  <a class="btn bg-white float-right btn-sm"
                  href="{{ route('invoice.add') }}"><i class="fa fa-plus-circle"></i> Nuevo Presupuesto</a>
               </h3>
                </div>
              </div><!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-striped">
                    <thead>
                        <tr>
                          <th>Numero</th>
                            <th>Cliente</th>
                            <th>Empresa</th>
                            <th>Fecha</th>
                            <th>Condicion Pago</th>
                            <th>Vigencia</th>
                            <th>Monto</th>
                            
                            <th>Estado de Venta</th>
                            <th>Accion</th>
                            <th>PDF</th>
                        </tr>
                    </thead>
                    <tbody>
                      @foreach ($allData as $key => $invoice)
                      <tr>
                        <td class="text-center">{{ $invoice->invoice_no}}</td>
                        <td>{{ $invoice['payment']['customer']['name'] }}</td>
                        <td>  {{ $invoice['payment']['customer']['company'] }}</td>
                        <td>{{ date('d-m-Y'),strtotime($invoice->date) }}</td>
                        <td>{{ $invoice->payment_condition }}</td>
                        <td>{{ $invoice->description }}</td>
                        <td>{{ number_format($invoice['payment']['total_amount'], 2) }}</td>
                        <td>
                            @if($invoice->status=='0')
                            <span style="color: #FC4236;padding:5px">Pendiente de Venta</span>
                            @elseif($invoice->status=='1')
                            <span style="color: #5EAB00;pagging:5px">Venta Generada</span>
                            @endif
                        </td>
                        <td>
                            <a title="Edit" class="btn btn-sm btn-primary" href="{{ route('customers.edit.invoice', $invoice['payment']['invoice_id']) }}"><i
                              class="fa fa-edit"></i></a>
                            @if($invoice->status=='0')
                            <a title="Venta" class="btn btn-sm btn-success" href="{{ route('invoice.approve', $invoice->id) }}"><i
                            class="fa fa-check-circle"></i></a>
                            <a title="Delete" id="delete" class="btn btn-sm btn-danger" href="{{ route('invoice.delete', $invoice->id) }}"><i
                            class="fa fa-trash"></i></a>
                            @endif
                          </td>
                          <td>  
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