<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request; 
use App\Model\Team;
use Illuminate\Support\Str;
use Brian2694\Toastr\Facades\Toastr;
class TeamController extends Controller
{
    

    public function index(){

        if(\Auth::user()->role->permissions->read!=1){
            Toastr::warning(' You are not able to  access this Feature',"Access Denied");
            return redirect()->back();
        }
        $datas=Team::orderBy('id','ASC')->paginate(100);

        return view('backend.team.index',compact('datas'));

    }

    public function store(Request $request){

        if(\Auth::user()->role->permissions->create!=1){
            Toastr::warning(' You are not able to  access this Feature',"Access Denied");
            return redirect()->back();
        }
        $request->validate([
            'name'=>'required',
            'designation'=>'required',
            'image'=>'required',
             
        ]);


        if($request->hasFile('image')){
            $thumbImage=$request->image;

            $imageName=mt_rand()."_".time();
            $thumbImageName = $imageName."_".$thumbImage->getClientOriginalName(); 
            $thumbImage->move(public_path('team'), $thumbImageName);
        }

     

        $team=new Team;


        /*
             $table->string('team_title');
            $table->text('team_details');
            $table->text('team_front_image');
            $table->text('team_image');
            		
        */
        $team->name=$request->name;
        $team->designation=$request->designation; 
        $team->image=$thumbImageName; 
        $team->save();

        Toastr::success('team has been has been Added',"success");

        return redirect()->route('team.list');
    }
    public function update(Request $request,$id){

        if(\Auth::user()->role->permissions->update!=1){
            Toastr::warning(' You are not able to  access this Feature',"Access Denied");
            return redirect()->back();
        }

        $team=Team::find($id);



        if($request->hasFile('image')){
            if($team->image){
                unlink('team/'.$team->image);
                 }
            $thumbImage=$request->image;

            $imageName=mt_rand()."_".time();
            $thumbImageName = $imageName."_".$thumbImage->getClientOriginalName(); 
            $thumbImage->move(public_path('team'), $thumbImageName);
        }       

          
      

        $team->name=$request->name;
        $team->designation=$request->designation; 
        $team->image=$thumbImageName?? $team->image; 
        $team->save();

        Toastr::info('team has been has been Updated',"Updated");

        return redirect()->route('team.list');

    }


    public function destroy($id){
        

        if(\Auth::user()->role->permissions->delete!=1){
            Toastr::warning(' You are not able to  access this Feature',"Access Denied");
            return redirect()->back();
        }
        $team=Team::find($id);

        if($team->image){
            unlink('team/'.$team->image);
             }      
     
        
        $team->delete();

        Toastr::warning('team has been Deleted',"Deleted");

        return redirect()->route('team.list');

    }

    
}
