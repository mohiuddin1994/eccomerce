<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('company_logo')->nullable();
            $table->string('company_name')->nullable();
            $table->string('company_link')->nullable();
            $table->string('company_email')->nullable();
            $table->integer('company_phone')->nullable();
            $table->text('company_address')->nullable();
            $table->text('company_description')->nullable();
            $table->text('copy_text')->nullable();
            $table->string('facebook_icon')->nullable();
            $table->string('facebook_link')->nullable();
            $table->string('twiter_icon')->nullable();
            $table->string('twiter_link')->nullable();
            $table->string('youtube_icon')->nullable();
            $table->string('youtube_link')->nullable();
            $table->string('linkdin_icon')->nullable();
            $table->string('linkdin_link')->nullable();
            $table->string('instagram_icon')->nullable();
            $table->string('instagram_link')->nullable(); 
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
        Schema::dropIfExists('settings');
    }
}
