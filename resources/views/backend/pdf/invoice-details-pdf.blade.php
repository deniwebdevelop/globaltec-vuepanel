<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Presupuesto</title>
    
<style>
    body {
        background-image:url('/upload/modelo.jpg');
   
    background-repeat: no-repeat;
    background-position: center center;
   -webkit-background-size: cover;
   -moz-background-size: cover;
   -o-background-size: cover;
    background-size: cover;
    height: 100vh;
    }
   
    .invoice-box table {

        width: 100%;
        line-height: inherit;
        text-align: left;
    }
    
    .invoice-box table td {
        padding: 5px;
        vertical-align: top;
    }
    
    .invoice-box table tr td:nth-child(2) {
        text-align: right;
    }
    
    .invoice-box table tr.top table td {
        padding-bottom: 20px;
    }
    
    .invoice-box table tr.top table td.title {
        font-size: 45px;
        line-height: 45px;
        color: #333;
    }
    
    .invoice-box table tr.information table td {
        padding-bottom: 40px;
    }
    
    .invoice-box table tr.heading td {
        
        border-bottom: 1px solid #ddd;
        font-weight: bold;
    }
    
    .invoice-box table tr.details td {
        padding-bottom: 20px;
    }
    
    .invoice-box table tr.item td{
        border-bottom: 1px solid black;
    }
    
    .invoice-box table tr.item.last td {
        border-bottom: none;
    }
    
    .invoice-box table tr.total td:nth-child(2) {
        border-top: 2px solid black;
        font-weight: bold;
    }
    
    @media only screen and (max-width: 600px) {
        .invoice-box table tr.top table td {
            width: 100%;
            display: block;
            text-align: center;
        }
        
        .invoice-box table tr.information table td {
            width: 100%;
            display: block;
            text-align: center;
        }
    }
    
    /** RTL **/
    .rtl {
        direction: rtl;
        font-family: Tahoma, 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
    }
    
    .rtl table {
        text-align: right;
    }
    
    .rtl table tr td:nth-child(2) {
        text-align: left;
    }
    </style>
</head>

<body>
    <br><br><br><br>
    <div style="text-align: left">
     
    </div>
    <br><br><br><br><br>
    
    <div style="text-align: center">
    <strong style="font-size: 16px;">Número de Presupuesto: <br><br>  {{ $payment['invoice']['invoice_no'] }}</strong>
</div>
<br><br><br>
    <div class="invoice-box">
        <table cellpadding="0" cellspacing="0">
     
          
            <tr class="information">
                <td colspan="2">
                    <table>
                        <tr>
                 
                            <td>
                            <strong>Fecha de Presupuesto: </strong>{{ $payment['invoice']['date'] }}<br><br>
                            <strong>Razon Social:</strong> {{ $payment['customer']['company'] }} <br><br>
                            <strong>Cuit: </strong>{{ $payment['customer']['cuit'] }}<br><br>
                            <strong> Telefono: </strong>{{ $payment['customer']['mobile_no'] }}<br><br>
                            <strong> Direccion: </strong> {{ $payment['customer']['address'] }}<br><br>
                            <strong>Contacto: </strong>{{ $payment['customer']['name'] }}<br><br>
                            <strong>E-mail: </strong> {{ $payment['customer']['email'] }}</td><br>
                            </tr>
                    </table>
                </td>
            </tr>
            
       
            
            <tr class="heading">
                <td>
                    Item
                </td>
                
                <td>
                    Cantidad
                </td>
                <td>Precio</td>
                <br>
                <td style="text-align: center;">Total</td><br>
            </tr>
            <br>
            <tr class="item">
                @php
                $total_sum = '0';
                $invoice_details = App\Model\InvoiceDetail::where('invoice_id', $payment->invoice_id)->get();
                @endphp
                @foreach ($invoice_details as $key => $details)
                
                
                    <td>{{ $details['product']['model']}}</td>
                    <td>{{ $details->selling_qty }}</td>
                    <td>{{ $details->unit_price }}</td>
                    <td>$ {{ number_format($details->selling_price, 2) }}</td>
             
                @php
                $total_sum += $details->selling_price;
                @endphp
                @endforeach
            </tr>
            

            
            <tr>
                <td colspan="3"><strong>Sub Total</strong></td><br>
                <td class="text-right"><strong>$ {{ number_format($total_sum, 2) }}</strong></td>
            </tr><br><br>
            <tr>
                <td colspan="3"><strong>Total</strong></td>
                <td><strong>$ {{ number_format($payment->total_amount, 2) }}</strong></td>
            </tr>
<br>
            <tr>
                <td>Condicion de Pago: {{ $payment['invoice']['payment_condition'] }}</td>


            </tr>
            <br>
            <tr>
                <td>Los precios indicados incluyen Iva del 21%</td>
            </tr>
            <tr>
                <td>Vigencia:</td>
            </tr>
        </table>
    </div>
</body>
</html>