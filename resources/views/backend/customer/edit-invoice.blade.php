@extends('backend.layouts.master')
@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper bg-white">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
              <h1 class="font-weight-lighter">Administrar Clientes</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
              <li class="breadcrumb-item active">Clientes</li>
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
            <div class="card">
              <div class="card-header">
                 <h3 class="p-1 font-weight-light">Editar Factura {{ $payment['invoice']['invoice_no'] }}
                     <a class="btn btn-success float-right btn-sm" href="{{ route('customers.credit') }}">
                         <i class="fa fa-list p-2"></i>Facturas</a>
                 </h3>
                </div>
              </div><!-- /.card-header -->
              <div class="card-body">
                <table width="100%">
                    <tbody>
                        <tr>
                            <td colspan="3"><strong>Informacion del Cliente</strong></td>
                        </tr>
                      <tr>
                        <td width="30%"><strong>Cliente : </strong>{{ $payment['customer']['name'] }}</td>
                        <td width="30%"><strong>Telefono : </strong>{{ $payment['customer']['mobile_no'] }}</td>
                        <td width="40%"><strong>Direccion : </strong>{{ $payment['customer']['address'] }}</td>
                      </tr>
                    </tbody>
                </table>
                  <form method="POST" action="{{ route('customers.update.invoice', $payment->invoice_id) }}" id="myForm">
                    @csrf
                    <table border="1" width="100%" style="margin-bottom: 10px">
                        <thead>
                            <tr class="text-center">
                                <th>SL.</th>
                                <th>Categoria</th>
                                <th>Producto</th>
                                <th>Cantidad</th>
                                <th>Precio Unitario</th>
                                <th>Precio Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $total_sum = '0';
                            $invoice_details = App\Model\InvoiceDetail::where('invoice_id', $payment->invoice_id)->get();
                            @endphp
                            @foreach ($invoice_details as $key => $details)
                            <tr class="text-center">
                                <td>{{ $key+1 }}</td>
                                <td>{{ $details['category']['name'] }}</td>
                                <td>{{ $details['product']['name']}}</td>
                                <td>{{ $details->selling_qty }}</td>
                                <td>{{ $details->unit_price }}</td>
                                <td>{{ $details->selling_price }}</td>
                            </tr>
                            @php
                            $total_sum += $details->selling_price;
                            @endphp
                            @endforeach
                            <tr>
                                <td colspan="5" class="text-right"><strong>Sub Total</strong></td>
                                <td class="text-center"><strong>{{ $total_sum }}</strong></td>
                            </tr>
                            <tr>
                                <td colspan="5" class="text-right">Descuento</td>
                                <td class="text-center"><strong>{{ $payment->discount_amount }}</strong></td>
                            </tr>
                            <tr>
                                <td colspan="5" class="text-right">Monto Pagado</td>
                                <td class="text-center"><strong>{{ $payment->paid_amount }}</strong></td>
                            </tr>
                            <tr>
                                <td colspan="5" class="text-right">Monto Adeudado</td>
                                <input type="hidden" name="new_paid_amount" value="{{ $payment->due_amount }}">
                                <td class="text-center"><strong>{{ $payment->due_amount }}</strong></td>
                            </tr>
                            <tr>
                                <td colspan="5" class="text-right"><strong>Total</strong></td>
                                <td class="text-center"><strong>{{ $payment->total_amount }}</strong></td>
                            </tr>
                        </tbody>   
                    </table> 
                    <div class="row">
                        <div class="form-group col-md-3">
                            <label>Estado de Pago</label>
                            <select name="paid_status" id="paid_status" class="form-control form-control-sm">
                              <option value="">Seleccionar Estado</option>
                              <option value="full_paid">Pago Completo</option>
                              <option value="partial_paid">Pago Parcial</option>
                            </select>
                            <input type="text" name="paid_amount" class="form-control form-control-sm paid_amount" placeholder="Ingresar Monto Pagado" style="display:none;">
                          </div>
                          <div class="form-group col-md-3">
                            <label>Fecha</label>
                            <input type="text" name="date" id="date" class="form-control datepicker form-control-sm" 
                            placeholder="DD-MM-YYY" readonly>
                          </div>
                          <div class="form-group col-md-3" style="padding-top: 30px;">
                              <button type="submit" class="btn btn-primary btn-sm">Actualizar Factura</button>
                          </div>
                    </div>
                  </form>
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
  
<script type="text/javascript">
  $(document).on('change','#paid_status',function(){
   //Estado de Pago
    var paid_status = $(this).val();
    if(paid_status == 'partial_paid'){
      $('.paid_amount').show();
    }else{
      $('.paid_amount').hide();
    }
});
</script>
<script>
    $('.datepicker').datepicker({
        uiLibrary: 'bootstrap4',
        format :'yyyy-mm-dd'
    });
</script>
<script type="text/javascript">
    $(document).ready(function (){
      $('#myForm').validate({
        rules:{
          paid_status: {
            required: true,
          },
          date: {
            required:true,
          }
        },
        messages: {
               
        },
        errorElement: 'span',
        errorPlacement: function(error, element){
          error.addClass('invalid-feedback');
          element.closest('.form-group').append(error);
        },
        highlight: function (element, errorClass, validClass){
          $(element).addClass('is-invalid');
        },
        unhighlight: function (element, errorClass, validClass){
          $(element).removeClass('is-invalid');
        }
      });
    });
    </script>
@endsection
 