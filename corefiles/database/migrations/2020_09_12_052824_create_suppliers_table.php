<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSuppliersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('suppliers', function (Blueprint $table) {
            $table->id();
            $table->string('supplier_name')->nullable();
            $table->string('business_name')->nullable();
            $table->string('contact_id')->nullable();
            $table->string('tax_no')->nullable();
            $table->string('opening_balance')->nullable();            
            $table->string('credit_limit')->nullable();
            $table->string('pay_term')->nullable();
            $table->string('supplier_email')->nullable();
            $table->string('supplier_mobile')->nullable();
            $table->string('supplier_alt_mobile')->nullable();
            $table->string('supplier_city')->nullable();
            $table->string('supplier_state')->nullable();
            $table->string('supplier_country')->nullable();
            $table->string('supplier_address')->nullable();
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
        Schema::dropIfExists('suppliers');
    }
}
