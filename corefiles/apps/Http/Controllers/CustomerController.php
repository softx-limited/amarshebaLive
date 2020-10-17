<?php

namespace App\Http\Controllers;

use App\Model\Customer;
use App\Model\CustomerHistory;
use App\Model\Account;
use App\Model\Income;
use App\Model\AccountHistory;



use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
class CustomerController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function getCustomerList (){
        if(\Auth::user()->role->permissions->read!=1){
            Toastr::warning(' You are not able to  access this Feature',"Access Denied");
            return redirect()->back();
        }

        $datas=Customer::latest()->paginate(20);

            return view('backend.customer.index',compact('datas'));

    }

    public function storeCustomerInfo(Request $request){

        if(\Auth::user()->role->permissions->create!=1){
            Toastr::warning(' You are not able to  access this Feature',"Access Denied");
            return redirect()->back();
        }

    	 $request->validate([

            'customer_name'=>'required',
            'customer_mobile'=>'required|unique:customers,customer_mobile',
            'customer_email'=>'required',
            'customer_address'=>'required',

        ]);

        $requestData=$request->except('_token');

        // dd($requestData);


        Customer::insert($requestData);


         Toastr::success('Customer Account  has been Created',"Created");

            return redirect()->route('customerlist');



    }


    public function update(Request $request,$id){

        if(\Auth::user()->role->permissions->update!=1){
            Toastr::warning(' You are not able to  access this Feature',"Access Denied");
            return redirect()->back();
        }

        $request->validate([

            'customer_name'=>'required',
            'customer_mobile'=>'required',
            'customer_email'=>'required',
            'customer_address'=>'required',

        ]);


        Customer::find($id)->update($request->all());

        Toastr::info('Customer Account  has been Updated',"Updated");

        return redirect()->route('customerlist');


    }


     public function destroy($id)
    {
        if(\Auth::user()->role->permissions->delete!=1){
            Toastr::warning(' You are not able to  access this Feature',"Access Denied");
            return redirect()->back();
        }
        Customer::find($id)->delete();


        Toastr::warning('Customer Account  has been Deleted',"Deleted");

        return redirect()->route('customerlist');


    }

    public function accountInformation($customer_id)
    {
        $datas= CustomerHistory::where('customer_id',$customer_id)->orderBy('id','ASC')->get();
        $customer_id=$customer_id;
        $accounts=Account::latest()->get();
        return view('backend.customer.customer_history',compact('datas','accounts','customer_id'));
    }


    public function customerDuePayment(Request $request)
    {
        // dd($request->all());

        $customerInfo=Customer::find($request->customer_id);
        $month=date('F-Y');
        $date=date('Y-m-d');

        $invoice_no='payment_'.rand(0,9).time();


        $custAccountHistory=new CustomerHistory;    
        $custAccountHistory->date=$date;
        $custAccountHistory->month=$month;
        $custAccountHistory->customer_id=$request->customer_id;
        $custAccountHistory->customer_name=$customerInfo->customer_name;
        $custAccountHistory->invoice_no=$invoice_no;
        $custAccountHistory->debit_amount=$request->pay_amount?? 0;
        $custAccountHistory->credit_amount=0;
        $custAccountHistory->created_by=\Auth::user()->name??'Unknown';
        $custAccountHistory->save();

        
        /*Account History Start here*/
        $accountInfo=AccountHistory::find($request->pay_method);

        $accountHistory=new AccountHistory;
       
        $accountHistory->date=$date;
        $accountHistory->month=$month;
        $accountHistory->account_id=$request->pay_method; 
        $accountHistory->account_name=$accountInfo->account_name;
        $accountHistory->debit_amount=$request->pay_amount??0;  /* if the Customer pay */  
        $accountHistory->save();  

        /*Account History End here*/
        
        $incomeObj=new Income;
        $incomeObj->date=$date;
        $incomeObj->month=$month;
        $incomeObj->notation="Income from  payment";
        $incomeObj->category_name="customer_payment"; 
        $incomeObj->amount=$request->pay_amount??0 ;
        $incomeObj->save();


        
        Toastr::warning('Customer Payment has been completed',"Payment");

        return redirect()->back();


    }
}
