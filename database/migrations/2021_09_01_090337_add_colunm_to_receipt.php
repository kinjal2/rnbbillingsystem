<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColunmToReceipt extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('receipt', function (Blueprint $table) {
            $table->string('cheque_no',20)->nullable();
            $table->string('bank_name',50)->nullable();
            $table->string('branch_name',50)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('receipt', function (Blueprint $table) {
            $table->dropColumn('cheque_no');
            $table->dropColumn('bank_name');
            $table->dropColumn('branch_name');
        });
    }
}
