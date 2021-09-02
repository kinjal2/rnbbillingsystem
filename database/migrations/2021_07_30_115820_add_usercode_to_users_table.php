<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddUsercodeToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->integer('usercode')->nullable();
            $table->integer('officecode')->nullable();
            $table->integer('designationcode')->nullable();
            $table->integer('slevel')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
           
            $table->dropColumn('usercode');
            $table->dropColumn('officecode');
            $table->dropColumn('designationcode');
            $table->dropColumn('slevel');
        });
    }
}
