<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStockHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stock_histories', function (Blueprint $table) {
            $table->id();
            $table->string('date')->nullable();
            $table->string('month')->nullable();
            $table->string('invoice_no')->nullable();
            $table->string('product_id')->nullable();
            $table->string('qty')->nullable();
            $table->string('purchase_price')->nullable();
            $table->string('total_price')->nullable();
            $table->string('supplier_id')->nullable();
            $table->string('created_by')->nullable();
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
        Schema::dropIfExists('stock_histories');
    }
}
