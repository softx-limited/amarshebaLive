<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCylenderRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cylender_requests', function (Blueprint $table) {
            $table->id();
            $table->string('customer_name')->nullable();
            $table->string('business_name')->nullable();
            $table->string('contact_id')->nullable();
            $table->string('tax_no')->nullable();
            $table->string('opening_balance')->nullable();            
            $table->string('credit_limit')->nullable();
            $table->string('pay_term')->nullable();
            $table->string('customer_email')->nullable();
            $table->string('customer_mobile')->nullable();
            $table->string('customer_alt_mobile')->nullable();
            $table->string('customer_city')->nullable();
            $table->string('customer_state')->nullable();
            $table->string('customer_country')->nullable();
            $table->string('customer_address')->nullable();
            $table->string('checked_status')->default('pending');
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
        Schema::dropIfExists('cylender_requests');
    }
}
