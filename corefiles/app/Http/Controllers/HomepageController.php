<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Service;
use App\Model\Team;
use App\Model\OurManPower;
use App\Model\Client;
use App\Model\Slider;
use App\Model\CommonConfig;

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
        $data['service']=Service::where('slug',$slug)->first();
        $data['services']=Service::latest()->get();
        return view('frontend.service_details',$data);
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
}
