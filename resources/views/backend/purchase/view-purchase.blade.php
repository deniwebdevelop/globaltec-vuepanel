@extends('backend.layouts.master')
@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper bg-white">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
    
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
              <li class="breadcrumb-item active">Compra</li> 
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Main row -->
        <div class="row">
          <!-- Left col -->
          <section class="col-md-12">
            <!-- Custom tabs (Charts with tabs)-->
            <div class="card" style="background-image: linear-gradient(200deg, #070525ce 1%, rgb(1, 0, 5)100%);">
              <div class="card-header">
                 <h3 class="font-weight-light text-white">Compras
                    <a class="btn bg-white float-right btn-sm"
                    href="{{ route('purchase.add') }}"><i class="fa fa-plus-circle"></i> Agregar Compra</a>
                 </h3>
                </div>
              </div><!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-hover table-responsive" width="100%">
                  <thead style="font-size: 14px">
                        <tr>
                            <th>Nro</th>
                            <th>OC</th>
                            <th>Fecha</th>
                            <th>Proveedor</th>
                            <th>Categoria</th>
                            <th>Modelo</th>
                            <th>Origen</th>
                            <th>Moneda</th>
                            <th>Descripcion</th>
                            <th>Cantidad</th>
                            <th>Precio Unitario</th>
                            <th>Total</th>
                            <th width="10%">Estado</th>
                            <th>Accion</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($allData as $key => $purchase)
                        <tr> 
                            <th>{{ $key+1 }}</th>
                            <td>{{ $purchase->purchase_no }}</td>
                            <td>{{ date('d/m/Y',strtotime($purchase->date)) }}</td>
                            <td>{{ $purchase['customer']['company'] }}</td>
                            <td>{{ $purchase['category']['name']}}</td>
                            <td>{{ $purchase['product']['name']}}</td>
                            <td>{{ $purchase->origin }}</td>
                            <td>{{ $purchase->coin }}</td>
                            <td>{{ $purchase->description}}</td>
                            <td>
                              {{ $purchase->buying_qty }}
                              {{ $purchase['product']['unit'] }}
                            </td>
                            <td>{{ number_format($purchase->unit_price, 2) }}</td>
                            <td>${{ number_format($purchase->buying_price, 2) }}</td>
                            <td>
                              @if($purchase->status=='0')
                              <a href="{{ route('purchase.pending.list') }}">  <span style="color: #FC4236;padding:5px;">Pago Pendiente</a></span>
                              @elseif($purchase->status=='1')
                              <span style="color: #5EAB00;pagging:5px">Pago Realizado</span>
                              @endif
                            </td>
                            <td>

                          

                            <a title="Delete" id="delete" class="btn btn-sm btn-danger" href="{{ route('purchase.delete', $purchase->id) }}"><i
                            class="fa fa-trash"></i></a>
              
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
              </div><!-- /.card-body -->
            </div>
            <!-- /.card -->
          </section>
          <!-- right col -->
        </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->     
@endsection
 