<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Websetting;


use Brian2694\Toastr\Facades\Toastr;
class WebsettingController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    
    

    public function updateSiteInfo()
    {
        if(\Auth::user()->role->permissions->read!=1){
            Toastr::warning(' You are not able to  access this Feature',"Access Denied");
            return redirect()->back();
        }
        $data=Websetting::latest()->first();

        return view('backend.settings.index',compact('data'));
    }

    public function updateInfo (Request $request)
    {
        if(\Auth::user()->role->permissions->update!=1){
            Toastr::warning(' You are not able to  access this Feature',"Access Denied");
            return redirect()->back();
        }
        

        $request->validate([

                'org_name'=>'required',
                'mobile_no'=>'required',
                'telephone_no'=>'required',
                'address'=>'required',

        ]);


            $data=Websetting::latest()->first();


            if($request->hasFile('logo')){
                unlink('website/'.$data->logo); 

                $image=$request->file('logo');
                $imageName=mt_rand()."_".time();
                $logoName = $imageName."_".$image->getClientOriginalName(); 
 
     
 
                $request->logo->move(public_path('website'), $logoName);
 
 
               
             }




             if($request->hasFile('fav_icon')){
                unlink('website/'.$data->fav_icon);
                $image=$request->file('fav_icon');
                $imageName=mt_rand()."_".time();
                $iconName = $imageName."_".$image->getClientOriginalName(); 
 
     
 
                $request->fav_icon->move(public_path('website'), $iconName);
 
 
               
             }

             $data->org_name=$request->org_name;
             $data->address=$request->address;
             $data->mobile_no=$request->mobile_no;
             $data->telephone_no=$request->telephone_no;
             $data->logo=$logoName??$data->logo;
             $data->fav_icon=$iconName??$data->fav_icon;
             $data->save();

             Toastr::success('Your Site inofo has been Updated','Updated');
             return redirect()->back();



         
    }


}
