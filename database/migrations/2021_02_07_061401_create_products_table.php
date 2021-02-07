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
            $table->string('product_name');
            $table->integer('category_id');
            $table->integer('brand_id');
            $table->string('product_slug');
            $table->string('product_code');
            $table->integer('product_price');
            $table->string('product_quantity');
            $table->text('short_describtion');
            $table->text('long_describtion');
            $table->string('image_one');
            $table->string('image_two');
            $table->string('image_three');
            $table->integer('status')->default(1);
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
