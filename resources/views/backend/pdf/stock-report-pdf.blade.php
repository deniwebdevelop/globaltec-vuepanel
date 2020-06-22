<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Stock Report PDF</title>
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
                            <td></td>
                            <td>
                                <u><strong><span style="font-size:15px">Reporte de Stock</span></strong></u>
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
                <thead class="thead">
                    <tr>
                        <th>Codigo</th>
                        <th>Categoria</th>
                        <th>Producto</th>
                        <th>Entrante</th>
                        <th>Saliente</th>
                        <th>Stock</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($allData as $key => $product)
                @php
                $buying_total = App\Model\Purchase::where('category_id',$product->category_id)->where('product_id',$product->id)->where('status','1')->sum('buying_qty');
                $selling_total = App\Model\InvoiceDetail::where('category_id',$product->category_id)->where('product_id',$product->id)->where('status','1')->sum('selling_qty');
                @endphp
                    <tr>
                        <td>{{ $key+1 }}</td>
                        <td>{{ $product['category']['name']}}</td>
                        <td>{{ $product->name }}</td>
                        <td>{{ $buying_total }}</td>
                        <td>{{ $selling_total }}</td>
                        <td>{{ $product->quantity }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        </div>
    </div>
</body>
</html>
