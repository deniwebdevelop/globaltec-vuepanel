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
              <li class="breadcrumb-item active">Ventas</li>
              <li class="breadcrumb-item active">Presupuestos</li>
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
                <h3 class="font-weight-lighter">Agregar Presupuesto
                  <a class="btn float-right btn-sm bg-white" href="{{route('invoice.view')}}"><i class="fa fa-list"></i> Ver Presupuestos</a>
                </h3>
              </div><!-- /.card-header -->

              <div class="card-body">
                <div class="form-row">
                <div class="form-group col-md-1">
                    <label>Numero</label>
                    <input type="text" name="invoice_no" id="invoice_no" class="form-control form-control-sm text-white" value="{{ $invoice_no }}"  
                    readonly style="background:#030335e8">
                  </div>

                    <div class="form-group col-md-2">
                      <label>Fecha</label>
                      <input type="text" name="date" id="date" class="form-control datepicker form-control-sm" value="{{ $date }}" placeholder="DD-MM-YYY" readonly>
                    </div>
 
                    <div class="form-group col-md-3">
                      <label>Categoria</label>
                      <select name="category_id" id="category_id" class="form-control select2">
                        <option value="">Seleccionar Categoria</option>
                        @foreach($categories as $category)
                        <option value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach
                      </select>
                    </div>

                    <div class="form-group col-md-3">
                      <label>Producto</label>
                      <select name="product_id" id="product_id" class="form-control select2">
                        <option value="">Seleccionar Producto</option>
                      </select>
                    </div>

                    <div class="form-group col-md-2">
                        <label>Stock</label>
                        <input type="text" name="current_stock_qty" id="current_stock_qty" class="form-control form-control-sm text-white"
                        readonly style="background:#030335e8">
                      </div>

                    <div class="form-group col-md-2" style="padding-top: 30px;">
                      <a class="btn text-white addeventmore btn-sm" style="background:#070525ce;"><i class="fa fa-plus-circle"></i> Agregar Producto</a>
                    </div>
                  </div>
              </div><!-- /.card-body -->

              <div class="card-body">
                <form method="post" action="{{route('invoice.store')}}" id="myForm">
                  @csrf
                  <table class="table-sm table-bordered" width="100%">
                    <thead>
                      <tr>
                        <th>Categoria</th>
                        <th>Producto</th>
                        <th>Unidades</th>
                        <th width="17%">Precio Unitario</th>
                        <th width="17%">Precio Total</th>
                        <th width="10%">Accion</th>
                      </tr>
                    </thead>
                    <tbody id="addRow" class="addRow">

                    </tbody>
                    <tbody>
                    <tr>
                      <td class="text-right" colspan="4">Descuento<td>
                
                      <input type="text" name="discount_amount" id="discount_amount"
                       class="form-control form-control-sm discount_amount text-right" placeholder="Ingresar Descuento">
          
                      <td></td>
                    </tr>
                    <tr>
                        <td class="text-right" colspan="4">Precio Final</td>
                        <td>
                          <input type="text" name="estimated_amount" value="0" id="estimated_amount"
                           class="form-control form-control-sm text-right  text-white estimated_amount" style="background:#030335e8" readonly>
                        </td>
                        <td></td>
                    </tr>
                    </tbody>
                  </table>
                  <br/>
                  <div class="form-row">
                    <div class="form-group col-md-12">
                      <textarea name="description" class="form-control" id="description" placeholder="Agregar Descripcion"></textarea>
                    </div>
                  </div>

                  <div class="form-row">
                    <div class="form-group col-md-3">
                      <label>Estado de Pago</label>
                      <select name="paid_status" id="paid_status" class="form-control form-control-sm" required>
                        <option value="">Seleccionar Estado</option>
                        <option value="full_paid">Pago Completo</option>
                        <option value="full_due">Pendiente de Pago</option>
                        <option value="partial_paid">Pago Parcial</option>
                      </select>
                      <input type="text" name="paid_amount" class="form-control form-control-sm paid_amount" placeholder="Ingresar Monto Pagado" style="display:none;">
                    </div>
                    <div class="form-group col-md-9">
                      <label>Cliente</label>
                      <select name="customer_id" id="customer_id" class="form-control form-control-sm" required>
                        <option value="">Seleccionar Cliente</option>
                        @foreach ($customers as $customer)
                        <option value="{{ $customer->id }}">{{ $customer->name }} ({{ $customer->company }})</option>
                        @endforeach
                        <option value="0">Nuevo Cliente</option>
                      </select>
                    </div>
                  </div>
                 
                  <div class="form-row new_customer" style="display: none;">
                    <div class="form-group col-md-4">
                      <input type="text" name="name" id="name" class="form-control form-control-sm"
                      placeholder="Nombre">
                    </div>
                    <div class="form-group col-md-4">
                      <input type="text" name="company" id="company" class="form-control form-control-sm"
                      placeholder="Empresa">
                    </div>
                    <div class="form-group col-md-4">
                      <input type="text" name="mobile_no" id="mobile_no" class="form-control form-control-sm"
                      placeholder="Telefono">
                    </div>
                    <div class="form-group col-md-4">
                      <input type="text" name="mobile_two" id="mobile_two" class="form-control form-control-sm"
                      placeholder="Telefono 2">
                    </div>
                    <div class="form-group col-md-4">
                      <input type="text" name="mobile_three" id="mobile_three" class="form-control form-control-sm"
                      placeholder="Telefono 3">
                    </div>
                    <div class="form-group col-md-4">
                      <input type="text" name="email" id="email" class="form-control form-control-sm"
                      placeholder="E-mail">
                    </div>
                    <div class="form-group col-md-4">
                      <input type="text" name="position" id="position" class="form-control form-control-sm"
                      placeholder="Puesto">
                    </div>
                    <div class="form-group col-md-4">
                      <input type="text" name="city" id="city" class="form-control form-control-sm"
                      placeholder="Ciudad">
                    </div>
                    <div class="form-group col-md-4">
                      <input type="text" name="address" id="address" class="form-control form-control-sm"
                      placeholder="Direccion">
                    </div>
                    <div class="form-group col-md-4">
                      <input type="text" name="postal" id="postal" class="form-control form-control-sm"
                      placeholder="Codigo Postal">
                    </div>
                    <div class="form-group col-md-4">
                      <input type="text" name="cuit" id="cuit" class="form-control form-control-sm"
                      placeholder="Cuit">
                    </div>
                    <div class="form-group col-md-4">
                      <input type="text" name="website" id="website" class="form-control form-control-sm"
                      placeholder="Website">
                    </div>
                  </div>

                  <div class="form-group">
                    <button type="submit" class="btn btn-md text-white" style="background:#030335e8" id="storeButton">Agregar Presupuesto</button>
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
      <input type="hidden" name="date" value="@{{date}}">
      <input type="hidden" name="invoice_no" value="@{{invoice_no}}">
      <td>
        <input type="hidden" name="category_id[]" value="@{{category_id}}">
        @{{category_name}}
      </td>
      <td>
        <input type="hidden" name="product_id[]" value="@{{product_id}}">
        @{{product_name}}
      </td>
      <td>
        <input type="decimal" min="1" class="form-control form-control-sm text-right selling_qty" name="selling_qty[]"  value="1">
      </td> 
      <td>
        <input type="decimal" class="form-control form-control-sm text-right unit_price" name="unit_price[]"  value="">
      </td>
      <td>
        <input type="decimal" class="form-control form-control-sm text-right selling_price" name="selling_price[]"  value="0" readonly>
      </td>
      <td><i class="btn btn-danger btn-sm fa fa-window-close removeeventmore"></i></td>
    </tr>
  </script>
  <!-- extra_add_exist_item -->
