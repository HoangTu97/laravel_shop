<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCartsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('carts', function (Blueprint $table) {
          $table->increments('id');
          $table->integer('order_id')->unsigned();
          $table->foreign('order_id')->references('id')->on('orders')->onDelete('CASCADE');
          $table->integer('product_id')->unsigned();
          $table->foreign('product_id')->references('id')->on('products')->onUpdate('CASCADE');
          $table->integer('price');
          $table->integer('qty');
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
        Schema::drop('carts');
    }
}
