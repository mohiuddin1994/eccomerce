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
            $table->string('name');
            $table->string('title');
            $table->string('pro_code')->nullable();
            $table->string('image');
            $table->text('description');
            $table->integer('price');
            $table->integer('stock');
            $table->integer('category_id')->nullable();
            $table->string('subcategory_id')->nullable();
            $table->string('video')->nullable();
            $table->string('discount')->nullable();
            $table->string('fabric')->nullable();
            $table->string('sleeve')->nullable();
            $table->string('occassion')->nullable();
            $table->string('weight')->nullable();
            $table->integer('statu');
            $table->integer('is_fauture')->default(0);
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