<script type="text/javascript">
    $(document).ready(function () {
      $(document).on("click",".addeventmore", function () {
        var date  = $('#date').val();
        var invoice_no  = $('#invoice_no').val();
        var category_id  = $('#category_id').val();
        var category_name = $('#category_id').find('option:selected').text();
        var product_id  = $('#product_id').val();
        var product_name  = $('#product_id').find('option:selected').text();

        if(date==''){
          $.notify("Date is required", {globalPosition: 'top right',className: 'error'});
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
                  invoice_no:invoice_no,
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

      $(document).on('keyup click','.unit_price,.selling_qty',function(){
        var unit_price  = $(this).closest("tr").find("input.unit_price").val();
        var qty     = $(this).closest("tr").find("input.selling_qty").val();
        var total     = unit_price * qty;
        $(this).closest("tr").find("input.selling_price").val(total);
        $('#discount_amount').trigger('keyup');
      });
      
      $(document).on('keyup','#discount_amount',function(){
        totalAmountPrice();
      });
      
      //calculate sum of amount in invoice
      function totalAmountPrice(){
        var sum=0;
        $(".selling_price").each(function(){
          var value = $(this).val();              
          if(!isNaN(value) && value.length != 0) {
            sum += parseFloat(value);             
          }
        });   

        var discount_amount = parseFloat($('#discount_amount').val());
        if(!isNaN(discount_amount) && discount_amount.length != 0) {
          sum -= parseFloat(discount_amount);
        }
        $('#estimated_amount').val(sum);
      }
    });
  </script>
<script type="text/javascript">
    $(function(){
      $(document).on('change','#category_id',function(){
        var category_id = $(this).val();
        $.ajax({
          url:"{{route('get-product')}}",
          type:"GET",
          data:{category_id:category_id},
          success:function(data){
            var html = '<option value="">Seleccionar Producto</option>';
            $.each(data,function(key,v){
              html +='<option value="'+v.id+'">'+v.name+'</option>';
            });
            $('#product_id').html(html);
          }
        });
      });
    });
</script>
<script type="text/javascript">
  $(function(){
    $(document).on('change', '#product_id', function(){
        var product_id = $(this).val();
        $.ajax({
            url:"{{ route('check-product-stock') }}",
            type:"GET",
            data:{product_id:product_id},
            success:function(data){
                $('#current_stock_qty').val(data);
            }
        });
    });
  });  
</script>
<script type="text/javascript">
  $(document).on('change','#paid_status',function(){
   //Estado de Pago
    var paid_status = $(this).val();
    if(paid_status == 'partial_paid'){
      $('.paid_amount').show();
    }else{
      $('.paid_amount').hide();
    }
});
$(document).on('change','#customer_id',function(){
    //Nuevo Cliente
    var customer_id = $(this).val();
    if(customer_id == '0'){
      $('.new_customer').show();
    }else{
      $('.new_customer').hide();
    }
});
</script>
<script>
      $('.datepicker').datepicker({
          uiLibrary: 'bootstrap4',
          format :'yyyy-mm-dd'
      });
  </script>
@endsection