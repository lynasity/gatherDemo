<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateThemefeedsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('themefeeds')){
        Schema::create('themefeeds', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('theme_id');
            $table->text('title');
            $table->longText('description');
            $table->string('organization');
            $table->string('url')->nullable();
            $table->date('date');
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
        // Schema::dropIfExists('themefeeds');
    }
}
