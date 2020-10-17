<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Patient;
use App\Model\Nurse;
use App\Model\NurseHistory;
use App\Model\PatientHistory;
use App\Model\Account;
use App\Model\AccountHistory;
use App\Model\Income;


use Brian2694\Toastr\Facades\Toastr;
class PatientController extends Controller
{
   

    public function index()
    {
        if(\Auth::user()->role->permissions->read!=1){
            Toastr::warning(' You are not able to  access this Feature',"Access Denied");
            return redirect()->back();
        }
        $datas=Patient::latest()->paginate(100);

        return view('backend.patient.index',compact('datas'));
        
    }

    public function store(Request $request){

        if(\Auth::user()->role->permissions->create!=1){
            Toastr::warning(' You are not able to  access this Feature',"Access Denied");
            return redirect()->back();
        }

            $month=date('F-Y');
            $date=date('Y-m-d');
            $patientObj=new Patient;
            $patientObj->date=$date;
            $patientObj->month=$month;
            $patientObj->patient_name=$request->patient_name;
            $patientObj->patient_age=$request->patient_age;
            $patientObj->patient_gender=$request->patient_gender;
            $patientObj->patient_mobile=$request->patient_mobile;
            $patientObj->patient_name=$request->patient_name;
            $patientObj->patient_address=$request->patient_address;
            $patientObj->patient_gurdian_name=$request->patient_gurdian_name;
            $patientObj->patient_gurdian_age=$request->patient_gurdian_age;
            $patientObj->patient_gurdian_address=$request->patient_gurdian_address;
            $patientObj->patient_gurdian_nid=$request->patient_gurdian_nid;
            $patientObj->patient_gurdian_boc=$request->patient_gurdian_boc;
            $patientObj->patient_gurdian_passport=$request->patient_gurdian_passport;
            $patientObj->patient_gurdian_mobile=$request->patient_gurdian_mobile;
            $patientObj->total_budget=$request->total_budget;
            $patientObj->nurse_budget=$request->nurse_budget;
            $patientObj->status=0;
            $patientObj->save();

            if($request->total_budget>0){
            $accountHistory=new PatientHistory;
            $accountHistory->date=$date;          
            $accountHistory->month=$month;           
            $accountHistory->patient_id=$patientObj->id;            
            $accountHistory->patient_name=$request->patient_name;  
            $accountHistory->credit_amount=$request->total_budget;  /* if the Customer pay */  
            $accountHistory->created_by=\Auth::user()->name;     
            $accountHistory->save(); 
            }


            Toastr::success('Patient Account has been Successfully Created',"Created");
            return redirect()->route('patient.list');
   
  

    }


    public function update(Request $request,$id){

        if(\Auth::user()->role->permissions->update!=1){
            Toastr::warning(' You are not able to  access this Feature',"Access Denied");
            return redirect()->back();
        }

        $month=date('F-Y');
        $date=date('Y-m-d');

        $patientObj=Patient::find($id); 

      
        if($request->total_budget>0){
        $deleteExitingData=PatientHistory::where(['patient_id'=>$id,'credit_amount'=>$patientObj->total_budget])->delete();  
        $accountHistory=new PatientHistory;
        $accountHistory->date=$date;          
        $accountHistory->month=$month;           
        $accountHistory->patient_id=$patientObj->id;            
        $accountHistory->patient_name=$request->patient_name;  
        $accountHistory->credit_amount=$request->total_budget;        
        $accountHistory->created_by=\Auth::user()->name;     
        $accountHistory->save();
        } 
        
      

        $patientObj->patient_name=$request->patient_name;
        $patientObj->patient_age=$request->patient_age;
        $patientObj->patient_gender=$request->patient_gender;
        $patientObj->patient_mobile=$request->patient_mobile;
        $patientObj->patient_name=$request->patient_name;
        $patientObj->patient_address=$request->patient_address;
        $patientObj->patient_gurdian_name=$request->patient_gurdian_name;
        $patientObj->patient_gurdian_age=$request->patient_gurdian_age;
        $patientObj->patient_gurdian_address=$request->patient_gurdian_address;
        $patientObj->patient_gurdian_nid=$request->patient_gurdian_nid;
        $patientObj->patient_gurdian_boc=$request->patient_gurdian_boc;
        $patientObj->patient_gurdian_passport=$request->patient_gurdian_passport;
        $patientObj->patient_gurdian_mobile=$request->patient_gurdian_mobile;
        $patientObj->total_budget=$request->total_budget;
        $patientObj->nurse_budget=$request->nurse_budget;
        $patientObj->status=0;
        $patientObj->save();         
             
        


        Toastr::info('Patient Account has been Successfully Updated',"Updated");
        return redirect()->route('patient.list');
    }


