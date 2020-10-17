<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\OurManPower;
use Illuminate\Support\Str;
use Brian2694\Toastr\Facades\Toastr;
class ManpowerController extends Controller
{
    public function index(){

        if(\Auth::user()->role->permissions->read!=1){
            Toastr::warning(' You are not able to  access this Feature',"Access Denied");
            return redirect()->back();
        }
        $datas=OurManPower::latest()->paginate(100);

        return view('backend.manpower.index',compact('datas'));

    }

    public function store(Request $request){

        if(\Auth::user()->role->permissions->create!=1){
            Toastr::warning(' You are not able to  access this Feature',"Access Denied");
            return redirect()->back();
        }
        $request->validate([
            'service_title'=>'required',
            'service_details'=>'required',
            'service_front_image'=>'required',
            'service_image'=>'required',
        ]);


        if($request->hasFile('service_front_image')){
            $thumbImage=$request->service_front_image;

            $imageName=mt_rand()."_".time();
            $thumbImageName = $imageName."_".$thumbImage->getClientOriginalName(); 
            $thumbImage->move(public_path('manpower'), $thumbImageName);
        }

        if($request->hasFile('service_image')){

            $mainImage=$request->service_image;

            $imageName=mt_rand()."_".time();
            $mainImageName = $imageName."_".$mainImage->getClientOriginalName(); 
            $mainImage->move(public_path('manpower'), $mainImageName);
        }

        $service=new OurManPower;


        /*
             $table->string('service_title');
            $table->text('service_details');
            $table->text('service_front_image');
            $table->text('service_image');
        */
        $service->slug=Str::slug($request->service_title);;
        $service->service_title=$request->service_title; 

        $service->service_details=$request->service_details;
        $service->service_front_image=$thumbImageName;
        $service->service_image=$mainImageName;
        $service->save();

        Toastr::success('ManPower has been has been Added',"success");

        return redirect()->route('manpower.list');
    }
    public function update(Request $request,$id){

        if(\Auth::user()->role->permissions->update!=1){
            Toastr::warning(' You are not able to  access this Feature',"Access Denied");
            return redirect()->back();
        }

        $service=OurManPower::find($id);


        $request->validate([
            'service_title'=>'required',
            'service_details'=>'required',
        ]);


        if($request->hasFile('service_front_image')){
            if($service->service_front_image){
                unlink('manpower/'.$service->service_front_image);
                 }
            $thumbImage=$request->service_front_image;

            $imageName=mt_rand()."_".time();
            $thumbImageName = $imageName."_".$thumbImage->getClientOriginalName(); 
            $thumbImage->move(public_path('manpower'), $thumbImageName);
        }

        if($request->hasFile('service_image')){
            if($service->service_image){
                unlink('manpower/'. $service->service_image);
                 }

            $mainImage=$request->service_image;

            $imageName=mt_rand()."_".time();
            $mainImageName = $imageName."_".$mainImage->getClientOriginalName(); 
            $mainImage->move(public_path('manpower'), $mainImageName);
        }
        $service->service_title=$request->service_title;
        $service->service_details=$request->service_details;
        $service->service_front_image=$thumbImageName??$service->service_front_image;
        $service->service_image=$mainImageName??$service->service_image;
        $service->save();

        Toastr::info('ManPower has been has been Updated',"Updated");

        return redirect()->route('manpower.list');

    }


    public function destroy($id){

        if(\Auth::user()->role->permissions->delete!=1){
            Toastr::warning(' You are not able to  access this Feature',"Access Denied");
            return redirect()->back();
        }

        $service=OurManPower::find($id);

        if($service->service_front_image){
            unlink('manpower/'.$service->service_front_image);
             }
        
        if($service->service_image){
            unlink('manpower/'. $service->service_image);
             }
        
        $service->delete();

        Toastr::warning('ManPower has been Deleted',"Deleted");

        return redirect()->route('manpower.list');

    }
}
