<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product', function (Blueprint $table) {
            $table->increments('productID');
            $table->string('productName');
            $table->string('Material');
            $table->string('Size');
            $table->string('Color');
            $table->integer('Price');
            $table->string('Designs');
            $table->integer('Quantity');
            $table->string('ImageUrl');
            $table->string('Origin');
            $table->string('Intro');
            $table->text('Featured');
            $table->boolean('Status');
            $table->foreignUuid('supplierID')->references('supplierID')->on('suppliers');
            $table->foreignId('categoryID')->references('categoryID')->on('category');
            $table->foreignId('brandID')->references('brandID')->on('brand');
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
        Schema::dropIfExists('product');
    }
};
