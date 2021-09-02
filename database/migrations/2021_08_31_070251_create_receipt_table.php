<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReceiptTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('receipt', function (Blueprint $table) {
            $table->id();
            $table->string('cust_no',10);
			$table->integer('fin_year');
            $table->decimal('amount');
            $table->char('pay_mode',1);
            $table->timestamps();
            $table->unique(['cust_no','fin_year']);
            $table->foreign('cust_no')->references('cust_no')->on('customer_details')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('receipt');
    }
}
