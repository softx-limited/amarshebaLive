<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\CommonConfig;
use Brian2694\Toastr\Facades\Toastr;
use App\Model\User;
use App\Model\Role;
use Auth; 
class SettingsController extends Controller
{

  public function __construct()
  {
      $this->middleware('auth');
  }

 

  public function editinfo(){

    $item =CommonConfig::latest()->first();

    return view('backend.common_setting.index',compact('item'));

  }

  public function updateInfo(Request $request){

    if(\Auth::user()->role->permissions->update!=1){
      Toastr::warning(' You are not able to  access this Feature',"Access Denied");
      return redirect()->back();
  }
     
    $request->validate([
      'facebook'=>'required',
      'twitter'=>'required',
      'youtube'=>'required',
      'google_map'=>'required',
      'short_description'=>'required',
      'about_us'=>'required',
      'contact_us'=>'required',
    ]);
    $item =CommonConfig::latest()->first();
    $item->facebook=$request->facebook;
    $item->twitter=$request->twitter;
    $item->youtube=$request->youtube;
    $item->google_map=$request->google_map;
    $item->short_description=$request->short_description;
    $item->about_us=$request->about_us;
    $item->contact_us=$request->contact_us;
    $item->save();
    
    Toastr::info('Site Settings has been Updated',"Updated");

    return redirect()->back();
     


  }

  public function getUserList(){
    if(\Auth::user()->role->permissions->read!=1){
      Toastr::warning(' You are not able to  access this Feature',"Access Denied");
      return redirect()->back();
  }

    $datas=User::latest()->paginate(100);
    $roles=Role::latest()->get();
      
    return view('backend.user_list.index',compact('datas','roles'));
  }

  public function addNewUser(Request $request){
    if(\Auth::user()->role->permissions->create!=1){
      Toastr::warning(' You are not able to  access this Feature',"Access Denied");
      return redirect()->back();
  }


    $request->validate([

      'name'=>'required',
      'mobile_no'=>'required',
      'email'=>'required',
      'address'=>'required',
      'password'=>'required|confirmed',
      'role_id'=>'required'
      ]);
      $role_info=Role::find($request->role_id);
      $requestData=[];
      $requestData=$request->except(['_token','password_confirmation','password']);
      $requestData['password']=bcrypt($request->password);
      $requestData['role_id']=$request->role_id;
      $requestData['role_name']=$role_info->role_name;
      
     
      
      // dd($requestData);


      

          $user_obj=User::create($requestData);


          if($user_obj){            
              Toastr::success('User account has been Created','Success');
              return redirect()->back();
           
          }

  }



  public function updateUserInfo(Request $request,$id){
    if(\Auth::user()->role->permissions->update!=1){
      Toastr::warning(' You are not able to  access this Feature',"Access Denied");
      return redirect()->back();
  }

    $request->validate([

      'name'=>'required',
      'mobile_no'=>'required',
      'email'=>'required',
      'address'=>'required',
      
      ]);
      

      // dd($requestData);


      
          $role_info=Role::find($request->role_id);
          $user_obj=User::find($id);
          $user_obj->name=$request->name;
          $user_obj->mobile_no=$request->mobile_no;
          $user_obj->email=$request->email;
          $user_obj->address=$request->address??$user_obj->address;
          $user_obj->role_id=$request->role_id;
          $user_obj->role_name=$role_info->role_name;
          if($request->password){
            if($request->password ==$request->password_confirmation){
              $user_obj->password=bcrypt($request->password);
            }else{
              Toastr::warning('Password Dosenot Match','Error');
            }

          }

          $user_obj->save();
          Toastr::info('User account has been Updated','Updated');
              return redirect()->back();
          



  }


  public function deleteUser($id){
    if(\Auth::user()->role->permissions->delete!=1){
      Toastr::warning(' You are not able to  access this Feature',"Access Denied");
      return redirect()->back();
  }
    if(\Auth::user()->id==$id){
      Toastr::warning('You are unable to Delete Yourself','Error');
      return redirect()->back();
    }
    $user_obj=User::find($id)->delete();
    Toastr::warning('User account has been Deleted','Deleted');
    return redirect()->back();

  }

  public function userProfile(){
    $item=User::find(\Auth::user()->id);

    return view('backend.user_list.profile',compact('item'));
  }
}
