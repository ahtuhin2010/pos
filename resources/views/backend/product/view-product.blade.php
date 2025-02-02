@extends('backend.layouts.master')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Manage Product</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item active">Product</li>
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
                            <h3>Product List
                                <a class="btn btn-success float-right btn-sm" href="{{ route('products.add') }}"><i class="fa fa-plus-circle"></i> Add Product</a>
                            </h3>
                        </div><!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>SL.</th>
                                        <th>Supplier Name</th>
                                        <th>Category</th>
                                        <th>Product Name</th>
                                        <th>Unit</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($allData as $key => $product)
                                    <tr class="{{ $product->id }}">
                                        <td>{{ $key+1 }}</td>
                                        <td>{{ $product['supplier']['name'] }}</td>
                                        <td>{{ $product['category']['name'] }}</td>
                                        <td>{{ $product->name }}</td>
                                        <td>{{ $product['unit']['name'] }}</td>
                                         @php
                                            $count_product = App\Model\Purchase::where('product_id',$product->id)->count();
                                        @endphp
                                        <td>
                                            <a title="Edit" class="btn btn-sm btn-primary" href="{{ route('products.edit', $product->id) }}"><i class="fa fa-edit"></i></a>
                                            @if ($count_product < 1)
                                                <a title="Delete" id="delete" class="btn btn-sm btn-danger" href="{{ route('products.delete') }}" data-token="{{csrf_token()}}" data-id="{{ $product->id }}"><i class="fa fa-trash"></i></a>
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
                <!-- /.Left col -->
                <!-- right col (We are only adding the ID to make the widgets sortable)-->
                <section class="col-lg-5 connectedSortable">

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
