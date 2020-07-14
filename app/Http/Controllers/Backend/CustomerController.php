<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Product;
use App\Model\Supplier;
use App\Model\Unit;
use App\Model\Category;
use App\Model\Purchase;
use App\Model\Invoice;
use App\Model\InvoiceDetail;
use App\Model\Payment;
use App\Model\PaymentDetail;
use App\Model\Customer;
use Auth;
use Session;
use DB;
use PDF;

class CustomerController extends Controller
{
    public function view(){ 
        $allData = Customer::all();
        return view('backend.customer.view-customer', compact('allData'));
    }

    public function add(){
        return view('backend.customer.add-customer');
    }

    public function store(Request $request){
        $customer = new Customer();
        $customer->name = $request->name;
        $customer->company = $request->company;
        $customer->mobile_no = $request->mobile_no;
        $customer->mobile_two = $request->mobile_two;
        $customer->mobile_three = $request->mobile_three;
        $customer->email = $request->email;
        $customer->position = $request->position;
        $customer->country = $request->country;
        $customer->state = $request->state;
        $customer->city = $request->city;
        $customer->address = $request->address;
        $customer->postal = $request->postal;
        $customer->cuit = $request->cuit;
        $customer->website = $request->website;
        $customer->created_by = Auth::user()->id;
        $customer->save();
        Session::flash('success');
        return redirect()->route('customers.view');
    }

    public function edit($id){
        $editData = Customer::find($id);
        return view('backend.customer.edit-customer', compact('editData'));
    }

    public function detail($id){
        $detailData = Customer::find($id);
        return view('backend.customer.detail', compact('detailData'));
    }

    public function update(Request $request, $id){
        $customer = Customer::find($id);
        $customer->name = $request->name;
        $customer->company = $request->company;
        $customer->mobile_no = $request->mobile_no;
        $customer->mobile_two = $request->mobile_two;
        $customer->mobile_three = $request->mobile_three;
        $customer->email = $request->email;
        $customer->position = $request->position;
        $customer->country = $request->country;
        $customer->state = $request->state;
        $customer->city = $request->city;
        $customer->address = $request->address;
        $customer->postal = $request->postal;
        $customer->cuit = $request->cuit;
        $customer->website = $request->website;
        $customer->updated_by = Auth::user()->id;
        $customer->save();
        Session::flash('success');
        return redirect()->route('customers.view');
    }

    public function delete($id){
        $customer = Customer::find($id);
        $customer->delete();
        return redirect()->route('customers.view');
    }

    public function creditCustomer(){
        $allData = Payment::whereIn('paid_status', ['full_due', 'partial_paid'])->get();
        return view('backend.customer.customer-credit', compact('allData'));
    }

    public function creditCustomerPdf(){
        $data['allData'] = Payment::whereIn('paid_status', ['full_due', 'partial_paid'])->get();
        $pdf = PDF::loadView('backend.pdf.customer-credit-pdf', $data);
        $pdf->SetProtection(['copy', 'print'], '', 'pass');
        return $pdf->stream('document.pdf');
    }

    public function editInvoice($invoice_id){
        $payment = Payment::where('invoice_id', $invoice_id)->first();
        return view('backend.customer.edit-invoice', compact('payment'));
    }

    public function updateInvoice(Request $request,$invoice_id){
        if($request->new_paid_amount<$request->paid_amount){
            return redirect()->back()->with('error');
        }else{
            $payment = Payment::where('invoice_id',$invoice_id)->first();
            $payment_details = new PaymentDetail();
            $payment->paid_status = $request->paid_status;
            if($request->paid_status=='full_paid'){
                $payment->paid_amount = Payment::where('invoice_id',$invoice_id)->first()['paid_amount']+$request->new_paid_amount;
                $payment->due_amount = '0';
                $payment_details->current_paid_amount = $request->new_paid_amount;
            }elseif($request->paid_status=='partial_paid'){
                $payment->paid_amount = Payment::where('invoice_id',$invoice_id)->first()['paid_amount']+$request->paid_amount;
                $payment->due_amount = Payment::where('invoice_id',$invoice_id)->first()[('due_amount')]-$request->paid_amount;
                $payment_details->current_paid_amount = $request->paid_amount;
            }
                $payment->save();
                $payment_details->invoice_id = $invoice_id;
                $payment_details->date = date('Y-m-d',strtotime($request->date));
                $payment_details->save();
                Session::flash('success');
                return redirect()->route('invoice.view');
            }
        }

            public function invoiceDetailsPdf($invoice_id){
            $data['payment'] = Payment::where('invoice_id', $invoice_id)->first();
            $pdf = PDF::loadView('backend.pdf.invoice-details-pdf', $data);
            $pdf->SetProtection(['copy', 'print'], '', 'pass');
            return $pdf->stream('document.pdf');

        }

        public function paidCustomer(){
            $allData = Payment::where('paid_status','!=','full_due')->get();
            return view('backend.customer.customer-paid', compact('allData'));
        }
    
        public function paidCustomerPdf(){
            $data['allData'] = Payment::where('paid_status','!=','full_due')->get();
            $pdf = PDF::loadView('backend.pdf.customer-paid-pdf', $data);
            $pdf->SetProtection(['copy', 'print'], '', 'pass');
            return $pdf->stream('document.pdf');
        }

        public function customerWiseReport(){
            $customers = Customer::all();
            return view('backend.customer.customer-wise-report', compact('customers'));
        }

        public function customerWiseCredit(Request $request){
            $data['allData'] = Payment::where('customer_id',$request->customer_id)->whereIn('paid_status',['full_due','partial_paid'])->get();
            $pdf = PDF::loadView('backend.pdf.customer-wise-credit-pdf', $data);
            $pdf->SetProtection(['copy','print'],'','pass');
            return $pdf->stream('document.pdf');
        }

        public function customerWisePaid(Request $request){
            $data['allData'] = Payment::where('customer_id',$request->customer_id)->where('paid_status','!=','full_due')->get();
            $pdf = PDF::loadView('backend.pdf.customer-wise-paid-pdf', $data);
            $pdf->SetProtection(['copy','print'],'','pass');
            return $pdf->stream('document.pdf');
        }


}

