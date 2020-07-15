<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Presupuesto</title>
    
<style>
    .invoice-box {
        max-width: 800px;
        margin: auto;
        padding: 30px;
        border: 1px solid #eee;
        box-shadow: 0 0 10px rgba(0, 0, 0, .15);
        font-size: 16px;
        line-height: 24px;
        font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
        color: #555;
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
        background: #eee;
        border-bottom: 1px solid #ddd;
        font-weight: bold;
    }
    
    .invoice-box table tr.details td {
        padding-bottom: 20px;
    }
    
    .invoice-box table tr.item td{
        border-bottom: 1px solid #eee;
    }
    
    .invoice-box table tr.item.last td {
        border-bottom: none;
    }
    
    .invoice-box table tr.total td:nth-child(2) {
        border-top: 2px solid #eee;
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
    <div class="invoice-box">
        <table cellpadding="0" cellspacing="0">
            <tr class="top">
                <td colspan="4">
                    <table>
                        <tr>
                            <td class="title">
                              <h5 style="font-size: 25px">Global Tec Trade S.R.L</h5>
                            </td>
                            <br>
                            <td>
                                Presupuesto #:{{ $payment['invoice']['invoice_no'] }}
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            
            <tr class="information">
                <td colspan="4">
                    <table>
                        <tr>
                            <td>{{ $payment['customer']['company'] }}.<br>
                                {{ $payment['customer']['cuit'] }}<br>
                                {{ $payment['customer']['address'] }}</td>

                            <td>
                             
                                {{ $payment['customer']['name'] }}<br>
                                {{ $payment['customer']['mobile_no'] }}<br>
                                {{ $payment['customer']['email'] }}
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            
       
            
            <tr class="heading">
                <td>
                    Item
                </td>
                
                <td>
                    Precio
                </td>
                <td>Cantidad</td>
                <td>Total</td>
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
                <td colspan="3"><strong>Sub Total</strong></td>
                <td class="text-right"><strong>$ {{ number_format($total_sum, 2) }}</strong></td>
            </tr><br>
            <tr>
                <td colspan="3"><strong>Total</strong></td>
                <td><strong>$ {{ number_format($payment->total_amount, 2) }}</strong></td>
            </tr>

        </table>
    </div>
</body>
</html>