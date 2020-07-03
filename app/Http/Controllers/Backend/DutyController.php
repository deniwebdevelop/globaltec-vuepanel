<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Duty;
use App\Model\Customer;
use Session;
use Auth;

class DutyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $duty = Duty::all();
        return view('backend.duty.index', compact('duty'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['customers'] = Customer::all();
        return view('backend.duty.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       
        $duty = new Duty();
        $duty->date = date('Y-m-d',strtotime($request->date));
        $duty->customer_id = $request->customer_id;
        $duty->descripcion = $request->descripcion;
        $duty->status = $request->status;
        $duty->created_by = Auth::user()->id;
        Session::flash('success');
        $duty->save();
        return redirect()->route('duty.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\Duty  $duty
     * @return \Illuminate\Http\Response
     */
    public function show(Duty $duty)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\Duty  $duty
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $duty = Duty::find($id);
        return view('backend.duty.edit', compact('duty'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\Duty  $duty
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $duty = Duty::find($id);
        $duty->date = date('Y-m-d',strtotime($request->date));
        $duty->descripcion = $request->descripcion;
        $duty->status = $request->status;
        $duty->created_by = Auth::user()->id;
        Session::flash('success');
        $duty->save();
        return redirect()->route('duty.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\Duty  $duty
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $duty = Duty::find($id);
        $duty->delete();
        return redirect()->route('duty.index');
    }
}
