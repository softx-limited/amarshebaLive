<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOurManPowersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('our_man_powers', function (Blueprint $table) {
            $table->id();
            $table->string('slug');
            $table->string('service_title');
            $table->text('service_details');
            $table->text('service_front_image');
            $table->text('service_image');
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
        Schema::dropIfExists('our_man_powers');
    }
}
