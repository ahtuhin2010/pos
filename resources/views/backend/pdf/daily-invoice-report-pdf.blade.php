<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Daily Invoice Report PDF</title>
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
                             <td  width="25%"></td>
                             <td>
                                 <u><strong><span style="font-size: 15px">Daily Invoice Report ({{ date('d-m-Y',strtotime($start_date))}} - {{ date('d-m-Y',strtotime($end_date)) }})</span></strong></u>
                             </td>
                             <td></td>
                         </tr>
                     </tbody>
                 </table>
             </div>
         </div>
         <div class="row">
             <div class="col-md-12">
                 <table border="1" width="100%" style="margin-bottom: 20px; text-align:center;">
                    <thead>
                        <tr>
                            <th>SL.</th>
                            <th>Customer Name</th>
                            <th>Invoice No </th>
                            <th>Date</th>
                            <th>Description</th>
                            <th>Amount</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $total_sum = 0;
                        @endphp
                        @foreach($allData as $key => $invoice)
                        <tr class="{{ $invoice->id }}">
                            <td>{{ $key+1 }}</td>
                            <td>
                                {{ $invoice['payment']['customer']['name'] }}
                                ({{ $invoice['payment']['customer']['mobile_no'] }} - {{ $invoice['payment']['customer']['address'] }})
                            </td>
                            <td>Invoice No #{{ $invoice->invoice_no }}</td>
                            <td>{{ date('d-m-Y',strtotime($invoice->date)) }}</td>
                            <td>{{ $invoice->description }}</td>
                            <td>{{ $invoice['payment']['total_amount'] }}</td>
                            @php
                                $total_sum += $invoice['payment']['total_amount']
                            @endphp
                        </tr>
                        @endforeach
                        <tr>
                            <td colspan="5" style="text-align:right; padding-right:20px"><strong>Grand Total</strong></td>
                            <td><strong>{{ $total_sum }}</strong></td>
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
