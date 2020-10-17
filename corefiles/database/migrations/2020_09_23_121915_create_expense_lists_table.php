<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExpenseListsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('expense_lists', function (Blueprint $table) {
            $table->id();
            $table->string('date');
            $table->string('month');
            $table->string('category_id')->nullable();
            $table->string('category_name')->nullable();
            $table->string('expense_notation')->nullable();
            $table->string('expense_amount')->nullable();
            $table->string('account_id')->nullable();
            $table->string('account_name')->nullable();
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
        Schema::dropIfExists('expense_lists');
    }
}
