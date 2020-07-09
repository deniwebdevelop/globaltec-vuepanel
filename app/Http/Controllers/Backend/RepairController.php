<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Repair;
use App\Model\Product;
use Auth;
use DB;
use Session;

class RepairController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $file = Repair::all();
        return view('backend.repair.view-repair', compact('file'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $repair_data = Repair::orderBy('id', 'desc')->first();
        if($repair_data == null){
            $firstReg = '4999';
            $data['repair_no'] = $firstReg+1;
        }else{
            $repair_data = Repair::orderBy('id', 'desc')->first()->repair_no;
            $data['repair_no'] = $repair_data+1;
        }
        $data['admission'] = date('Y-m-d');
        $data['products'] = Product::all();
        return view('backend.repair.create', $data);
        
    }

  

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = new Repair;
        if($request->file('file')){
            $file = $request->file('file');
            $filename = time().'.'.$file->getClientOriginalName();
            $request->file->move('storage/', $filename);
            $data->file = $filename;
        }
        $data->repair_no = $request->repair_no;
        $data->admission = date('Y-m-d',strtotime($request->admission));
        $data->labsent = date('Y-m-d',strtotime($request->labsent));
        $data->labreturn = date('Y-m-d',strtotime($request->labreturn));
        $data->deliver = date('Y-m-d',strtotime($request->deliver));
        $data->laboratory = $request->laboratory;
        $data->product_id = $request->product_id;
        $data->serial_number = $request->serial_number;
        $data->accesories = $request->accesories;
        $data->spare_1 = $request->spare_1;
        $data->spare_2 = $request->spare_2;
        $data->spare_3 = $request->spare_3;
        $data->spare_4 = $request->spare_4;
        $data->spare_5 = $request->spare_5;
        $data->labcost = $request->labcost;
        $data->labcost_coin = $request->labcost_coin;
        $data->repaircost = $request->repaircost;
        $data->repaircost_coin = $request->repaircost_coin;
        $data->transportcost = $request->transportcost;
        $data->transportcost_coin = $request->transportcost_coin;
        $data->markup = $request->markup;
        $data->markup_coin = $request->markup_coin;
        $data->repair_total = $request->repair_total;
        $data->fail_description = $request->fail_description;
        $data->repair_description = $request->repair_description;
        $data->status = $request->status;
        $data->save();
        Session::flash('success');
        return redirect()->route('repair.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Repair::find($id);
        return view('backend.repair.details', compact('data'));
    }


    public function download($file){
        return response()->download('storage/'.$file);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Repair::find($id);
        $product = Product::all();
        return view('backend.repair.edit', compact('data','product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = Repair::find($id);
        if($request->file('file')){
            $file = $request->file('file');
            $filename = time().'.'.$file->getClientOriginalName();
            $request->file->move('storage/', $filename);
            $data->file = $filename;
        }
        $data->admission = date('Y-m-d',strtotime($request->admission));
        $data->labsent = date('Y-m-d',strtotime($request->labsent));
        $data->labreturn = date('Y-m-d',strtotime($request->labreturn));
        $data->deliver = date('Y-m-d',strtotime($request->deliver));
        $data->laboratory = $request->laboratory;
        $data->product_id = $request->product_id;
        $data->serial_number = $request->serial_number;
        $data->accesories = $request->accesories;
        $data->spare_1 = $request->spare_1;
        $data->spare_2 = $request->spare_2;
        $data->spare_3 = $request->spare_3;
        $data->spare_4 = $request->spare_4;
        $data->spare_5 = $request->spare_5;
        $data->labcost = $request->labcost;
        $data->labcost_coin = $request->labcost_coin;
        $data->repaircost = $request->repaircost;
        $data->repaircost_coin = $request->repaircost_coin;
        $data->transportcost = $request->transportcost;
        $data->transportcost_coin = $request->transportcost_coin;
        $data->markup = $request->markup;
        $data->markup_coin = $request->markup_coin;
        $data->repair_total = $request->repair_total;
        $data->status = $request->status;
        $data->save();
        Session::flash('success');
        return redirect()->route('repair.index');   
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Repair::find($id);
        $data->delete();
        return redirect()->route('repair.index');
    }
}
