@extends('backend.layouts.master')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Manage User</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item active">User</li>
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
                            <h3>Add User
                                <a class="btn btn-success float-right btn-sm" href="{{ route('users.view') }}"><i class="fa fa-list"></i> User List</a>
                            </h3>
                        </div><!-- /.card-header -->
                        <div class="card-body">
                            <form method="post" action="{{ route('users.store') }}" id="myForm">
                                @csrf

                                <div class="form row">
                                    <div class="form-group col-md-4">
                                        <label for="usertype">User Roel</label>
                                        <select name="usertype" id="usertype" class="form-control">
                                            <option value="">Select Role</option>
                                            <option value="Admin">Admin</option>
                                            <option value="User">User</option>
                                        </select>
                                    </div>

                                    <div class="form-group col-md-4">
                                        <label for="name">Name</label>
                                        <input type="text" name="name" class="form-control">
                                        <font style="color: red">{{ ($errors->has('name'))?($errors->first('name')):'' }}</font>
                                    </div>

                                    <div class="form-group col-md-4">
                                        <label for="email">Email</label>
                                        <input type="email" name="email" class="form-control">
                                        <font style="color: red">{{ ($errors->has('email'))?($errors->first('email')):'' }}</font>
                                    </div>

                                    <div class="form-group col-md-4">
                                        <label for="password">Password</label>
                                        <input type="password" name="password" id="password" class="form-control">
                                    </div>

                                    <div class="form-group col-md-4">
                                        <label for="password">Confirm Password</label>
                                        <input type="password" name="password2" class="form-control">
                                    </div>

                                    <div class="form-group col-md-6">
                                        <input type="submit" value="Submit" class="btn btn-primary">
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
                usertype: {
                    required: true,
                },
                email: {
                    required: true,
                    email: true,
                },
                password: {
                    required: true,
                    minlength: 6,
                },
                password2: {
                    required: true,
                    equalTo: '#password'
                }
            },
            messages: {
                name: {
                    required: "Please enter username",
                },
                usertype: {
                    required: "Please select role",
                },
                email: {
                    required: "Please enter a email address",
                    email: "Please enter a <em>email</em>vaild  address"
                },
                password: {
                    required: "Please provide a password",
                    minlength: "Your password must be at least 6 characters long"
                },
                password2: {
                    required: "Please enter confirm password",
                    equalTo: "Confirm password does not match"
                },
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
