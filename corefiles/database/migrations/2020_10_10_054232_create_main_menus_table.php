<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMainMenusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('main_menus', function (Blueprint $table) {
            $table->id();
            $table->string('role_id');
            $table->string('menu_hrm')->default(0);
            $table->string('menu_client')->default(0);             
            $table->string('menu_product')->default(0);             
            $table->string('menu_service')->default(0);             
            $table->string('menu_expense')->default(0);             
            $table->string('menu_patient')->default(0);             
            $table->string('menu_report')->default(0);             
            $table->string('menu_settings')->default(0);             
            $table->string('menu_user_section')->default(0);             
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
        Schema::dropIfExists('main_menus');
    }
}
