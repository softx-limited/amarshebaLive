<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use App\Model\Client;
class ClientController extends Controller
{
    public function index(){
        if(\Auth::user()->role->permissions->read!=1){
            Toastr::warning(' You are not able to  access this Feature',"Access Denied");
            return redirect()->back();
        }

        $datas=Client::latest()->paginate(100);

        return view('backend.certificate.index',compact('datas'));

    }


    public function store(Request $request){

        if(\Auth::user()->role->permissions->create!=1){
            Toastr::warning(' You are not able to  access this Feature',"Access Denied");
            return redirect()->back();
        }
        $request->validate([
            'client_name'=>'required',
            'client_designation'=>'required',
            'client_image'=>'required',
            'client_notation'=>'required',
            
        ]);


        if($request->hasFile('client_image')){
            $thumbImage=$request->client_image;

            $imageName=mt_rand()."_".time();
            $thumbImageName = $imageName."_".$thumbImage->getClientOriginalName(); 
            $thumbImage->move(public_path('client'), $thumbImageName);
        }

        
        $client=new Client;     
        $client->client_name=$request->client_name;
        $client->client_designation=$request->client_designation; 
        $client->client_image=$thumbImageName;
        $client->client_notation=$request->client_notation;
        $client->save();

        Toastr::success('Client has been has been Added',"success");

        return redirect()->route('client.list');
    }


    public function update(Request $request,$id){

        if(\Auth::user()->role->permissions->update!=1){
            Toastr::warning(' You are not able to  access this Feature',"Access Denied");
            return redirect()->back();
        }

        $client=Client::find($id);



        if($request->hasFile('client_image')){
            unlink('client/'.$client->client_image);
            $thumbImage=$request->client_image;

            $imageName=mt_rand()."_".time();
            $thumbImageName = $imageName."_".$thumbImage->getClientOriginalName(); 
            $thumbImage->move(public_path('client'), $thumbImageName);
        }

         
        $client->client_name=$request->client_name;
        $client->client_designation=$request->client_designation; 
        $client->client_image=$thumbImageName??$client->client_image;
        $client->client_notation=$request->client_notation;
        $client->save();

    

        Toastr::info('Client has been has been Updated',"Updated");

        return redirect()->route('client.list');

    }

    public function destroy($id){

        if(\Auth::user()->role->permissions->delete!=1){
            Toastr::warning(' You are not able to  access this Feature',"Access Denied");
            return redirect()->back();
        }
        $client=Client::find($id);

        if($client->client_image){
            unlink('client/'.$client->client_image);
             }
        
        
        
        $client->delete();

        Toastr::warning('Client has been Deleted',"Deleted");

        return redirect()->route('client.list');

    }
    
}
