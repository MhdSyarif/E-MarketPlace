<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMstCompanyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mst_company', function (Blueprint $table)
        {
            $table->string('id_company',7);
            $table->string('name_company',100);
            $table->integer('npwp_company');
            $table->string('pic_company');
            $table->string('email_company');
            $table->string('hp_company',12);
            $table->integer('province_company');
            $table->integer('city_company');
            $table->string('address_company',100);
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
        Schema::drop('mst_company');
    }
}
