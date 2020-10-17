<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Role;
use App\Model\MainMenu;
use App\Model\SubMenu;
use App\Model\Permission;

use Brian2694\Toastr\Facades\Toastr;
class RoleController extends Controller
{
  public function index(){

    if(\Auth::user()->role->permissions->read!=1){
      Toastr::warning(' You are not able to  access this Feature',"Access Denied");
      return redirect()->back();
  }

    $datas=Role::latest()->paginate(20);
    return view('backend.role.index',compact('datas'));

  }


  public function store(Request $request){
    if(\Auth::user()->role->permissions->create!=1){
      Toastr::warning(' You are not able to  access this Feature',"Access Denied");
      return redirect()->back();
  }
    $request->validate([
        'role_name'=>'required|unique:roles'
    ]);

    $role=new Role;
    $role->role_name=$request->role_name;
    $role->save();

    $main_menu=new MainMenu;
    $main_menu->role_id= $role->id;
    $main_menu->save();
    $sub_menu=new SubMenu;
    $sub_menu->role_id= $role->id;
    $sub_menu->save();

    Toastr::success('Role has been successfully Created',"Success");

    return redirect()->back();

  }
public function update(Request $request,$id){
  if(\Auth::user()->role->permissions->update!=1){
    Toastr::warning(' You are not able to  access this Feature',"Access Denied");
    return redirect()->back();
}
    $request->validate([
        'role_name'=>'required'
    ]);
    $role=Role::find($id);
    $role->role_name=$request->role_name;
    $role->save();
    $permission=new Permission;
    $permission->role_id= $role->id;
    $permission->save();    
    
    Toastr::info('Role has been successfully Updated',"Updated");

    return redirect()->back();
}


public function destroy($id){
  if(\Auth::user()->role->permissions->delete!=1){
    Toastr::warning(' You are not able to  access this Feature',"Access Denied");
    return redirect()->back();
}
     
    $role=Role::find($id)->delete();

    $main_menu=MainMenu::where('role_id',$id)->first();
    if($main_menu){
    $main_menu->delete();
  }
    $sub_menu=SubMenu::where('role_id',$id)->first();
    if($sub_menu){
    $sub_menu->delete();
  }
    
  $permission=Permission::where('role_id',$id)->first();
  if($permission){
    $permission->delete();
  }
  
    Toastr::warning('Role has been successfully Deleted',"Deleted");

    return redirect()->back();
}


public function setUserPermission($id){

    $datas=[];
    $datas['role']=Role::find($id);
    $datas['menus']=MainMenu::where('role_id',$id)->first();
    $datas['sub_menus']=SubMenu::where('role_id',$id)->first();
    $datas['permission']=Permission::where('role_id',$id)->first();;
     

    return view('backend.permission.index',$datas);

}

public function assingPermission(Request $request,$id){

  $menu_info=MainMenu::where('role_id',$id)->first();
  $sub_menus=SubMenu::where('role_id',$id)->first();
  $permission=Permission::where('role_id',$id)->first();

  if($request->menu_hrm=='on'){
    $menu_info->menu_hrm=1;
  }else{
    $menu_info->menu_hrm=0;

  }

  if($request->menu_client=='on'){
    $menu_info->menu_client=1;
  }else{
    $menu_info->menu_client=0;

  }

  if($request->menu_product=='on'){
    $menu_info->menu_product=1;
  }else{
    $menu_info->menu_product=0;

  }

  if($request->menu_service=='on'){
    $menu_info->menu_service=1;
  }else{
    $menu_info->menu_service=0;

  }

  if($request->menu_expense=='on'){
    $menu_info->menu_expense=1;
  }else{
    $menu_info->menu_expense=0;

  }


  if($request->menu_patient=='on'){
    $menu_info->menu_patient=1;
  }else{
    $menu_info->menu_patient=0;

  }

  if($request->menu_report=='on'){
    $menu_info->menu_report=1;
  }else{
    $menu_info->menu_report=0;

  }

  if($request->menu_settings=='on'){
    $menu_info->menu_settings=1;
  }else{
    $menu_info->menu_settings=0;

  }
 
  if($request->menu_user_section=='on'){
    $menu_info->menu_user_section=1;
  }else{
    $menu_info->menu_user_section=0;

  }

  $menu_info->save();
 
  if($request->nurse_list=='on'){
    $sub_menus->nurse_list=1;

  }else{
    $sub_menus->nurse_list=0;
  }

  if($request->working_report=='on'){
    $sub_menus->working_report=1;

  }else{
    $sub_menus->working_report=0;
  }


  if($request->client_list=='on'){
    $sub_menus->client_list=1;

  }else{
    $sub_menus->client_list=0;
  }


  if($request->product_list=='on'){
    $sub_menus->product_list=1;

  }else{
    $sub_menus->product_list=0;
  }

  if($request->product_rent=='on'){
    $sub_menus->product_rent=1;

  }else{
    $sub_menus->product_rent=0;
  }

  if($request->product_rent_list=='on'){
    $sub_menus->product_rent_list=1;

  }else{
    $sub_menus->product_rent_list=0;
  }

  if($request->call_service=='on'){
    $sub_menus->call_service=1;

  }else{
    $sub_menus->call_service=0;
  }

  if($request->request_service=='on'){
    $sub_menus->request_service=1;

  }else{
    $sub_menus->request_service=0;
  }

  if($request->expense_category=='on'){
    $sub_menus->expense_category=1;

  }else{
    $sub_menus->expense_category=0;
  }

  if($request->expense_list=='on'){
    $sub_menus->expense_list=1;

  }else{
    $sub_menus->expense_list=0;
  }

  if($request->salary_payment=='on'){
    $sub_menus->salary_payment=1;

  }else{
    $sub_menus->salary_payment=0;
  }

  if($request->salary_payment_list=='on'){
    $sub_menus->salary_payment_list=1;

  }else{
    $sub_menus->salary_payment_list=0;
  }


  if($request->patient_list=='on'){
    $sub_menus->patient_list=1;

  }else{
    $sub_menus->patient_list=0;
  }


  if($request->assign_nurse=='on'){
    $sub_menus->assign_nurse=1;

  }else{
    $sub_menus->assign_nurse=0;
  }

  if($request->total_expense=='on'){
    $sub_menus->total_expense=1;

  }else{
    $sub_menus->total_expense=0;
  }


  if($request->total_profit=='on'){
    $sub_menus->total_profit=1;

  }else{
    $sub_menus->total_profit=0;
  }


  if($request->net_profit=='on'){
    $sub_menus->net_profit=1;

  }else{
    $sub_menus->net_profit=0;
  }

  if($request->account_settings=='on'){
    $sub_menus->account_settings=1;

  }else{
    $sub_menus->account_settings=0;
  }


  if($request->web_settings=='on'){
    $sub_menus->web_settings=1;

  }else{
    $sub_menus->web_settings=0;
  }

  if($request->slider_settings=='on'){
    $sub_menus->slider_settings=1;

  }else{
    $sub_menus->slider_settings=0;
  }

  if($request->service_settings=='on'){
    $sub_menus->service_settings=1;

  }else{
    $sub_menus->service_settings=0;
  }


  if($request->team_settings=='on'){
    $sub_menus->team_settings=1;

  }else{
    $sub_menus->team_settings=0;
  }


  if($request->man_power_settings=='on'){
    $sub_menus->man_power_settings=1;

  }else{
    $sub_menus->man_power_settings=0;
  }


  if($request->client_settings=='on'){
    $sub_menus->client_settings=1;

  }else{
    $sub_menus->client_settings=0;
  }

  if($request->basic_settings=='on'){
    $sub_menus->basic_settings=1;

  }else{
    $sub_menus->basic_settings=0;
  }

  if($request->users_settings=='on'){
    $sub_menus->users_settings=1;

  }else{
    $sub_menus->users_settings=0;
  }

  if($request->roles_settings=='on'){
    $sub_menus->roles_settings=1;

  }else{
    $sub_menus->roles_settings=0;
  }
  $sub_menus->save();

  if($request->create=='on'){
    $permission->create=1;
  }else{
    $permission->create=0;
  }

  if($request->read=='on'){
    $permission->read=1;
  }else{
    $permission->read=0;

  }

  if($request->update=='on'){
    $permission->update=1;
  }else{
    $permission->update=0;

  }


  if($request->delete=='on'){
    $permission->delete=1;
  }else{
    $permission->delete=0;

  }
  $permission->save();
  Toastr::warning('Permission has been successfully Updated',"Updated");

    return redirect()->back();

}
}
