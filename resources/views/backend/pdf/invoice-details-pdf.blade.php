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
                                <span style="font-size: 35px;background: #17818F;padding: 3px 10px 3px 10px; color: #fff">
                                Global Tec Trade</span>
                            </td>
                        
                            <td><strong>Factura Numero: {{ $payment['invoice']['invoice_no'] }}</strong></td>
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
                                <u><strong><span style="font-size: 15px">Detalle Factura</span></strong></u>
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
                            <td colspan="3"><strong>Informacion del Cliente</strong></td>
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
                            <td colspan="3">{{ $dt1->current_paid_amount }}</td>
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
                <tbody>
                    <tr>
                        <td style="width: 40%" >
                            <p style="text-align: center;margin-left: 20px;">Firma Cliente</p>
                        </td>
                        <td style="width: 20%"></td>
                        <td style="width: 40%;text-align:center;">
                            <p style="text-align: center;">Firma Vendedor</p>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
</body>
</html>
