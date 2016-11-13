<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserfeedbackTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('userfeedback')){
        Schema::create('userfeedback', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedTinyInteger('has_read')->default(0);
            $table->string('username');
            $table->longText('feedback');
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
        // Schema::dropIfExists('userfeedback');
    }
}
