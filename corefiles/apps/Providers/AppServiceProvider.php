<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Model\Websetting;
use App\Model\ExpenseList;
use App\Model\Discount;
use App\Model\NurseSalary;
use App\Model\ExpenseCategory;
use App\Model\Income;
use App\Model\CommonConfig;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $site_info=Websetting::latest()->first();

        $about_info=CommonConfig::latest()->first();
        $expense=ExpenseList::sum('expense_amount');
        $discount_amount=Discount::sum('discount_amount');      
        $total_salary=NurseSalary::sum('salary');
        $totalExpense= $expense+$discount_amount+  $total_salary ;       
        $total_income=Income::sum('amount');
        $net_profit=$total_income-$totalExpense;

        view::share('site_info',$site_info);
        view::share('common_settings',$about_info);
        
        view::share('totalExpense',$totalExpense);
        view::share('total_income',$total_income);
        view::share('net_profit',$net_profit);
    }
}
