@extends('backend.layouts.master')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Manage Invoice</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item active">Invoice</li>
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
                            <h3>Add Invoice
                                <a class="btn btn-success float-right btn-sm" href="{{ route('invoices.view') }}"><i class="fa fa-list"></i> Invoice List</a>
                            </h3>
                        </div><!-- /.card-header -->
                        <div class="card-body">

                            <div class="form-row">

                                <div class="form-group col-md-1">
                                    <label>Invoice No</label>
                                    <input type="text" name="invoice_no" id="invoice_no" class="form-control form-control-sm" value="{{ $invoice_no }}" readonly style="background-color: #D8FDBA">
                                </div>

                                <div class="form-group col-md-2">
                                    <label>Date</label>
                                    <input type="text" name="date" id="date" class="form-control datepicker form-control-sm" value="{{ $date }}" placeholder="YYYY-MM-DD" readonly>
                                </div>

                                <div class="form-group col-md-3">
                                    <label>Category Name</label>
                                    <select name="category_id" id="category_id" class="form-control select2">
                                        <option value="">Select Category</option>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group col-md-3">
                                    <label>Product Name</label>
                                    <select name="product_id" id="product_id" class="form-control select2">
                                        <option value="">Select Product</option>

                                    </select>
                                </div>

                                <div class="form-group col-md-2">
                                    <label>Stock (PCS/Kg)</label>
                                    <input type="text" name="current_stock_qty" id="current_stock_qty" class="form-control form-control-sm" readonly style="background-color: #D8FDBA">
                                </div>

                                <div class="form-group col-md-1" style="padding-top: 30px">
                                    <a class="btn btn-success addeventmore btn-sm"><i class="fa fa-plus-circle"></i> Add</a>
                                </div>

                            </div>
                        </div><!-- /.card-body -->

                        <div class="card-body">
                            <form method="post" action="{{ route('invoices.store') }}" id="myForm">
                                @csrf

                                <table class="table-sm table-bordered" width="100%">
                                    <thead>
                                        <tr>
                                            <th>Category</th>
                                            <th>Product Name</th>
                                            <th width="7%">PCS/Kg</th>
                                            <th width="10%">Unit Price</th>
                                            <th width="17%">Total Price</th>
                                            <th width="10%">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody id="addRow" class="addRow">

                                    </tbody>
                                    <tbody>
                                        <tr>
                                            <td class="text-right" colspan="4">Discount</td>
                                            <td><input type="text" name="discount_amount" id="discount_amount" class="form-control form-control-sm discount_amount text-right" placeholder="Enter Discount Amount"></td>
                                        </tr>
                                        <tr>
                                            <td class="text-right" colspan="4">Grand Total</td>
                                            <td>
                                                <input type="text" name="estimated_amount" value="0" id="estimated_amount" class="form-control form-control-sm text-right estimated_amount" readonly style="background-color: #D8FDBA">
                                            </td>
                                            <td></td>
                                        </tr>
                                    </tbody>
                                </table>
                                </br>

                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <textarea name="description" id="description" class="form-control" placeholder="Write Description here"></textarea>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="form-group col-md-3">
                                        <label for="">Paid Status</label>
                                        <select name="paid_status" id="paid_status" class="form-control form-control-sm">
                                            <option value="">Select Status</option>
                                            <option value="full_paid">Full Paid</option>
                                            <option value="full_due">Full Due</option>
                                            <option value="partial_paid">Partial Paid</option>
                                        </select>
                                        <input type="text" name="paid_amount" class="form-control form-control-sm paid_amount" placeholder="Enter Paid Amount" style="display: none;">
                                    </div>
                                    <div class="form-group col-md-9">
                                        <label for="">Customer Name</label>
                                        <select name="customer_id" id="customer_id" class="form-control form-control-sm select2">
                                            <option value="">Select Customer</option>
                                            @foreach ($customers as $customer)
                                            <option value="{{$customer->id}}">{{ $customer->name }} ({{ $customer->mobile_no }} - {{ $customer->address }})</option>
                                            @endforeach
                                            <option value="0">New Customer</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-row new_customer" style="display: none;">
                                    <div class="form-group col-md-3">
                                        <input type="text" name="name" id="name" class="form-control form-control-sm" placeholder="Write Customer Name">
                                    </div>
                                    <div class="form-group col-md-3">
                                        <input type="text" name="mobile_no" id="mobile_no" class="form-control form-control-sm" placeholder="Write Customer Mobile No">
                                    </div>
                                    <div class="form-group col-md-3">
                                        <input type="text" name="address" id="address" class="form-control form-control-sm" placeholder="Write Customer Adress">
                                    </div>
                                    <div class="form-group col-md-3">
                                        <input type="text" name="email" id="email" class="form-control form-control-sm" placeholder="Write Customer Email">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary" id="storeButton">Invoice Store</button>
                                </div>
                            </form>
                        </div>

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

