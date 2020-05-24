<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>PDF</title>
  <link rel="stylesheet" href="{{ asset('backend/plugins/tempusdominus-bootstrap-4/css/tempusdominus-boostrap-4-min.css') }}">
</head>
<body>
<div class="container">
  <div class="row">
    <div class="col-md-12">
      <table width="100%">
        <tbody>
          <tr>
            <td><strong>Numero: # {{ $invoice->invoice_no }}</strong></td>
            <td>
              <span style="font-size: 20px;">Global Tec Trade<br/>
              Buenos Aires, Argentina.
              <span>
            </td>
            <td>
            <span>Telefono: 1010-1010<br/>
                Whatsapp: 11 1010-1010
            </span>
          </td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
<div class="row">
  <div class="col-md-12">
    <table>
      <tbody>
        <tr>
          <td width="50%"></td>
          <td>
            <u><strong><span class="text-center" style="font-size: 15px;">Factura</span></strong></u>
          </td>
          <td width="30%"></td>
        </tr>
      </tbody>
    </table>
  </div>
</div>
<div class="row">
    <div class="col-md-12">
    @php
       $payment = App\Model\Payment::where('invoice_id',$invoice->id)->first();
    @endphp
    <table width="100%">
      <tbody>
        <tr>
          <td width="30%"><strong>Nombre : </strong>{{ $payment['customer']['name'] }}</td>
          <td width="30%"><strong>Telefono : </strong></td>{{ $payment['customer']['mobile_no'] }}</td>
          <td width="40%"><strong>Direccion : </strong>{{ $payment['customer']['address'] }}</td>
        </tr>
      </tbody>
    </table>
  </div>
</div>
<div class="row">
  <div class="col-md-12">
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
          @endphp
          @foreach ($invoice['invoice_details'] as $key => $details)
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
              <td class="text-center"><strong>{{ $payment->due_amount }}</strong></td>
          </tr>
          <tr>
              <td colspan="5" class="text-right">Total</td>
              <td class="text-center"><strong>{{ $payment->total_amount }}</strong></td>
          </tr>
      </tbody>   
  </table> 
  </div>
</div>
</div>
</body>
</html>