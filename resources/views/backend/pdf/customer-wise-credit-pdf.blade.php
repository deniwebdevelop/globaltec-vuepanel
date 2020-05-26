<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Reporte Deuda | PDF</title>
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
                        <u><strong><span style="font-size: 15px">Reporte Deuda
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
                    <th>Monto</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $total_due = '0';
                @endphp
                @foreach ($allData as $key => $payment)
                <tr>
                    <td>{{ $key+1 }}</td>
                    <td>
                        {{ $payment['customer']['name'] }}
                        ({{ $payment['customer']['mobile_no'] }}-{{ $payment['customer']['address'] }})
                    </td>
                    <td>Factura Numero{{ $payment['invoice']['invoice_no']}}</td>
                    <td>{{ date('d-m-Y'),strtotime($payment['invoice']['date']) }}</td>
                    <td>{{ $payment->due_amount }}</td>
                    @php
                    $total_due += $payment->due_amount;
                   @endphp
                </tr>                          
              @endforeach
              <tr>
                  <td colspan="4" style="text-align: right; font-weight:bold;">Total</td>
                  <td><strong>{{ $total_due }}</strong></td>
              </tr>
            </tbody>
        </table>
    </div>
</div>
</div>
</body>
</html>