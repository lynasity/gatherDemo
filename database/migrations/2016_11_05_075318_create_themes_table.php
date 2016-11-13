<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateThemesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('themes')){
          Schema::create('themes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('theme_name')->unique();
             // $table->integer('feed_Id')->unsigned();
            // to push latest message to fans
            // $table->integer('fans_id')->unsigned();
            // $table->index(['fans_id','feed_Id']);
            // $table->foreign('fans_id')->references('id')->on('users');
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
        // Schema::dropIfExists('themes');
    }
}
