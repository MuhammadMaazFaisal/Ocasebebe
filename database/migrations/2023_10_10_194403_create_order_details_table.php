<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_details', function (Blueprint $table) {
            $table->id();
            $table->integer('order_id')->references('id')->on('orders');
            $table->integer('product_id')->references('id')->on('products');
            $table->string('product_name');
            $table->string('product_price');
            $table->string('product_attribute')->nullable();
            $table->string('product_length')->nullable();
            $table->string('product_discount_price')->nullable();
            $table->string('product_quantity');
            $table->string('product_image');
            $table->string('product_description');
            $table->string('product_category');

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
        Schema::dropIfExists('order_details');
    }
}
