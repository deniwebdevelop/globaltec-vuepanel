<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Ptype;
use Auth;

class PtypeController extends Controller
{
    public function view(){ 
        $allData = Ptype::all();
        return view('backend.ptype.view', compact('allData'));
    }

    public function add(){
        return view('backend.ptype.add-ptype');
    }

    public function store(Request $request){
        $ptype = new Ptype();
        $ptype->name = $request->name;
        $ptype->created_by = Auth::user()->id;
        $ptype->save();
        return redirect()->route('ptype.view');
    }

    public function edit($id){
        $editData = Ptype::find($id);
        return view('backend.ptype.edit-ptype', compact('editData'));
    }

    public function update(Request $request, $id){
        $ptype = Ptype::find($id);
        $ptype->name = $request->name;
        $ptype->updated_by = Auth::user()->id;
        $ptype->save();
        return redirect()->route('ptype.view');
    }

    public function delete($id){
        $ptype = Ptype::find($id);
        $ptype->delete();
        return redirect()->route('ptype.view');
    }
}
