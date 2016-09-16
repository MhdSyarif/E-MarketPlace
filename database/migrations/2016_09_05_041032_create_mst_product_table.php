<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMstProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mst_product', function (Blueprint $table) {
            $table->increments('id_product');
            $table->string('name_product',100);
            $table->string('code_product',10);
            $table->integer('categori_product');
            $table->decimal('price_product',15,3);
            $table->decimal('refprice_product',15,3);
            $table->text('description_product');
            $table->integer('minimumorder_product');
            $table->integer('stock_product');
            $table->integer('stock_product_inventory');
            $table->char('condition_product',1);
            $table->char('insurance_product',1);
            $table->string('id_company',10);
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
        Schema::drop('mst_product');
    }
}
