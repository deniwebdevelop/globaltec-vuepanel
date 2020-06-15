<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Supplier;
use Auth;
use Session;

class SupplierController extends Controller
{
    public function view(){ 
        $allData = Supplier::all();
        return view('backend.supplier.view-supplier', compact('allData'));
    }

    public function add(){
        return view('backend.supplier.add-supplier');
    }

    public function store(Request $request){
        $supplier = new Supplier();
        $supplier->name = $request->name;
        $supplier->company = $request->company;
        $supplier->mobile_no = $request->mobile_no;
        $supplier->mobile_two = $request->mobile_two;
        $supplier->mobile_three = $request->mobile_three;
        $supplier->email = $request->email;
        $supplier->position = $request->position;
        $supplier->city = $request->city;
        $supplier->address = $request->address;
        $supplier->postal = $request->postal;
        $supplier->cuit = $request->cuit;
        $supplier->website = $request->website;
        $supplier->created_by = Auth::user()->id;
        $supplier->save();
        Session::flash('success');
        return redirect()->route('suppliers.view');
    }

    public function edit($id){
        $editData = Supplier::find($id);
        return view('backend.supplier.edit-supplier', compact('editData'));
    }

    public function update(Request $request, $id){
        $supplier = Supplier::find($id);
        $supplier->name = $request->name;
        $supplier->company = $request->company;
        $supplier->mobile_no = $request->mobile_no;
        $supplier->mobile_two = $request->mobile_two;
        $supplier->mobile_three = $request->mobile_three;
        $supplier->email = $request->email;
        $supplier->position = $request->position;
        $supplier->city = $request->city;
        $supplier->address = $request->address;
        $supplier->postal = $request->postal;
        $supplier->cuit = $request->cuit;
        $supplier->website = $request->website;
        $supplier->updated_by = Auth::user()->id;
        $supplier->save();
        Session::flash('success');
        return redirect()->route('suppliers.view');
    }

    public function delete($id){
        $supplier = Supplier::find($id);
        $supplier->delete();
        return redirect()->route('suppliers.view');
    }
}

