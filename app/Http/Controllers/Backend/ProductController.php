<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Product;
use App\Model\Supplier;
use App\Model\Unit;
use App\Model\Category;
use Auth;
use Session;

class ProductController extends Controller
{
    public function view(){ 
        $file = Product::all();
        return view('backend.product.view-product', compact('file'));
    }

    public function add(){
        $product['suppliers'] = Supplier::all();
        $product['units'] = Unit::all();
        $product['categories'] = Category::all();
        return view('backend.product.add-product', $product);
    }

    public function store(Request $request){
        $product = new Product();
        if($request->file('file')){
            $file = $request->file('file');
            $filename = time().'.'.$file->getClientOriginalName();
            $request->file->move('storage/', $filename);
            $product->file = $filename;
        }
        $product->supplier_id = $request->supplier_id;
        $product->unit_id = $request->unit_id;
        $product->category_id = $request->category_id;
        $product->name = $request->name;
        $product->brand = $request->brand;
        $product->model = $request->model;
        $product->coin = $request->coin;
        $product->quantity = '0';
        $product->created_by = Auth::user()->id;
        $product->save();
        Session::flash('success');
        return redirect()->route('products.view');
    }

    public function show($id)
    {
        $product = Product::find($id);
        return view('backend.product.details', compact('product'));
    }


    public function download($file){
        return response()->download('storage/'.$file);
    }

    public function edit($id){
        $data['editData'] = Product::find($id);
        $data['suppliers'] = Supplier::all();
        $data['units'] = Unit::all();
        $data['categories'] = Category::all();
        return view('backend.product.edit-product', $data);
    }

    public function update(Request $request, $id){
        $product = Product::find($id);
        $product->supplier_id = $request->supplier_id;
        $product->unit_id = $request->unit_id;
        $product->category_id = $request->category_id;
        $product->name = $request->name;
        $product->brand = $request->brand;
        $product->model = $request->model;
        $product->coin = $request->coin;
        $product->updated_by = Auth::user()->id;
        $product->save();
        Session::flash('success');
        return redirect()->route('products.view');
    }

    public function delete($id){
        $product = Product::find($id);
        $product->delete();
        return redirect()->route('products.view');
    }
}

