<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Product;
use App\Model\Customer;
use App\Model\Unit;
use App\Model\Category;
use Auth;
use App\Model\Purchase;

class DefaultController extends Controller
{
    public function getCategory(Request $request){
    	$customer_id = $request->customer_id;
    	$allCategory = Product::with(['category'])->select('category_id')->where('customer_id',$customer_id)->groupBy('category_id')->get();
    	// dd($allCategory->toArray());
    	return response()->json($allCategory);
    }

    public function getProduct(Request $request){
    	$category_id = $request->category_id;
    	$allProduct = Product::where('category_id',$category_id)->get();
    	return response()->json($allProduct);
    }

    public function getStock(Request $request){
        $product_id = $request->product_id;
        $stock = Product::where('id',$product_id)->first()->quantity;
        return response()->json($stock);
    }
    
}
