<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Product;
use App\Model\Suppplier;
use App\Model\Unit;
use App\Model\Category;
use App\Model\Purchase;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use PDF;

class PurchaseController extends Controller
{
    public function view()
    {
        $allData = Purchase::orderBy('date', 'desc')->orderBy('id', 'desc')->get();
        return view('backend.purchase.view-purchase', compact('allData'));
    }

    public function add()
    {
        $data['suppliers'] = Suppplier::all();
        $data['units'] = Unit::all();
        $data['categories'] = Category::all();
        return view('backend.purchase.add-purchase', $data);
    }

    public function store(Request $request)
    {
        if ($request->category_id == null) {
            return redirect()->back()->with('error', 'Sorry! you do not select any item');
        } else {
            $count_category = count($request->category_id);
            for ($i=0; $i < $count_category ; $i++) {
                $purechase = new Purchase();
                $purechase->date = date('Y-m-d',strtotime ($request->date[$i]));
                $purechase->purchase_no = $request->purchase_no[$i];
                $purechase->supplier_id = $request->supplier_id[$i];
                $purechase->category_id = $request->category_id[$i];
                $purechase->product_id = $request->product_id[$i];
                $purechase->buying_qty = $request->buying_qty[$i];
                $purechase->unit_price = $request->unit_price[$i];
                $purechase->buying_price = $request->buying_price[$i];
                $purechase->description = $request->description[$i];
                $purechase->created_by = Auth::user()->id;
                $purechase->status = 0;
                $purechase->save();
            }
        }

        return redirect()->route('purchases.view')->with('success', 'Data Inserted Successfully');
    }

    public function delete(Request $request)
    {
        $purechase = Purchase::find($request->id);

        $purechase->delete();

        return redirect()->route('purchases.view')->with('success', 'Data Deleted Successfully');
    }

    public function pendingList()
    {
        $allData = Purchase::orderBy('date', 'desc')->orderBy('id', 'desc')->where('status', '0')->get();
        return view('backend.purchase.view-pending-list', compact('allData'));
    }

    public function approve(Request $request)
    {
        $purechase = Purchase::find($request->id);
        $product = Product::where('id', $purechase->product_id)->first();
        $purechase_qty = ((float) ($purechase->buying_qty)) + ((float) ($product->quantity));
        $product->quantity = $purechase_qty;
        if ($product->save()) {
            DB::table('purchases')
                ->where('id', $request->id)
                ->update(['status' => 1]);
        }
        return redirect()->route('purchases.pending.list')->with('success', 'Data Approved Successfully');
    }

    public function purchaseReport()
    {
        return view('backend.purchase.daily-purchase-report');
    }

    public function purchaseReportPdf(Request $request)
    {
        $sdate = date('Y-m-d', strtotime($request->start_date));
        $edate = date('Y-m-d', strtotime($request->end_date));
        $data['allData'] = Purchase::whereBetween('date', [$sdate, $edate])->where('status', 1)->orderBy('supplier_id')->orderBy('category_id')->orderBy('product_id')->get();
        $data['start_date'] = date('Y-m-d', strtotime($request->start_date));
        $data['end_date'] = date('Y-m-d', strtotime($request->end_date));

        $pdf = PDF::loadView('backend.pdf.daily-purchase-report-pdf', $data);
        $pdf->SetProtection(['copy', 'print'], '', 'pass');
        return $pdf->stream('document.pdf');
    }

}
