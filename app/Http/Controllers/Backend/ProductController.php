<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Product;
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
        $product->category_id = $request->category_id;
        $product->name = $request->name;
        $product->brand = $request->brand;
        $product->description = $request->description;
        $product->fob = $request->fob;
        $product->sale_price = $request->sale_price;
        $product->coin = $request->coin;
        $product->sale_coin = $request->sale_coin;
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
        $data['categories'] = Category::all();
        return view('backend.product.edit-product', $data);
    }

    public function update(Request $request, $id){
        $product = Product::find($id);
        if($request->file('file')){
            $file = $request->file('file');
            $filename = time().'.'.$file->getClientOriginalName();
            $request->file->move('storage/', $filename);
            $product->file = $filename;
        }
        $product->category_id = $request->category_id;
        $product->name = $request->name;
        $product->brand = $request->brand;
        $product->description = $request->description;
        $product->fob = $request->fob;
        $product->sale_price = $request->sale_price;
        $product->coin = $request->coin;
        $product->sale_coin = $request->sale_coin;
        $product->quantity = '0';
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

