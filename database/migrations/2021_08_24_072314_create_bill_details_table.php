<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBillDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bill_details', function (Blueprint $table) {
            $table->id();
            $table->string('cust_no',10);
			$table->integer('fin_year');
			$table->decimal('w_os_amt_wi_d');
			$table->decimal('d_os_amt_wi_d');
            $table->decimal('w_os_amt_wo_d');
			$table->decimal('d_os_amt_wo_d');
            $table->decimal('tb_amount');
            $table->decimal('wp_os_amt');
            $table->decimal('dp_os_amt');
            $table->decimal('pint20');
            $table->integer('paid_status');
			$table->integer('created_by');
            $table->integer('updated_by');
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
        Schema::dropIfExists('bill_details');
    }
}
