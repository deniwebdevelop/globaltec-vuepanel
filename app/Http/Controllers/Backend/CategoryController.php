<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Category;
use Auth;
use Session;

class CategoryController extends Controller
{
    public function view(){ 
        $allData = Category::all();
        return view('backend.category.view-category', compact('allData'));
    }

    public function add(){
        return view('backend.category.add-category');
    }

    public function store(Request $request){
        $category = new Category();
        $category->type = $request->type;
        $category->name = $request->name;
        $category->created_by = Auth::user()->id;
        $category->save();
        Session::flash('success');
        return redirect()->route('categories.view');
    }

    public function edit($id){
        $editData = Category::find($id);
        return view('backend.category.edit-category', compact('editData'));
    }

    public function update(Request $request, $id){
        $category = Category::find($id);
        $category->type = $request->type;
        $category->name = $request->name;
        $category->updated_by = Auth::user()->id;
        $category->save();
        Session::flash('success');
        return redirect()->route('categories.view');
    }

    public function delete($id){
        $category = Category::find($id);
        $category->delete();
        return redirect()->route('categories.view');
    }
}