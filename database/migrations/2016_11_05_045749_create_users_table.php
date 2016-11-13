<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('users')){
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('images')->nullable();
            $table->enum('gender', ['男', '女','未知'])->default('未知');
            $table->string('location')->nullable();
            // $table->integer('feed_Id')->unsigned();
            //only show 
            // $table->integer('following_Id')->unsigned();
            // $table->integer('collect_Id')->unsigned();
            $table->string('username')->unique();
            $table->string('password');
            $table->string('email')->unique();
            // use this token to query user info
            $table->string('api_token', 60)->unique();
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
        // Schema::dropIfExists('users');
    }
}
