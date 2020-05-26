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
              <li class="breadcrumb-item active">Categorias</li>
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
              <div class="card-header">
                 <h3 class="p-1 font-weight-light">Categorias
                     <a class="btn btn-success float-right btn-sm" href="{{ route('categories.add') }}"><i class="fa fa-plus-circle p-2"></i>Agregar Categoria</a>
                 </h3>
                </div>
              </div><!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-hover">
                    <thead class="thead">
                        <tr>
                            <th style="display: none">Codigo</th>
                            <th>Tipo Categoria</th>
                            <th width="70%">Nombre</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($allData as $key => $category)
                        <tr>
                            <td style="display: none">{{$key+1}}</td>
                            <td>{{$category->type}}</td>
                            <td>{{$category->name}}</td>
                            <td>
                              @php
                              $count_category = App\Model\Product::where('category_id',$category->id)->count(); 
                              @endphp
                                <a title="Edit" class="btn btn-sm btn-primary" href="{{ route('categories.edit', $category->id) }}"><i
                                class="fa fa-edit"></i></a>
                                @if($count_category<1)
                                <a title="Delete" id="delete" class="btn btn-sm btn-danger" href="{{ route('categories.delete', $category->id) }}"><i
                                    class="fa fa-trash"></i></a>
                                @endif
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
 