@extends('backend.layouts.master')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Manage Customer</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item active">Customer</li>
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
                            <h3>Edit Customer
                                <a class="btn btn-success float-right btn-sm" href="{{ route('customers.view') }}"><i class="fa fa-list"></i> Customer List</a>
                            </h3>
                        </div><!-- /.card-header -->
                        <div class="card-body">
                            <form method="post" action="{{ route('customers.update', $editData->id) }}" id="myForm">
                                @csrf

                                <div class="form row">

                                    <div class="form-group col-md-6">
                                        <label for="name">Customer Name</label>
                                        <input type="text" name="name" class="form-control" value="{{ $editData->name }}">
                                        <font style="color: red">{{ ($errors->has('name'))?($errors->first('name')):'' }}</font>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="mobile_no">Mobile No</label>
                                        <input type="text" name="mobile_no" class="form-control" value="{{ $editData->mobile_no }}">
                                        <font style="color: red">{{ ($errors->has('mobile_no'))?($errors->first('mobile_no')):'' }}</font>
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="email">Email</label>
                                        <input type="email" name="email" class="form-control" value="{{ $editData->email }}">
                                        <font style="color: red">{{ ($errors->has('email'))?($errors->first('email')):'' }}</font>
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="address">Address</label>
                                        <input type="text" name="address" class="form-control" value="{{ $editData->address }}">
                                        <font style="color: red">{{ ($errors->has('address'))?($errors->first('address')):'' }}</font>
                                    </div>

                                    <div class="form-group col-md-6">
                                        <input type="submit" value="Update" class="btn btn-primary">
                                    </div>

                                </div>
                            </form>
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


<script type="text/javascript">
    $(document).ready(function() {
        $('#myForm').validate({
            rules: {
                name: {
                    required: true,
                },
                mobile_no: {
                    required: true,
                },
                address: {
                    required: true,
                },
            },
            messages: {

            },
            errorElement: 'span',
            errorPlacement: function(error, element) {
                error.addClass('invalid-feedback');
                element.closest('.form-group').append(error);
            },
            highlight: function(element, errorClass, validClass) {
                $(element).addClass('is-invalid');
            },
            unhighlight: function(element, errorClass, validClass) {
                $(element).removeClass('is-invalid');
            }
        });
    });
</script>

@endsection
