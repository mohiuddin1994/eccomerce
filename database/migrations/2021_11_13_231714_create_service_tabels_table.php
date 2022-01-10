<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServiceTabelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('service_tabels', function (Blueprint $table) {
            $table->id();
            $table->string("header")->nullable();
            $table->float("price")->nullable();
            $table->text("description")->nullable();
            $table->string("lineOne")->nullable();
            $table->string("lineTwo")->nullable();
            $table->string("lineThree")->nullable();
            $table->string("lineFour")->nullable();
            $table->string("lineFive")->nullable();
            $table->string("lineSix")->nullable();
            $table->string("lineSeven")->nullable();
            $table->string("lineEight")->nullable();
            $table->string("lineNine")->nullable();
            $table->string("lineTen")->nullable(); 
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
        Schema::dropIfExists('service_tabels');
    }
}
