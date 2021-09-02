<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRateMasterTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rate_master', function (Blueprint $table) {
            $table->id();
            $table->integer('start_contraction');
            $table->integer('end_contraction')->nullable();
            $table->string('area');
            $table->integer('water_charges_monthly');
            $table->integer('water_chwith_compensation');
            $table->integer('water_chwithout_compensation');
            $table->integer('drainage_chwith_comp');
            $table->integer('drainage_chwithout_comp');
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
        Schema::dropIfExists('rate_master');
    }
}
