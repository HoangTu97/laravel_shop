<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
          $table->increments('id');
          $table->string('name')->unique();
          $table->string('alias');
          $table->integer('price');
          $table->text('intro');
          $table->longText('content');
          $table->string('image');
          $table->string('keywords');
          $table->string('description');
          $table->integer('user_id')->unsigned();
          $table->foreign('user_id')->references('id')->on('users')->onDelete('CASCADE');
          $table->integer('cate_id')->unsigned();
          $table->foreign('cate_id')->references('id')->on('cates')->onDelete('CASCADE');
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
        Schema::drop('products');
    }
}
