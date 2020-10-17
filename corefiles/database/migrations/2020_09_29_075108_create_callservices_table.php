<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCallservicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        										

        Schema::create('callservices', function (Blueprint $table) {
            $table->id();
            $table->string('date')->nullable();
            $table->string('month')->nullable();
            $table->string('client_name')->nullable();
            $table->string('address')->nullable();
            $table->string('designation')->nullable();
            $table->string('nurse_name')->nullable();
            $table->string('nurse_id')->nullable();
            $table->string('nurse_budget')->nullable();
            $table->string('method_name')->nullable();
            $table->string('method_id')->nullable();
            $table->string('amount')->nullable();
            $table->string('notation')->nullable();
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
        Schema::dropIfExists('callservices');
    }
}
