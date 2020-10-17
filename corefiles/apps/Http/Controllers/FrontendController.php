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
use App\Model\cylenderRequest;


use Brian2694\Toastr\Facades\Toastr;

class FrontendController extends Controller
{
	
	
    public function getNurseService(Request $request){

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
        $accountHistory->created_by="web Request";     
        $accountHistory->save(); 
        }
        $request->session()->flash('success', 'Thank You for Your Request ! we will contact as soon as possible');
 
        Toastr::success('Thank You for Your Request we will contact as soon as possible',"Success");
        return redirect()->back();
      

    // return view('frontend.index',$datas);

    }

    public function cylenderRequest(Request $request){



        $request->validate([

            'customer_name'=>'required',
            'customer_mobile'=>'required',
            'customer_email'=>'required',
            'customer_address'=>'required',

        ]);

        $requestData=$request->except('_token');

        // dd($requestData);


        CylenderRequest::create($requestData);
 $request->session()->flash('success', 'Your Request has been accepted . we will  contact with you as soon as possible');
 

         Toastr::success('Your Request has been accepted . we will  contact with you as soon as possible',"Success");

            return redirect()->back();

    }
}
