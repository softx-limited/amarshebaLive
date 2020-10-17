<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePatientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patients', function (Blueprint $table) {
            $table->id();
            $table->string('date')->nullable();
            $table->string('month')->nullable();
            $table->string('patient_name')->nullable();
            $table->string('patient_age')->nullable();
            $table->string('patient_gender')->nullable();
            $table->string('patient_mobile')->nullable();
            $table->string('patient_address')->nullable();
            $table->string('patient_gurdian_name')->nullable();
            $table->string('patient_gurdian_age')->nullable();
            $table->string('patient_gurdian_address')->nullable();
            $table->string('patient_gurdian_nid')->nullable();
            $table->string('patient_gurdian_boc')->nullable();
            $table->string('patient_gurdian_passport')->nullable();
            $table->string('patient_gurdian_mobile')->nullable();
            $table->string('total_budget')->nullable();
            $table->string('nurse_budget')->nullable();
            $table->string('assign_nurse_id')->nullable();
            $table->string('status')->default(0);
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
        Schema::dropIfExists('patients');
    }
}
