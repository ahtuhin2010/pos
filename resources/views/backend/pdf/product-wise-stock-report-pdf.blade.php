<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Product Wise Stock Report PDF</title>
</head>
<body>
     <div class="container">
         <div class="row">
             <div class="col-md-12">
                 <table width="100%" style="margin-bottom: 20px">
                     <tbody>
                         <tr>
                            <td style="width: 30%"></td>
                            <td style="width: 40%">
                                <span style="font-size:20px; background: #1781BF; padding: 3px 10px 3px 10px; color: #fff;">ahTuhin Shopping Mall</span> <br>
                                    Dattapara, Biruliya, Savar, <br> Dhaka - 1216
                            </td>
                            <td style="width: 30%">
                                <span>
                                    Owner No : 01923552130 <br>
                                    Showroom No : 0181115018
                                </span>
                            </td>
                         </tr>
                     </tbody>
                 </table>
             </div>
         </div>
         <div class="row">
             <div class="col-md-12">
                 <hr style="margin-bottom: 0px">
                 <table style="margin-bottom: 20px; margin-top:20px">
                     <tbody>
                         <tr>
                             <td  width="50%"></td>
                             <td>
                                 <u><strong><span style="font-size: 15px">Product Wise Stock Report </span></strong></u>
                             </td>
                             <td></td>
                         </tr>
                     </tbody>
                 </table>
             </div>
         </div>
         <div class="row">
             <div class="col-md-12">
                 <strong>
                 <table border="1" width="100%" style="margin-bottom: 20px; text-align:center; margin-top:20px;">
                    <thead>
                        <tr>
                            <th>Supplier Name</th>
                            <th>Category</th>
                            <th>Product Name</th>
                            <th>In.Qty</th>
                            <th>Out.Qty</th>
                            <th>Stock</th>
                            <th>Unit</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $buying_total = App\Model\Purchase::where('category_id', $product->category_id)->where('product_id',$product->id)->where('status',1)->sum('buying_qty');
                            $selling_total = App\Model\InvoiceDetail::where('category_id',$product->category_id)->where('product_id',$product->id)->where('status',1)->sum('selling_qty');
                        @endphp
                        <tr class="{{ $product->id }}">
                            <td>{{ $product['supplier']['name'] }}</td>
                            <td>{{ $product['category']['name'] }}</td>
                            <td>{{ $product->name }}</td>
                            <td>{{ $buying_total }}</td>
                            <td>{{ $selling_total }}</td>
                            <td>{{ $product->quantity }}</td>
                            <td>{{ $product['unit']['name'] }}</td>
                        </tr>
                    </tbody>
                </table>
                @php
                    $date = new DateTime('now', new DateTimezone('Asia/Dhaka'));
                @endphp
                <i>Printing Time : {{ $date->format('F j, Y, g:i a') }}</i>
             </div>
         </div>
        <div class="row">
            <div class="col-md-12">
                <hr style="margin-bottom: 0px">
                <table border="0" width="100%" style="margin-top: 100px">
                    <tbody>
                        <tr>
                            <td style="width: 40%">
                                <p class="text-align: center;">Owner Signature</p>
                            </td>
                            <td style="width: 20%"></td>
                            <td style="width: 40%">
                                 <p class="text-align: center; ">Manager Signature</p>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
     </div>
</body>
</html>
