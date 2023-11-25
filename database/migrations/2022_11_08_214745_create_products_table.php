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

            $table->string('length_id')->nullable();

            $table->string('parent_category_id');

            $table->string('product_name');

            $table->decimal('price', 10, 2);

            $table->decimal('discount_price', 10, 2)->nullable();

            $table->string('image');

            $table->string('multiple_image')->nullable();

            $table->string('gender')->nullable();

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

