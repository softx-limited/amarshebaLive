<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubMenusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sub_menus', function (Blueprint $table) {
            $table->id();
            $table->string('role_id');
            $table->string('nurse_list')->default(0);
            $table->string('working_report')->default(0);             
            $table->string('client_list')->default(0);             
            $table->string('product_list')->default(0);             
            $table->string('product_rent')->default(0);             
            $table->string('product_rent_list')->default(0);             
            $table->string('call_service')->default(0);             
            $table->string('request_service')->default(0);             
            $table->string('expense_category')->default(0);
            $table->string('expense_list')->default(0);
            $table->string('salary_payment')->default(0);
            $table->string('salary_payment_list')->default(0);
            $table->string('patient_list')->default(0);
            $table->string('assign_nurse')->default(0);
            $table->string('total_expense')->default(0);
            $table->string('total_profit')->default(0);
            $table->string('net_profit')->default(0);
            $table->string('account_settings')->default(0);
            $table->string('web_settings')->default(0);
            $table->string('slider_settings')->default(0);
            $table->string('service_settings')->default(0);
            $table->string('team_settings')->default(0);
            $table->string('man_power_settings')->default(0);
            $table->string('client_settings')->default(0);
            $table->string('basic_settings')->default(0);
            $table->string('users_settings')->default(0);
            $table->string('roles_settings')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sub_menus');
    }
}
