<!DOCTYPE html>
<html lang="en">
<head>
    <title>Proveedor PDF</title>
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
                            <td width="25%"></td>
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
                            <td></td>
                            <td>
                                <u><strong><span style="font-size:15px">Reporte de Producto</span></strong></u>
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
                        <th>Proveedor</th>
                        <th>Categoria</th>
                        <th>Producto</th>
                        <th>Entrante</th>
                        <th>Saliente</th>
                        <th>Stock</th>
                        <th>Unidad</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                    $buying_total = App\Model\Purchase::where('category_id',$product->category_id)->where('product_id',$product->id)->where('status','1')->sum('buying_qty');
                    $selling_total = App\Model\InvoiceDetail::where('category_id',$product->category_id)->where('product_id',$product->id)->where('status','1')->sum('selling_qty');
                    @endphp
                <tr>
                    <td>{{ $product['supplier']['name'] }}</td>
                    <td>{{ $product['category']['name']}}</td>
                    <td>{{ $product->name }}</td>
                    <td>{{ $buying_total }}</td>
                    <td>{{ $selling_total }}</td>
                    <td>{{ $product->quantity }}</td>
                    <td>{{ $product['unit']['name']}}</td>
                </tr>
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
                <table border="0" width="100%">
                    <tbody>
                        <tr>
                            <td style="width: 40%;"></td>
                            <td style="width: 20%"></td>
                            <td style="width: 40%; text-align:center;">
                            <p style="text-align: center;border-bottom: 1px solid #000;">Firma</p>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>    
        </div>          
    </div>
</body>

</html>
