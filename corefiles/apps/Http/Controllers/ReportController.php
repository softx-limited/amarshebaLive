<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\ExpenseList;
use App\Model\Discount;
use App\Model\NurseSalary;
use App\Model\ExpenseCategory;
use App\Model\Income;



class ReportController extends Controller
{
    public function totalExpense(){


            $datas=ExpenseList::latest()->get();
            $total_expense=ExpenseList::sum('expense_amount');
            $discount_amount=Discount::sum('discount_amount');
            $salaries=NurseSalary::latest()->get();
            $total_salary=NurseSalary::sum('salary');
            $categories=ExpenseCategory::latest()->get();

          
            return view('backend.report.expense',compact('datas','total_expense','discount_amount','salaries','total_salary','categories'));

    }


    public function ExpenseReportByCategory(Request $request){

        // dd($request->start_date);


        if($request->expense_category=="salaries"){

            $datas=ExpenseList::where('category_id',$request->expense_category)->whereBetween('date', [$request->start_date, $request->end_date])->latest()->get();
            $total_expense=ExpenseList::where('category_id',$request->expense_category)->whereBetween('date', [$request->start_date, $request->end_date])->sum('expense_amount');
            $discount_amount=0;
            $salaries=NurseSalary::whereBetween('date', [$request->start_date, $request->end_date])->latest()->get();
            $total_salary=NurseSalary::whereBetween('date', [$request->start_date, $request->end_date])->sum('salary');
            $categories=ExpenseCategory::latest()->get();
            return view('backend.report.expense',compact('datas','total_expense','discount_amount','salaries','total_salary','categories'));


            
        }

            if($request->expense_category=='allcategories'){

                $datas=ExpenseList::whereBetween('date', [$request->start_date, $request->end_date])->latest()->get();
                $total_expense=ExpenseList::whereBetween('date', [$request->start_date, $request->end_date]) ->sum('expense_amount');
                $discount_amount=Discount::whereBetween('date', [$request->start_date, $request->end_date])->sum('discount_amount');
                $salaries=NurseSalary::whereBetween('date', [$request->start_date, $request->end_date])->latest()->get();
                $total_salary=NurseSalary::whereBetween('date', [$request->start_date, $request->end_date])->sum('salary');
                $categories=ExpenseCategory::latest()->get();
    
              
                return view('backend.report.expense',compact('datas','total_expense','discount_amount','salaries','total_salary','categories'));


            }else if($request->expense_category='allcategories') {
               
            $datas=ExpenseList::where('category_id',$request->expense_category)->whereBetween('date', [$request->start_date, $request->end_date])->latest()->get();
            $total_expense=ExpenseList::where('category_id',$request->expense_category)->whereBetween('date', [$request->start_date, $request->end_date])->sum('expense_amount');
            $discount_amount=0;
            $salaries=[];
            $total_salary=0;
            $categories=ExpenseCategory::latest()->get();

          
            return view('backend.report.expense',compact('datas','total_expense','discount_amount','salaries','total_salary','categories'));

            } 
    }



    public function totalIncome(){

        $datas=Income::latest()->get();
        $total_income=Income::sum('amount');
      
        return view('backend.report.income',compact('datas','total_income'));

    }

    public function incomeReportByCategory(Request $request){

        $request->validate([

            'income_category'=>'required',
            'start_date'=>'required',
            'end_date'=>'required',
        ]);

        $categoryName=$request->income_category;
        $startDate=$request->start_date;
        $endDate=$request->end_date;

        if($categoryName=='all_categories'){
            $datas=Income:: whereBetween('date', [$startDate, $endDate])->latest()->get();
            $total_income=Income::whereBetween('date', [$startDate, $endDate])->sum('amount');            
         return view('backend.report.income',compact('datas','total_income'));

        }else{

            $datas=Income::where('category_name',$categoryName)->whereBetween('date', [$startDate, $endDate])->latest()->get();
            $total_income=Income::where('category_name',$categoryName)->whereBetween('date', [$startDate, $endDate])->sum('amount');            
         return view('backend.report.income',compact('datas','total_income'));

        }

    }


    public function netProfit(){

       
        $expense=ExpenseList::sum('expense_amount');
        $discount_amount=Discount::sum('discount_amount');      
        $total_salary=NurseSalary::sum('salary');
        $totalExpense= $expense+$discount_amount+  $total_salary ;       
        $total_income=Income::sum('amount');
        $net_profit=$total_income-$totalExpense;
        return view('backend.report.netprofit',compact('totalExpense','total_income','expense','discount_amount','total_salary','net_profit'));

    }


    public function profitReportByDate(Request $request){

        $expense=ExpenseList::whereBetween('date', [$request->start_date, $request->end_date])->sum('expense_amount');
        $discount_amount=Discount::whereBetween('date', [$request->start_date, $request->end_date])->sum('discount_amount');      
        $total_salary=NurseSalary::whereBetween('date', [$request->start_date, $request->end_date])->sum('salary');
        $totalExpense= $expense+$discount_amount+  $total_salary ;       
        $total_income=Income::whereBetween('date', [$request->start_date, $request->end_date])->sum('amount');

        $net_profit=$total_income-$totalExpense;
        return view('backend.report.netprofit',compact('totalExpense','total_income','expense','discount_amount','total_salary','net_profit'));


    }


}
