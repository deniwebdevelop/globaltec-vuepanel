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
              <li class="breadcrumb-item active">Clientes</li>
              <li class="breadcrumb-item active">Pago Pendiente</li>
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
                 <h3 class="font-weight-light text-white">Pago Pendiente
                     <a class="btn bg-white float-right btn-sm" href="{{ route('customers.credit.pdf') }}" target="_blank"><i class="fa fa-download"></i> Descargar PDF</a>
                 </h3>
                </div>
              </div><!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-hover">
                    <thead class="thead">
                        <tr>
                            <th>Codigo</th>
                            <th>Cliente</th>
                            <th>Numero Factura</th>
                            <th>Fecha</th>
                            <th>Monto</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                      @php
                          $total_due = '0';
                      @endphp
                    @foreach($allData as $key => $payment)
                        <tr>
                            <td>{{$key+1}}</td>
                            <td>
                                {{$payment['customer']['name']}}
                                {{$payment['customer']['mobile_no']}}-{{ $payment['customer']['address'] }}
                            </td>
                            <td>{{$payment['invoice']['invoice_no'] }}</td>
                            <td>{{date('d-m-Y', strtotime($payment['invoice']['date']))}}</td>
                            <td>{{$payment->due_amount}}</td>
                            <td>
                                <a title="Edit" class="btn btn-sm btn-primary" href="{{ route('customers.edit.invoice', $payment->invoice_id) }}"><i
                                class="fa fa-edit"></i></a>
                                <a title="details" class="btn btn-sm btn-success" href="{{ route('invoice.details.pdf',$payment->invoice_id) }}" target="_blank"><i
                                    class="fa fa-eye"></i></a>
                            </td>
                            @php
                                $total_due += $payment->due_amount;
                            @endphp
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <table class="table table-bordered table-hover">
                  <tbody>
                    <td colspan="4" style="text-align: right;font-weight:bold;">Total</td>
                    <td><strong>{{ $total_due }} Ars</strong></td>
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
 