    public function completedService($id)
    {
        $patientObj=Patient::find($id); 
        $patientObj->status=1;
        $patientObj->save();
        Toastr::success('Patient service has been completed',"completed");
        return redirect()->route('patient.list');
         
    }


    public function assignNurse(){


        $datas=Patient::where('status',0)->latest()->get();
        $nurses=Nurse::latest()->get();

        return view('backend.nurse_assign.index',compact('datas','nurses'));

    }


    public function updateAssignNurse(Request $request,$id){
        if(\Auth::user()->role->permissions->update!=1){
            Toastr::warning(' You are not able to  access this Feature',"Access Denied");
            return redirect()->back();
        }

        $nurse_info=Nurse::find($request->assigned_nurse);

        $Patient_info=Patient::find($id);     
        $Patient_info->assign_nurse_id=$request->assigned_nurse;
        $Patient_info->nurse_name=$nurse_info->name;
        $Patient_info->save();
        Toastr::success('Nurse assignment has been completed',"completed");
        return redirect()->back();
    }

    public function nurseAttendance(Request $request,$id)
    {

        $nurse_info=Nurse::find($request->nurse_id);
        $Patient_info=Patient::find($id);   
        $month=date('F-Y');
        $date=date('Y-m-d');
        $checkDataExistance=NurseHistory::where(['date'=>$date,'month'=>$month,'nurse_id'=>$request->nurse_id,'patient_id'=>$id])->first();
        if(!$checkDataExistance){            
        $nurseHistoryObj=new NurseHistory;
        $nurseHistoryObj->date=$date;
        $nurseHistoryObj->month=$month;
        $nurseHistoryObj->patient_id=$id;
        $nurseHistoryObj->nurse_id=$request->nurse_id;
        $nurseHistoryObj->nurse_name=$nurse_info->name;
        $nurseHistoryObj->amount=$Patient_info->nurse_budget;
        $nurseHistoryObj->save();

        Toastr::success('Nurse assign has been  Completed',"completed");
             return redirect()->back();

        }else{

             Toastr::warning('Nurse has been already assign',"completed");
             return redirect()->back();
        }
    }

    public function nurseWorkingHistory($id){

        
        $datas=NurseHistory::with('patient')->where('patient_id',$id)->get();


        return view('backend.history.index',compact('datas'));
    }


     public function accountInformation($id)
    {
        $datas= PatientHistory::where('patient_id',$id)->orderBy('id','ASC')->get();
        $patient_id=$id;
        $accounts=Account::latest()->get();
        return view('backend.patient.patient_history',compact('datas','accounts','patient_id'));
    }

    public function patientDuePayment(Request $request)
    {
        $patientInfo=Patient::find($request->patient_id);
        $month=date('F-Y');
        $date=date('Y-m-d');

        $invoice_no='payment_'.rand(0,9).time();


        $custAccountHistory=new PatientHistory;    
        $custAccountHistory->date=$date;
        $custAccountHistory->month=$month;
        $custAccountHistory->patient_id=$request->patient_id;
        $custAccountHistory->patient_name=$patientInfo->patient_name; 
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
        $incomeObj->notation="Income from  Patient Payment";
        $incomeObj->category_name="customer_payment";        
        $incomeObj->amount=$request->pay_amount??0 ;
        $incomeObj->save();


        
        Toastr::success('Patient Payment has been completed',"Payment");

        return redirect()->back();
    }

}
