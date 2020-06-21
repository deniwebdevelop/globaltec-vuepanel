@extends('backend.layouts.master')
@section('content')
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">

          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
              <li class="breadcrumb-item active">Compras</li>
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
            <div class="card">
              <div class="card-header text-white"  style="background-image: linear-gradient(200deg, #070525ce 1%, rgb(1, 0, 5)100%);">
                <h3 class="font-weight-lighter">Agregar Compra
                  <a class="btn bg-white float-right btn-sm" href="{{route('purchase.view')}}"><i class="fa fa-list"></i> Lista de Compras</a>
                </h3>
              </div><!-- /.card-header -->

              <div class="card-body">
                  <div class="form-row">
                    <div class="form-group col-md-4">
                      <label>Fecha</label>
                      <input type="text" name="date" id="date" class="form-control datepicker form-control-sm" placeholder="DD-MM-YYYY" readonly>
                    </div>
                    <div class="form-group col-md-4">
                      <label>Numero OC</label>
                      <input type="text" name="purchase_no" id="purchase_no" class="form-control form-control-sm">
                    </div>
                    <div class="form-group col-md-4">
                      <label>Proveedor</label>
                      <select name="supplier_id" id="supplier_id" class="form-control select2">
                        <option value="">Seleccionar Proveedor</option>
                        @foreach($suppliers as $supplier)
                        <option value="{{$supplier->id}}">{{$supplier->company}}</option>
                        @endforeach
                      </select>
                    </div>
                    <div class="form-group col-md-4">
                      <label>Categoria</label>
                      <select name="category_id" id="category_id" class="form-control select2">
                        <option value="">Seleccionar Categoria</option>
                        @foreach($categories as $data)
                        <option value="{{$data->id}}">{{$data->name}}</option>
                        @endforeach
                      </select>
                    </div>
                    <div class="form-group col-md-6">
                      <label>Producto</label>
                      <select name="product_id" id="product_id" class="form-control select2">
                        <option value="">Seleccionar Producto</option>
                        @foreach($products as $data)
                        <option value="{{$data->id}}">{{$data->name}} - {{ $data->brand }}</option>
                        @endforeach
                      </select>
                    </div>
                    <div class="form-group col-md-2" style="padding-top: 30px;">
                      <a class="btn text-white addeventmore btn-sm" style="background:#030335e8"><i class="fa fa-plus-circle"></i> Agregar Producto</a>
                    </div>
                  </div>
              </div><!-- /.card-body -->

              <div class="card-body">
                <form method="post" action="{{route('purchase.store')}}" id="myForm">
                  @csrf
                  <table class="table-sm table-bordered" width="100%">
                    <thead>
                      <tr>
                        <th>Categoria</th>
                        <th>Producto</th>
                        <th width="7%">Cantidad</th>
                        <th width="10%">Precio Unitario</th>
                        <th>Descripcion</th>
                        <th width="10%">Total</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody id="addRow" class="addRow">

                    </tbody>
                    <tbody>
                      <tr>
                        <td colspan="5"></td>
                        <td>
                          <input type="text" name="estimated_amount" value="0" id="estimated_amount" class="form-control form-control-sm text-right text-white estimated_amount" readonly style="background:#030335e8">
                        </td>
                        <td></td>
                      </tr>
                    </tbody>
                  </table>
                  <br>
                  <div class="form-group">
                    <button type="submit" class="btn btn-md text-white" style="background:#030335e8" id="storeButton">Agregar</button>
                  </div>
                </form>
              </div>

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

  <!-- Extra HTML for If exist Event -->
  <script id="document-template" type="text/x-handlebars-template">
    <tr class="delete_add_more_item" id="delete_add_more_item">
      <input type="hidden" name="date[]" value="@{{date}}">
      <input type="hidden" name="purchase_no[]" value="@{{purchase_no}}">
      <input type="hidden" name="supplier_id[]" value="@{{supplier_id}}">
      <td>
        <input type="hidden" name="category_id[]" value="@{{category_id}}">
        @{{category_name}}
      </td>
      <td>
        <input type="hidden" name="product_id[]" value="@{{product_id}}">
        @{{product_name}}
      </td>
      <td>
        <input type="number" min="1" class="form-control form-control-sm text-right buying_qty" name="buying_qty[]"  value="1">
      </td> 
      <td>
        <input type="number" class="form-control form-control-sm text-right unit_price" name="unit_price[]"  value="">
      </td>
      <td>
        <input type="text" name="description[]" class="form-control form-control-sm">
      </td>
      <td>
        <input class="form-control form-control-sm text-right buying_price" name="buying_price[]"  value="0" readonly>
      </td>
      <td><i class="btn btn-danger btn-sm fa fa-window-close removeeventmore"></i></td>
    </tr>
  </script>

  <!-- extra_add_exist_item -->
  <script type="text/javascript">
    $(document).ready(function () {
      $(document).on("click",".addeventmore", function () {
        var date  = $('#date').val();
        var purchase_no  = $('#purchase_no').val();
        var supplier_id  = $('#supplier_id').val();
        var category_id  = $('#category_id').val();
        var category_name = $('#category_id').find('option:selected').text();
        var product_id  = $('#product_id').val();
        var product_name  = $('#product_id').find('option:selected').text();

        if(date==''){
          $.notify("Date is required", {globalPosition: 'top right',className: 'error'});
          return false;
        }
        if(purchase_no==''){
          $.notify("Purchase no is required", {globalPosition: 'top right',className: 'error'});
          return false;
        }
        if(supplier_id==''){
          $.notify("Supplier is required", {globalPosition: 'top right',className: 'error'});
          return false;
        }
        if(category_id==''){
        $.notify("Category is required", {globalPosition: 'top right',className: 'error'});
        return false;
        }
        if(product_id==''){
          $.notify("Product is required", {globalPosition: 'top right',className: 'error'});
          return false;
        }

        var source = $("#document-template").html();
        var template = Handlebars.compile(source);
        var data= {
                  date:date,
                  purchase_no:purchase_no,
                  supplier_id:supplier_id,
                  category_id:category_id,
                  category_name:category_name,
                  product_id:product_id,
                  product_name:product_name
            };
        var html = template(data);
        $("#addRow").append(html);
      });

      $(document).on("click", ".removeeventmore", function (event) {
        $(this).closest(".delete_add_more_item").remove();
        totalAmountPrice();     
      });

      $(document).on('keyup click','.unit_price,.buying_qty',function(){
        var unit_price  = $(this).closest("tr").find("input.unit_price").val();
        var qty     = $(this).closest("tr").find("input.buying_qty").val();
        var total     = unit_price * qty;
        $(this).closest("tr").find("input.buying_price").val(total);
        totalAmountPrice();
      });
      
      //calculate sum of amount in invoice
      function totalAmountPrice(){
        var sum=0;
        $(".buying_price").each(function(){
          var value = $(this).val();              
          if(!isNaN(value) && value.length != 0) {
            sum += parseFloat(value);             
          }
        });
        $('#estimated_amount').val(sum);
      }
    });
  </script>


  <script type="text/javascript">
    $(document).ready(function () {
      $('#myForm').validate({
        rules: {
          name: {
            required: true,
          },
          supplier_id: {
            required: true,
          },
          unit_id: {
            required: true,
          },
          category_id: {
            required: true,
          }
        },
        messages: {
          
        },
        errorElement: 'span',
        errorPlacement: function (error, element) {
          error.addClass('invalid-feedback');
          element.closest('.form-group').append(error);
        },
        highlight: function (element, errorClass, validClass) {
          $(element).addClass('is-invalid');
        },
        unhighlight: function (element, errorClass, validClass) {
          $(element).removeClass('is-invalid');
        }
      });
    });
  </script>

  <script>
      $('.datepicker').datepicker({
          uiLibrary: 'bootstrap4',
          format :'dd-mm-yyyy'
      });
  </script>

@endsection