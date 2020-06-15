<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Repair;
use Auth;
use Session;

class RepairController extends Controller
{
    public function view(){ 
        $allData = Repair::all();
        return view('backend.repair.view-repair', compact('allData'));
    }

    public function add(){
        return view('backend.repair.add-repair');
    }

    public function store(Request $request){
        $repair = new Repair();
        $repair->number = $request->number;
        $repair->lab = $request->lab;
        $repair->entry = $request->entry;
        $repair->sent = $request->sent;
        $repair->dev = $request->dev;
        $repair->deliver = $request->deliver;
        $repair->serial = $request->serial;
        $repair->labcost = $request->labcost;
        $repair->sparecost = $request->sparecost;
        $repair->shipcost = $request->shipcost;
        $repair->markup = $request->markup;
        $repair->file = $request->file;
        $repair->created_by = Auth::user()->id;
        $repair->save();
        Session::flash('success');
        return redirect()->route('repair.view');
    }

    public function edit($id){
        $editData = Repair::find($id);
        return view('backend.repair.edit-repair', compact('editData'));
    }

    public function update(Request $request, $id){
        $repair = Repair::find($id);
        $repair->repair_no = $request->repair_no;
        $repair->lab = $request->lab;
        $repair->entry = $request->entry;
        $repair->sent = $request->sent;
        $repair->dev = $request->dev;
        $repair->deliver = $request->deliver;
        $repair->serial = $request->serial;
        $repair->labcost = $request->labcost;
        $repair->sparecost = $request->sparecost;
        $repair->shipcost = $request->shipcost;
        $repair->markup = $request->markup;
        $repair->file = $request->file;
        $repair->created_by = Auth::user()->id;
        $repair->save();
        Session::flash('success');
        return redirect()->route('reapair.view');
    }

    public function delete($id){
        $repair = Repair::find($id);
        $repair->delete();
        return redirect()->route('repair.view');
    }
}








