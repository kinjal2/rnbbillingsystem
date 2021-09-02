<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomerDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customer_details', function (Blueprint $table) {
            $table->id();
            $table->string('cust_no',10)->unique();
            $table->string('cust_name');
            $table->string('plot_no')->nullable();
            $table->string('home_address')->nullable();
            $table->string('office_address')->nullable();
            $table->string('phone_no',12)->nullable();
            $table->string('moblie_no',12)->nullable();
            $table->integer('sector_no');
            $table->string('near_by')->nullable();
            $table->string('conn_duration')->nullable();
            $table->char('conn_purpose',1)->nullable();
            $table->integer('plot_area');
            $table->integer('const_area');
            $table->date('tmp_c_dt')->nullable();
            $table->date('prm_c_dt')->nullable();
            $table->date('dran_c_dt')->nullable();
            $table->char('conn_water',1)->default('T');
            $table->char('conn_drinage',1)->nullable();
            $table->integer('app_status')->default(1);
            $table->integer('field_officer_id')->nullable();
            $table->integer('created_by');
            $table->integer('updated_by');
           $table->timestamps();
        });
        /*INSERT INTO public.customer_details(
             cust_no, cust_name, plot_no, 
            sector_no,  
            plot_area, const_area, tmp_c_dt, prm_c_dt, dran_c_dt, conn_water, 
            conn_drinage, app_status, field_officer_id, created_by, updated_by, 
            created_at, updated_at)
SELECT  cust_no, cust_name, plot_no, sector, pt_area, pt_const, tmp_c_dt, 
       prm_c_dt,'2021-08-26','Y','Y',0,1,1,1 ,now(),now()
  FROM public.temp_data;
*/
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('customer_details');
    }
}