<script id="document-template" type="text/x-handlebars-tamplate">
    <tr class="delete_add_more_item" id="delete_add_more_item">
        <input type="hidden" name="date" value="@{{date}}">
        <input type="hidden" name="invoice_no" value="@{{invoice_no}}">

        <td>
            <input type="hidden" name="category_id[]" value="@{{category_id}}">
            @{{ category_name }}
        </td>
        <td>
            <input type="hidden" name="product_id[]" value="@{{product_id}}">
            @{{ product_name }}
        </td>
        <td>
            <input type="number" min="1" class="form-control form-control-sm text-right selling_qty" name="selling_qty[]" value="1">
        </td>
        <td>
            <input type="number" class="form-control form-control-sm text-right unit_price" name="unit_price[]" value="">
        </td>
        <td>
            <input class="form-control form-control-sm text-right selling_price" name="selling_price[]" value="0" readonly>
        </td>
        <td>
            <i class="btn btn-danger btn-sm fa fa-window-close removeeventmore"></i>
        </td>
    </tr>
</script>

<!-- extra add more  --->
<script type="text/javascript">
    $(document).ready(function (){
        $(document).on("click",".addeventmore", function () {
            var date = $('#date').val();
            var invoice_no = $('#invoice_no').val();
            var supplier_id = $('#supplier_id').val();
            var category_id = $('#category_id').val();
            var category_name = $('#category_id').find('option:selected').text();
            var product_id = $('#product_id').val();
            var product_name = $('#product_id').find('option:selected').text();

            if (date=='') {
                $.notify("Date is required", {globalPosition: 'top right',className: 'error'});
                return false;
            }
            if (category_id=='') {
                $.notify("Category is required", {globalPosition: 'top right',className: 'error'});
                return false;
            }
            if (product_id=='') {
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

        $(document).on("click", ".removeeventmore", function (event){
            $(this).closest(".delete_add_more_item").remove();
            totalAmountPrice();
        });

        $(document).on('keyup click', '.unit_price,.selling_qty', function (){
           var unit_price = $(this).closest("tr").find("input.unit_price").val();
           var qty = $(this).closest("tr").find("input.selling_qty").val();
           var total = unit_price * qty;
           $(this).closest("tr").find("input.selling_price").val(total);
            $('#discount_amount').trigger('keyup');
        });

        $(document).on('keyup','#discount_amount', function(){
            totalAmountPrice();
        });

        //calculate sum of amount in invoice
        function totalAmountPrice(){
            var sum=0;
            $(".selling_price").each(function(){
                var value = $(this).val();
                if (!isNaN(value) && value.length != 0) {
                    sum += parseFloat(value);
                }
            });

            var discount_amount = parseFloat($('#discount_amount').val());
            if (!isNaN(discount_amount) && discount_amount.length != 0) {
                sum -= parseFloat(discount_amount);
            }

            $('#estimated_amount').val(sum);
        }

    });
</script>


<script type="text/javascript">
    $(function() {
        $(document).on('change','#category_id',function(){
            var category_id = $(this).val();
            $.ajax({
                url:"{{route('get-product')}}",
                type:"GET",
                data:{category_id:category_id},
                success:function(data){
                    var html = '<option value="">Select Product</option>';
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
    $(function() {
        $(document).on('change','#product_id',function(){
            var product_id = $(this).val();
            $.ajax({
                url:"{{route('check-product-stock')}}",
                type:"GET",
                data:{product_id:product_id},
                success:function(data){
                    $('#current_stock_qty').val(data);
                }
            });
        });
    });
</script>

<!-- Partisal Paid show New Customer Sign Up  --->
<script type="text/javascript">
// Paid Status
    $(document).on('change', '#paid_status', function() {
        var paid_status = $(this).val();
        if (paid_status == 'partial_paid') {
            $('.paid_amount').show();
        }else{
            $('.paid_amount').hide();
        }
    });

    // New Customer
    $(document).on('change', '#customer_id', function() {
        var customer_id = $(this).val();
        if (customer_id == '0') {
            $('.new_customer').show();
        }else{
            $('.new_customer').hide();
        }
    });
</script>

<!-- datepicker -->
<script>
    $('.datepicker').datepicker({
        uiLibrary: 'bootstrap4',
        format :'yyyy-mm-dd'
    });
</script>

@endsection
