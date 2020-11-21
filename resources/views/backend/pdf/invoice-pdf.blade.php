<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Invoice PDF</title>
</head>
<body>
     <div class="container">
         <div class="row">
             <div class="col-md-12">
                 <table width="100%" style="margin-bottom: 20px">
                     <tbody>
                         <tr>
                            <td style="width: 30%"><strong>Invoice No #{{ $invoice->invoice_no }}</strong></td>
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
                             <td  width="45%"></td>
                             <td>
                                 <u><strong><span style="font-size: 15px">Customer Invoice</span></strong></u>
                             </td>
                             <td  width="30%"></td>
                         </tr>
                     </tbody>
                 </table>
             </div>
         </div>
        <div class="row">
            <div class="col-md-12">
                @php
                    $payment = App\Model\Payment::where('invoice_id', $invoice->id)->first();
                @endphp
                <table width="100%" style="margin-bottom: 10px">
                    <tbody>
                        <tr>
                            <td width="30%"><strong>Name : </strong> {{ $payment['customer']['name'] }}</td>
                            <td width="30%"><strong>Mobile No : </strong> {{ $payment['customer']['mobile_no'] }}</td>
                            <td width="40%"><strong>Address : </strong> {{ $payment['customer']['address'] }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <table border="1" width="100%" style="margin-bottom: 20px; text-align:center">
                    <thead>
                        <tr>
                            <th>SL.</th>
                            <th>Category</th>
                            <th>Product Name</th>
                            <th>Quantity</th>
                            <th>Unit Price</th>
                            <th>Total Price</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $total_sum = 0;
                        @endphp
                        @foreach ($invoice['invoice_details'] as $key=> $details)
                        <tr>
                            <td>{{ $key+1 }}</td>
                            <td>{{ $details['category']['name'] }}</td>
                            <td>{{ $details['product']['name'] }}</td>
                            <td>{{ $details->selling_qty }}</td>
                            <td>{{ $details->unit_price }}</td>
                            <td>{{ $details->selling_price }}</td>
                        </tr>
                        @php
                            $total_sum += $details->selling_price;
                        @endphp
                        @endforeach
                        <tr>
                            <td colspan="5" style="text-align:right; padding-right:20px"><strong>Sub Total </strong></td>
                            <td><strong>{{ $total_sum }}</strong></td>
                        </tr>
                        <tr>
                            <td colspan="5" style="text-align:right; padding-right:20px">Discount</td>
                            <td>{{ $payment->discount_amount }}</td>
                        </tr>
                        <tr>
                            <td colspan="5" style="text-align:right; padding-right:20px">Paid Amount</td>
                            <td>{{ $payment->paid_amount }}</td>
                        </tr>
                        <tr>
                            <td colspan="5" style="text-align:right; padding-right:20px">Due Amount</td>
                            <td>{{ $payment->due_amount }}</td>
                        </tr>
                        <tr>
                            <td colspan="5" style="text-align:right; padding-right:20px"><strong>Grand Total </strong></td>
                            <td><strong>{{ $payment->total_amount }}</strong></td>
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
                                <p class="text-align: center;">Customer Signature</p>
                            </td>
                            <td style="width: 20%"></td>
                            <td style="width: 40%">
                                 <p class="text-align: center; ">Seller Signature</p>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
     </div>
</body>
</html>
