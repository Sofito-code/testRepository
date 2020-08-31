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
            $table->bigIncrements('id');
            $table->string('title')->unique();
            $table->string('slug')->unique();
            $table->unsignedBigInteger('category_id');
            $table->BigInteger('quantity')->unsigned()->default(1);
            $table->integer('sale_percent')->unsigned()->default(0);
            $table->text('description');
            $table->text('specs')->nullable();
            $table->string('price');
            $table->boolean('enabled')->default(true);
            $table->string('image')->nullable();
            $table->char('main_slider', 2);
            $table->timestamps();
            $table->foreign('category_id')->references('id')->on('categories');
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
