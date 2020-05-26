<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Reporte Pagos PDF</title>
    <link rel="stylesheet"
        href="{{ asset('backend/plugins/tempusdominus-bootstrap-4/css/tempusdominus-boostrap-4-min.css') }}">
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <table width="100%">
                    <tbody>
                        <tr>
                            <td width="50%"></td>
                            <td>
                                <span style="font-size: 20px;background:#1781BF;padding: 3px 10px 3px 10px;color: #fff;">Reporte Pagos</span><br/>
                                CABA, Buenos Aires.
                            </td>
                            <td>
                                <span>
                                    Cuit: 30-79791833-9
                                    IVA: Responsable Inscripto
                                </span>
                            </td>
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
                        $total_paid = '0';
                        @endphp
                        @foreach ($allData as $key => $payment)
                        <tr>
                            <td>{{ $key+1 }}</td>
                            <td>
                                {{  $payment['customer']['name'] }}
                                ({{ $payment['customer']['mobile_no'] }}-{{ $payment['customer']['address'] }})
                            </td>
                            <td>Factura Numero{{ $payment['invoice']['invoice_no']}}</td>
                            <td>{{ date('d-m-Y'),strtotime($payment['invoice']['date']) }}</td>
                            <td>{{ $payment->paid_amount }}</td>
                            @php
                            $total_paid += $payment->paid_amount;
                            @endphp
                        </tr>
                        @endforeach
                        <tr>
                            <td colspan="4" style="text-align: right; font-weight:bold;">Total</td>
                            <td><strong>{{ $total_paid }}</strong></td>
                        </tr>
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</body>

</html>
