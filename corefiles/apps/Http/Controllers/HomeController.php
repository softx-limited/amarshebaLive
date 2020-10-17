<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Income;
use App\Model\ExpenseList;
use App\Model\NurseSalary;

use DB;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
     
/*

	Jan.	31	winter
2	February	Feb.	28/29
3	March	Mar.	31	spring
4	April	Apr.	30
5	May	May	31
6	June	Jun.	30	summer
7	July	Jul.	31
8	August	Aug.	31
9	September	Sep.	30	autumn
10	October	Oct.	31
11	November	Nov.	30
12	December
*/
   

             


            $months=Income::select(DB::raw("Month(created_at) as month"))
            ->whereYear('created_at',date('Y'))
            ->groupBy(DB::raw("Month(created_at)"))
            ->pluck('month');

        $chartValues=[0,0,0,0,0,0,0,0,0,0,0];
        $chartExpenses=[0,0,0,0,0,0,0,0,0,0,0];


        for($m=1; $m<=12; ++$m ){
            $monthName= date('F-Y', mktime(0, 0, 0, $m, 1)) ;
            $sum= Income::where('month', $monthName)->sum('amount');
           $chartValues[$m]=$sum; 

           $total_expense=ExpenseList::where('month',$monthName)->sum('expense_amount');
           $total_salary=NurseSalary::where('month',$monthName)->sum('salary');
           $chartExpenses[$m]=$total_expense+ $total_salary;

        }

        



 
         
            return view('backend.index',compact('chartValues','chartExpenses'));
    }
}
