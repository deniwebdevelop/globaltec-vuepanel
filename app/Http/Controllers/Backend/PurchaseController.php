<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Product;
use App\Model\Customer;
use App\Model\Category;
use Auth;
use App\Model\Purchase;
use DB;
use PDF;
use Session;

class PurchaseController extends Controller
{
    public function view(){
    	$allData = Purchase::orderBy('date','desc')->orderBy('id','desc')->get();
    	return view('backend.purchase.view-purchase',compact('allData'));
    }

    public function add(){
        $data['customers'] = Customer::all();
        $data['products'] = Product::all();
        $data['categories'] = Category::all();
        $data['purchase'] = Purchase::all();
    	return view('backend.purchase.add-purchase',$data);
    }

    public function store(Request $request){
    	if($request->category_id == null){
            return redirect()->back();
        }else{
            $count_category = count($request->category_id);
         
            for ($i=0; $i <$count_category ; $i++) { 
                $purchase = new Purchase();
                $purchase->date = date('Y-m-d',strtotime($request->date[$i]));
                $purchase->purchase_no = $request->purchase_no[$i];
                $purchase->customer_id = $request->customer_id[$i];
                $purchase->category_id = $request->category_id[$i];
                $purchase->product_id = $request->product_id[$i];
                $purchase->coin = $request->coin;
                $purchase->origin = $request->origin;
                $purchase->buying_qty = $request->buying_qty[$i];
                $purchase->unit_price = $request->unit_price[$i];
                $purchase->buying_price = $request->buying_price[$i];
                $purchase->description = $request->description[$i];
                $purchase->created_by = Auth::user()->id;
                $purchase->status = '0';
                $purchase->save();
            }
        }

        return redirect()->route('purchase.view')->with('success','Data saved successfully');
    }

    public function delete($id){
        $purchase = Purchase::find($id);
        $purchase->delete();
        return redirect()->route('purchase.view')->with('success','Data deleted successfully');
    }

    public function pendingList(){
        $allData = Purchase::orderBy('date','desc')->orderBy('id','desc')->where('status','0')->get();
        return view('backend.purchase.view-pending-list',compact('allData'));
    }

    public function approve($id){
        $purchase = Purchase::find($id);
        $product = Product::where('id',$purchase->product_id)->first();
        $purchase_qty = ((float)($purchase->buying_qty))+((float)($product->quantity));
        $product->quantity = $purchase_qty;
        if($product->save()){
            DB::table('purchases')
                    ->where('id', $id)
                    ->update(['status' => 1]);
        }
        return redirect()->route('purchase.view');
    }

    public function purchaseReport(){
        return view('backend.purchase.daily-purchase-report');
    }

    public function purchaseReportPdf(Request $request){
        $sdate = date('Y-m-d',strtotime($request->start_date));
        $edate = date('Y-m-d',strtotime($request->end_date));
        $data['allData'] = Purchase::whereBetween('date',[$sdate,$edate])->where('status','1')->orderBy('customer_id')->orderBy('category_id')->orderBy('product_id')->get();
        $data['start_date'] = date('Y-m-d',strtotime($request->start_date));
        $data['end_date'] = date('Y-m-d',strtotime($request->end_date));
        $pdf = PDF::loadView('backend.pdf.daily-purchase-report-pdf', $data);
        $pdf->SetProtection(['copy', 'print'], '', 'pass');
        return $pdf->stream('document.pdf');
    }
}
