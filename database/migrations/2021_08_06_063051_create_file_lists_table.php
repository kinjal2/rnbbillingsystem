<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFileListsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('file_lists', function (Blueprint $table) {
            $table->id();
            $table->string('cust_no',10);
            $table->string('file_name',255);
            $table->string('rev_id',255);
            $table->string('mimetype',50);
            $table->integer('doc_id');
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
        Schema::dropIfExists('file_lists');
    }
}
