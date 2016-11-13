<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserfeedsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // for extension
        if(!Schema::connection('feeds')->hasTable('userfeeds')){
        Schema::connection('feeds')->create('userfeeds', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->index('user_id');
            $table->text('title');
            $table->longText('description');
            $table->string('organization');
            $table->string('date');
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
        // Schema::dropIfExists('userfeeds');
    }
}
