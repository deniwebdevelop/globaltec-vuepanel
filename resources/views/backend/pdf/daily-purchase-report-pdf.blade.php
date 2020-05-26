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
                        <u><strong><span style="font-size: 15px">Resumen de Compras
                        ({{ date('d-m-Y',strtotime($start_date)) }} al {{ date('d-m-Y', strtotime($end_date)) }})</span></strong></u>
                    </td>
                    <td></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <table width="100%" border="1">
            <thead class="thead">
                <tr>
                    <th>Codigo</th>
                    <th>Orden de Compra</th>
                    <th>Fecha</th>
                    <th>Producto</th>
                    <th>Cantidad</th>
                    <th>Precio Unitario</th>
                    <th>Total Compra</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $total_sum = '0';
                @endphp
            @foreach($allData as $key => $purchase)
                <tr>
                    <td>{{$key+1}}</td>
                    <td>{{ $purchase->purchase_no }}</td>
                    <td>{{ date('d/m/Y',strtotime($purchase->date)) }}</td>
                    <td>{{ $purchase['product']['name']}}</td>
                    <td>
                      {{ $purchase->buying_qty }}
                      {{ $purchase['product']['unit'] }}
                    </td>
                    <td>{{ $purchase->unit_price }}</td>
                    <td>{{ $purchase->buying_price }}</td>
                    @php
                        $total_sum += $purchase->buying_price;
                    @endphp
                </tr>
            @endforeach
                <tr>
                   <td colspan="6" style="text-align: right;"><strong>Total</strong></td> 
                   <td>{{ $total_sum }}</td>
                </tr>
            </tbody>
        </table><br>
        @php
        $date = new DateTime('now', new DateTimeZone('America/Argentina/Buenos_Aires'));
    @endphp
    <i>{{ $date->format('F j, Y, g:i a') }}</i>
    </div>
</div>
</div>
</body>
</html>