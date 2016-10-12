<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product', function (Blueprint $table) {
            $table->increments('product_id')->unsigned();
            $table->integer('category_id')->unsigned();
            $table->foreign('category_id')->references('category_id')->on('category');
            $table->string('product_name');
            $table->integer('product_qty');
            $table->decimal('price', 10, 2)->unsigned();
            $table->decimal('reduced_price', 10, 2)->unsigned()->nullable();
            $table->integer('brand_id')->unsigned();
            $table->foreign('brand_id')->references('brand_id')->on('brand');
            $table->text('product_desc');
            $table->string('product_image');
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
       	Schema::drop('product');
    }
}
