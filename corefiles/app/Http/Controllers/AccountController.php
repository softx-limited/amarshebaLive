<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Account;
use App\Model\CustomerHistory;

use Brian2694\Toastr\Facades\Toastr;
class AccountController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
     public function index( )
    {
        if(\Auth::user()->role->permissions->read!=1){
            Toastr::warning(' You are not able to  access this Feature',"Access Denied");
            return redirect()->back();
        }
            $datas=Account::latest()->paginate(10);
 
            return view('backend.account.index',compact('datas'));

    }

     public function Store(Request $request)
    {
        if(\Auth::user()->role->permissions->create!=1){
            Toastr::warning(' You are not able to  access this Feature',"Access Denied");
            return redirect()->back();
        }
        $request->validate([
            'account_name'=>'required|unique:accounts'
        ]);

        Account::create($request->all());

        Toastr::success(' Account  has been Created',"Created");

        return redirect()->route('account.list');


    }

    public function update(Request $request,$id)
    {
        if(\Auth::user()->role->permissions->update!=1){
            Toastr::warning(' You are not able to  access this Feature',"Access Denied");
            return redirect()->back();
        }

        $request->validate([
            'account_name'=>'required'
        ]);


        Account::find($id)->update($request->all());

        Toastr::info(' Account  has been Updated',"Updated");

        return redirect()->route('account.list');


    }



    public function destroy($id)
    {

        if(\Auth::user()->role->permissions->delete!=1){
            Toastr::warning(' You are not able to  access this Feature',"Access Denied");
            return redirect()->back();
        }


        Account::find($id)->delete();

        Toastr::warning(' Account  has been Deleted',"Deleted");

        return redirect()->route('account.list');


    }


   

}
