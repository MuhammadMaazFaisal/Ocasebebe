<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->id();
            $table->string('length_id');
            $table->string('parent_category_id');
            $table->string('product_name');
            $table->string('price');
            $table->string('discount_price');
            $table->string('image');
            $table->string('multiple_image')->nullable();
            $table->text('short_description');
            $table->text('description');
            $table->integer('status')->comment('1=active,0=inactive');
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
