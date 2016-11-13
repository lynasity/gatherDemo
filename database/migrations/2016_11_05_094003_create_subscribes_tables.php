<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubscribesTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('subscribes')){
            Schema::create('subscribes', function (Blueprint $table){
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->integer('theme_id')->unsigned();
            $table->index(['user_id','theme_id']);
            // $table->foreign('user_id')->references('id')->on('users');
            // $table->foreign('theme_id')->references('id')->on('themes');
            $table->timestamps();
         });           
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Schema::dropIfExists('subscribes');
    }
}
