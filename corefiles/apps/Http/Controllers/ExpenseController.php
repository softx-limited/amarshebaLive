<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\ExpenseList;
use App\Model\ExpenseCategory;
use App\Model\Account;
use App\Model\AccountHistory;

use Brian2694\Toastr\Facades\Toastr;
class ExpenseController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {

        if(\Auth::user()->role->permissions->read!=1){
            Toastr::warning(' You are not able to  access this Feature',"Access Denied");
            return redirect()->back();
        }
        $categories=ExpenseCategory::latest()->get();
        $datas=ExpenseList::latest()->paginate(20);  
        $accounts=Account::latest()->get();
        return view('backend.expense.index',compact('datas','categories','accounts'));

    }


    public function storeExpense(Request $request)
    {
        if(\Auth::user()->role->permissions->create!=1){
            Toastr::warning(' You are not able to  access this Feature',"Access Denied");
            return redirect()->back();
        }

        $request->validate([

            'expense_category'=>'required',
            'expense_amount'=>'required',
            'account_name'=>'required',
            
        ]);
        
        $month=date('F-Y');
        $date=date('Y-m-d');

        $accountInfo=Account::find( $request->account_name);
        $categorieInfo=ExpenseCategory::find($request->expense_category);
            
        $expenseObj=new ExpenseList;
        $expenseObj->date= $date;
        $expenseObj->month= $month;
        $expenseObj->category_id= $request->expense_category;
        $expenseObj->category_name= $categorieInfo->category_name;
        $expenseObj->expense_amount= $request->expense_amount;
        $expenseObj->expense_notation= $request->expense_notation??'';
        $expenseObj->account_id= $request->account_name;
        $expenseObj->account_name= $accountInfo->account_name;
        $expenseObj->save();
        
          /*Account History Start here*/

          $accountHistory=new AccountHistory;
          $accountHistory->date=$date;
          $accountHistory->month=$month;
          $accountHistory->account_id=$request->account_name; 
          $accountHistory->account_name=$accountInfo->account_name;
          $accountHistory->credit_amount=$request->expense_amount;  /* if the Admin pay */  
          $accountHistory->save();  

         /*Account History End here*/

         Toastr::success('Expense has been Created Successfully',"Created");
         return redirect()->route('expense.list');


    }


    public function UpdateExpense(Request $request,$id)
    {
        if(\Auth::user()->role->permissions->update!=1){
            Toastr::warning(' You are not able to  access this Feature',"Access Denied");
            return redirect()->back();
        }
        $month=date('F-Y');
        $date=date('Y-m-d');

        $accountInfo=Account::find( $request->account_name);
        $categorieInfo=ExpenseCategory::find($request->expense_category);            
        $expenseObj=ExpenseList::find($id);
         
          /*Account History Start here*/

          $accountHistory=new AccountHistory;
          $accountHistory->date=$date;
          $accountHistory->month=$month;
          $accountHistory->account_id=$request->account_name; 
          $accountHistory->account_name=$accountInfo->account_name;
          $accountHistory->credit_amount=$request->expense_amount;  /* if the Admin pay */  
          $accountHistory->debit_amount=$expenseObj->expense_amount;  /* if the Customer pay */  
          $accountHistory->save();  

         /*Account History End here*/

        $expenseObj->date= $date;
        $expenseObj->month= $month;
        $expenseObj->category_id= $request->expense_category;
        $expenseObj->category_name= $categorieInfo->category_name;
        $expenseObj->expense_amount= $request->expense_amount;
        $expenseObj->expense_notation= $request->expense_notation??'';
        $expenseObj->account_id= $request->account_name;
        $expenseObj->account_name= $accountInfo->account_name;
        $expenseObj->save();     

         Toastr::info('Expense has been Updated ',"Updated");
         return redirect()->route('expense.list');


    }


    public function DeleteExpense($id)
    {
        if(\Auth::user()->role->permissions->delete!=1){
            Toastr::warning(' You are not able to  access this Feature',"Access Denied");
            return redirect()->back();
        }
        $expenseObj=ExpenseList::find($id);
        $month=date('F-Y');
        $date=date('Y-m-d');        

        $accountHistory=new AccountHistory;
        $accountHistory->date=$date;
        $accountHistory->month=$month;
        $accountHistory->account_id=$expenseObj->account_id; 
        $accountHistory->account_name=$expenseObj->account_name;
        $accountHistory->debit_amount=$expenseObj->expense_amount;  /* if the Customer pay */  
        $accountHistory->save();  
        $expenseObj->delete();

        Toastr::warning('Expense has been Deleted ',"Deleted");
         return redirect()->route('expense.list');

    }

}
