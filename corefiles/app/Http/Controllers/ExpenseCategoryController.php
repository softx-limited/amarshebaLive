<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\ExpenseCategory;
use Brian2694\Toastr\Facades\Toastr;
class ExpenseCategoryController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index(){
        if(\Auth::user()->role->permissions->read!=1){
            Toastr::warning(' You are not able to  access this Feature',"Access Denied");
            return redirect()->back();
        }

        $datas=ExpenseCategory::latest()->paginate(20);  
        return view('backend.expense_category.index',compact('datas'));

    }

    public function storeCategory(Request $request)
    {
        if(\Auth::user()->role->permissions->create!=1){
            Toastr::warning(' You are not able to  access this Feature',"Access Denied");
        }
        $request->validate([

            'category_name'=>'required|unique:expense_categories'    

        ]);

        ExpenseCategory::create([

            'category_name'=>$request->category_name
        ]);

        Toastr::success('Expense Category has been Created!',"Created");
        return redirect()->route('expense.category.list');

    }

    public function UpdateCategory(Request $request,$id)
    {
        if(\Auth::user()->role->permissions->update!=1){
            Toastr::warning(' You are not able to  access this Feature',"Access Denied");
            return redirect()->back();
        }
        ExpenseCategory::find($id)->update($request->all());
        Toastr::info('Expense Category has been Upadted!',"Upadted");
        return redirect()->route('expense.category.list');

    }

    public function DeleteCategory($id){

        if(\Auth::user()->role->permissions->delete!=1){
            Toastr::warning(' You are not able to  access this Feature',"Access Denied");
            return redirect()->back();
        }

        ExpenseCategory::find($id)->delete();
        Toastr::warning('Expense Category has been Deleted!',"Deleted");
        return redirect()->route('expense.category.list');

    }

}
