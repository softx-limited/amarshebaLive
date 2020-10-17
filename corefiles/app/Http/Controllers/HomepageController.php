<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Service;
use App\Model\Team;
use App\Model\OurManPower;
use App\Model\Client;
use App\Model\Slider;
use App\Model\CommonConfig;
use App\Model\ContactUs;
use Brian2694\Toastr\Facades\Toastr;
class HomepageController extends Controller
{
    public function index(){
        $datas=[];
        $datas['services']=Service::latest()->take(6)->get();
        $datas['sliders']=Slider::latest('id')->get();
        $datas['teams']=Team::latest('id','ASC')->get();
        $datas['manpowers']=OurManPower::latest()->take(6)->get();
        $datas['clients']=Client::latest()->get();
    return view('frontend.index',$datas);
        
    }

    public function serviceDetails($slug){
        $data['service']=Service::where('slug',$slug)->first();
        $data['services']=Service::latest()->get();
        return view('frontend.service_details',$data);
    }

    public function manpowerDetails($slug){
        $data['service']=OurManPower::where('slug',$slug)->first();
        $data['services']=OurManPower::latest()->get();
        return view('frontend.service_details_manpower',$data);
    }
    public function aboutUs(){
        $datas=[];  
        $datas['teams']=Team::latest('id','ASC')->get();
        $datas['about_info']=CommonConfig::latest()->first();
    return view('frontend.aboutus',$datas);
    }

    public function service(){
        $datas=[];  
        $datas['services']=Service::latest()->get();
    return view('frontend.service',$datas);
    }

    public function contactUs(){
        $datas=[];  
    $datas['about_info']=CommonConfig::latest()->first();
return view('frontend.contactus',$datas);
    }


    public function findinfo($slug){

        $result=CommonConfig::first();
        $slug=$slug;

        

        return view('frontend.common_view',compact('result','slug'));
    }

    public function sentRequest(Request $request){

        $request->validate([

            'name'=>'required',
            'mobile'=>'required',
            'email'=>'required',
            'address'=>'required',
            'message'=>'required'

        ]);

        $contactus=new ContactUs;      

        $contactus->name=$request->name;
        $contactus->mobile=$request->mobile;
        $contactus->email=$request->email;
        $contactus->address=$request->address;
        $contactus->description=$request->message;
        $contactus->save();
        $request->session()->flash('success', 'Thank You for Your Request ! we will contact as soon as possible');
 
        Toastr::success('Thank You for Your Request ! we will contact as soon as possible',"Success ");
        return redirect()->back();

    }
}
