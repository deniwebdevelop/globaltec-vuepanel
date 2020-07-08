<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Product;
use App\Model\Category;
use Auth;
use PDF;

class StockController extends Controller
{
    public function stockReport(){ 
        $allData = Product::orderBy('model','asc')->orderBy('category_id','asc')->get();
        return view('backend.stock.stock-report', compact('allData'));
    }

    public function stockReportPdf(){
        $data['allData'] = Product::orderBy('product_id','asc')->orderBy('category_id','asc')->get();
        $pdf = PDF::loadView('backend.pdf.stock-report-pdf', $data);
        $pdf->SetProtection(['copy', 'print'],'', 'pass');
        return $pdf->stream('document.pdf');
    }

    public function supplierProductWise(){
        $data['products'] = Product::all();
        $data['categories'] = Category::all();
        return view('backend.stock.supplier-product-wise-report', $data);
    }


    public function productWisePdf(Request $request){
        $data['product'] = Product::where('category_id', $request->category_id)->where('id', $request->product_id)->first();
        $pdf = PDF::loadView('backend.pdf.product-wise-stock-report-pdf', $data);
        $pdf->SetProtection(['copy', 'print'], '', 'pass');
        return $pdf->stream('document.pdf');
    }
}
