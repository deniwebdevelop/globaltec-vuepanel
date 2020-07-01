<!DOCTYPE html>
<html lang="en">

<head>
    <title>Detalle Factura PDF</title>
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
                            <td>
                                <span>Cuit: 30-307081382-2</span><br/>
                                <span>Telefono: 11-2493-2929</span>    
                            </td>
                            <td>

                                <span style="font-size: 35px;background: #fff;padding: 3px 10px 3px 10px; color: rgb(17, 17, 17)">
                                Axis</span>
                            </td>
                        
                            <td><strong>Presupuesto Numero: {{ $payment['invoice']['invoice_no'] }}</strong></td>
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
                            <td width="49%"></td>
                            <td>
                                <u><strong><span style="font-size: 15px"></span></strong></u>
                            </td>
                            <td width="30%"></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <table width="100%">
                    <tbody>
                        <tr>
                            <td colspan="6"><strong>Detalle de Venta:</strong></td>
                        </tr>   
                      <tr>
                        <td width="30%"><strong>Cliente : </strong>{{ $payment['customer']['name'] }}</td>
                        <td width="30%"><strong>Telefono : </strong>{{ $payment['customer']['mobile_no'] }}</td>
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
                            <th>Item</th>
                            <th>Categoria</th>
                            <th>Producto</th>
                            <th>Cantidad</th>
                            <th>Precio Unitario</th>
                            <th></th>
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
                            <td>$ {{ number_format($details->selling_price, 2) }}</td>
                        </tr>
                        @php
                        $total_sum += $details->selling_price;
                        @endphp
                        @endforeach
                        <tr>
                            <td colspan="5" class="text-right"><strong>Sub Total</strong></td>
                            <td class="text-center"><strong>$ {{ number_format($total_sum, 2) }}</strong></td>
                        </tr>
                        <tr>
                            <td colspan="5" class="text-right">Descuento</td>
                            <td class="text-center"><strong>{{ number_format($payment->discount_amount, 2) }}</strong></td>
                        </tr>
                        <tr>
                            <td colspan="5" class="text-right">Monto Pagado</td>
                            <td class="text-center"><strong>$ {{ number_format($payment->paid_amount, 2) }}</strong></td>
                        </tr>
                        <tr>
                            <td colspan="5" class="text-right">Monto Adeudado</td>
                            <input type="hidden" name="new_paid_amount" value="{{ $payment->due_amount }}">
                            <td class="text-center"><strong>$ {{ number_format($payment->due_amount, 2) }}</strong></td>
                        </tr>
                        <tr>
                            <td colspan="5" class="text-right"><strong>Total</strong></td>
                            <td class="text-center"><strong>$ {{ number_format($payment->total_amount, 2) }}</strong></td>
                        </tr>
                        <tr>
                          <td colspan="6" style="text-align: center;font-weight:bold;">Resumen de Pago</td>  
                        </tr>
                        <tr>
                            <td colspan="3" style="text-align: right;"><strong>Fecha</strong></td>
                            <td colspan="3"><strong>Monto</strong></td>
                        </tr>
                        @php
                            $payment_details = App\Model\PaymentDetail::where('invoice_id', $payment->invoice_id)->get();
                        @endphp
                        @foreach ($payment_details as $dt1)
                        <tr>
                            <td colspan="3" style="text-align: right;">{{ date('d-m-Y',strtotime($dt1->date)) }}</td>
                            <td colspan="3">$ {{ number_format($dt1->current_paid_amount, 2) }}</td>
                        </tr>    
                        @endforeach
                    </tbody>   
                </table> 
                @php
                    $date = new DateTime('now', new DateTimeZone('America/Argentina/Buenos_Aires'));
                @endphp
                <i>{{ $date->format('F j, Y, g:i a') }}</i>
            </div>
        </div>
    <div class="row">
        <div class="col-md-12">
            <hr style="margin-bottom: 0px;">
            <table border="0" width="100%">

            </table>
        </div>
    </div>
</div>
</body>
</html>
