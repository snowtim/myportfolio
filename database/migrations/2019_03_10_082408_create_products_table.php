<?php

use Illuminate\Support\Facades\Schema;
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
            $table->string('product_id')->unique();
            $table->string('product_name');
            $table->string('description');
            $table->integer('price');
            $table->string('order_id')->nullable();
            $table->string('picture');
            $table->string('pic_name');
            $table->string('pic_type');
            $table->string('pic_tmp_name');
            $table->integer('pic_size');
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
        Schema::dropIfExists('products');
    }
}
