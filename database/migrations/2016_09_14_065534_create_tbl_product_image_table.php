<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTblProductImageTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_product_file', function (Blueprint $table) 
        {
            $table->increments('id_file');
            $table->integer('id_product');
            $table->string('name_file',50);
            $table->string('type_file',5);
            $table->integer('size_file');
            $table->integer('user_action');
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
        Schema:drop('tbl_product_file');
    }
}
