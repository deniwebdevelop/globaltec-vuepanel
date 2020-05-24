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
                        <th>Proveedor</th>
                        <th>Categoria</th>
                        <th>Producto</th>
                        <th>Stock</th>
                        <th>Unidad</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($allData as $key => $product)
                    <tr>
                        <td>{{ $key+1 }}</td>
                        <td>{{ $product['supplier']['name']}}</td>
                        <td>{{ $product['category']['name']}}</td>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->quantity }}</td>
                        <td>{{ $product['unit']['name']}}</td>
        
                    </tr>
                @endforeach
                </tbody>
            </table>
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
