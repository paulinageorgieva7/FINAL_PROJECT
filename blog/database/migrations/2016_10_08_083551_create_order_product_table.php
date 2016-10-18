<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::create('order_product', function (Blueprint $table) {
            $table->increments('order_product_id');
            $table->integer('order_id')->unsigned();
            $table->foreign('order_id')->references('order_id')->on('orders');
            $table->integer('product_id')->unsigned();
            $table->foreign('product_id')->references('product_id')->on('product');
            $table->integer('qty');
            $table->decimal('price', 10, 2);
            $table->decimal('reduced_price', 10, 2)->unsigned()->nullable();
            $table->decimal('total', 10, 2);
            $table->decimal('total_reduced', 10, 2)->unsigned()->nullable();
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
        Schema::drop('order_products');
    }
}
