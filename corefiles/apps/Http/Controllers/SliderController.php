<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Slider;
use Brian2694\Toastr\Facades\Toastr;
class SliderController extends Controller
{
    public function index(){
        if(\Auth::user()->role->permissions->read!=1){
            Toastr::warning(' You are not able to  access this Feature',"Access Denied");
            return redirect()->back();
        }
        $datas=Slider::latest()->paginate(100);

        return view('backend.slider.index',compact('datas'));

    }

    public function store(Request $request){

        if(\Auth::user()->role->permissions->create!=1){
            Toastr::warning(' You are not able to  access this Feature',"Access Denied");
            return redirect()->back();
        }
        $request->validate([
            'image_title'=>'required',
            'slider_image'=>'required'
        ]);

        $slider=new Slider;

        

        
        if($request->hasFile('slider_image')){
            $image=$request->file('slider_image');
            $imageName=mt_rand()."_".time();
            $imageOriginalName = $imageName."_".$image->getClientOriginalName(); 
            $request->slider_image->move(public_path('slider'), $imageOriginalName);
            
         }

        $slider->image_title=$request->image_title;
        $slider->image_name=$imageOriginalName;
        $slider->save();

        Toastr::success('Slider Image has been Added',"success");

        return redirect()->route('slider.list');
    }
    public function update(Request $request,$id){

        if(\Auth::user()->role->permissions->update!=1){
            Toastr::warning(' You are not able to  access this Feature',"Access Denied");
            return redirect()->back();
        }

        $slider=Slider::find($id);


        if($request->hasFile('slider_image')){
            if($slider->image_name){
                unlink('slider/'.$slider->image_name);
                 }

            $image=$request->file('slider_image');
            $imageName=mt_rand()."_".time();
            $imageOriginalName = $imageName."_".$image->getClientOriginalName(); 
            $request->slider_image->move(public_path('slider'), $imageOriginalName);
            
         }

        $slider->image_title=$request->image_title;
        $slider->image_name=$imageOriginalName??$slider->image_name;
        $slider->save();

        Toastr::info('Slider Image has been Updated',"Updated");

        return redirect()->route('slider.list');

    }


    public function destroy($id){

        if(\Auth::user()->role->permissions->delete!=1){
            Toastr::warning(' You are not able to  access this Feature',"Access Denied");
            return redirect()->back();
        }
        $slider=Slider::find($id);
        if($slider->image_name){
            unlink('slider/'.$slider->image_name);
             }
        
        $slider->delete();

        Toastr::warning('Slider Image has been Deleted',"Deleted");

        return redirect()->route('slider.list');

    }
}
