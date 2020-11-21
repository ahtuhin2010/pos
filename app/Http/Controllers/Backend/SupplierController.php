<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Suppplier;
use Illuminate\Support\Facades\Auth;

class SupplierController extends Controller
{
    public function view()
    {
        $allData = Suppplier::all();
        return view ('backend.supplier.view-supplier', compact('allData'));
    }

    public function add()
    {
        return view('backend.supplier.add-supplier');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'mobile_no' => 'required',
            'email' => 'required|unique:supppliers,email',
            'address' => 'required',
        ]);

        $supplier = new Suppplier();
        $supplier->name = $request->name;
        $supplier->mobile_no = $request->mobile_no;
        $supplier->email = $request->email;
        $supplier->address = $request->address;
        $supplier->created_by = Auth::user()->id;
        $supplier->save();

        return redirect()->route('supplieres.view')->with('success', 'Data Inserted Successfully');
    }

    public function edit($id)
    {
        $editData = Suppplier::find($id);
        return view('backend.supplier.edit-supplier', compact('editData'));
    }

    public function update(Request $request, $id)
    {
        $supplier = Suppplier::find($id);
        $supplier->name = $request->name;
        $supplier->mobile_no = $request->mobile_no;
        $supplier->email = $request->email;
        $supplier->address = $request->address;
        $supplier->updated_by = Auth::user()->id;
        $supplier->save();

        return redirect()->route('supplieres.view')->with('success', 'Data Updated Successfully');
    }

    public function delete(Request $request)
    {
        $supplier = Suppplier::find($request->id);

        $supplier->delete();

        return redirect()->route('supplieres.view')->with('success', 'Data Deleted Successfully');
    }

}
