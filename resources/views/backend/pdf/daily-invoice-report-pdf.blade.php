<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Reporte Diario PDF</title>
  <link rel="stylesheet" href="{{ asset('backend/plugins/tempusdominus-bootstrap-4/css/tempusdominus-boostrap-4-min.css') }}">
</head>
<body>
<div class="container">
  <div class="row">
    <div class="col-md-12">
      <table width="100%">
        <tbody>
          <tr>
            <td width="40%"></td>
            <td>
  <h3 class="display-2 font-weight-lighter text-center">Global Tec Trade</h3>
            </td>

          </tr>
        </tbody>
      </table>
    </div>
  </div>
<div class="row">
    <div class="col-md-12">
        <hr style="margin-bottom: 0px;"> 
        <table>
            <tbody>
                <tr>
                    <td class="text-left"></td>
                    <td>
                        <u><strong><span style="font-size: 15px">Reporte Facturacion
                        ({{ date('d-m-Y',strtotime($start_date)) }}-{{ date('d-m-Y', strtotime($end_date)) }})</span></strong></u>
                    </td>
                    <td></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <table border="1" width="100%">
            <thead>
                <tr>
                    <th>Codigo</th>
                    <th>Cliente</th>
                    <th>Factura</th>
                    <th>Fecha</th>
                    <th>Descripcion</th>
                    <th>Monto</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $total_sum = '0';
                @endphp
              @foreach ($allData as $key => $invoice)
              <tr>
                <td>{{ $key+1 }}</td>
                <td>{{ $invoice['payment']['customer']['name'] }}
                    ({{ $invoice['payment']['customer']['mobile_no'] }}-{{ $invoice['payment']['customer']['address'] }})
                </td>
                <td>Factura Numero{{ $invoice->invoice_no}}</td>
                <td>{{ date('d-m-Y'),strtotime($invoice->date) }}</td>
                <td>{{ $invoice->description }}</td>
                <td>{{ $invoice['payment']['total_amount'] }}</td>
                @php
                   $total_sum += $invoice['payment']['total_amount'] 
                @endphp
            </tr>                          
              @endforeach
              <tr>
                  <td colspan="5" style="text-align: right;">Facturacion Total</td>
                  <td>{{ $total_sum }}</td>
              </tr>
            </tbody>
        </table>
    </div>
</div>



</div>
</body>
</html>