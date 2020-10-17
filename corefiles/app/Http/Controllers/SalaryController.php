<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Nurse;
use App\Model\Account;
use App\Model\NurseSalary; 
use App\Model\AccountHistory; 

use Brian2694\Toastr\Facades\Toastr;

class SalaryController extends Controller
{
    public function index(){
        if(\Auth::user()->role->permissions->read!=1){
            
            Toastr::warning(' You are not able to  access this Feature',"Access Denied");
            return redirect()->back();
        }
        $datas=Nurse::latest()->get();
        $accounts=Account::latest()->get();
        return view('backend.salary.index',compact('datas','accounts'));
    }


    public function payment(){
        $datas=Nurse::latest()->get();
        $accounts=Account::latest()->get();
        return view('backend.salary.payment',compact('datas','accounts'));
    }


    public function paymentStore(Request $request){

        if(\Auth::user()->role->permissions->create!=1){
            Toastr::warning(' You are not able to  access this Feature',"Access Denied");
            return redirect()->back();
        }
         $request->validate([
                'nurse_id'=>'required',
                'month'=>'required',
                'year'=>'required',
                'account_name'=>'required',
                'amount'=>'required',
                

         ]);

         $month=date('F-Y');

         $salaryPaymentMonth=$request->month.'-'.$request->year;

        $date=date('Y-m-d');

   
            
      $chekcPaymentStatus=$this->hasSalaryPayment( $salaryPaymentMonth,$request->nurse_id);
      if($chekcPaymentStatus==false){

        $accountInfo=Account::find( $request->account_name);
        $nurseInfo=Nurse::find($request->nurse_id);
        $nurseSalary=new NurseSalary;      		 			

        $nurseSalary->date=$date;
        $nurseSalary->month=$salaryPaymentMonth;
        $nurseSalary->salary=$request->amount;
        $nurseSalary->nurse_id=$request->nurse_id;
        $nurseSalary->nurse_name=$nurseInfo->name;
        $nurseSalary->payment_method_id=$request->account_name;
        $nurseSalary->method_name=$accountInfo->account_name;        
        $nurseSalary->created_by=\Auth::user()->name??'';
        $nurseSalary->save(); 

        $accountHistory=new AccountHistory;
        $accountHistory->date=$date;
        $accountHistory->month=$month;
        $accountHistory->account_id=$request->account_name; 
        $accountHistory->account_name=$accountInfo->account_name;
        $accountHistory->credit_amount=$request->amount;  /* if the Admin pay */  
        $accountHistory->debit_amount=0;  /* if the Customer pay */  
        $accountHistory->save();  
        Toastr::success('Nurse Salary has been Paid ',"Success");
        return redirect()->back();
    }else{
        Toastr::warning('Nurse Salary already has been Paid ',"Paid");
        return redirect()->back();
    }


    }


    public function hasSalaryPayment($month,$nurse_id)
    {
       $checkStatus= NurseSalary::where(['month'=>$month,'nurse_id'=>$nurse_id])->first();

       if(!$checkStatus){
           return false;
       }else{
           return true;
       }
    }


    public function paymentHistory(){
        $datas=NurseSalary::latest('id')->paginate(200);  
        return view('backend.salary.payment_history',compact('datas'));
    }
}
