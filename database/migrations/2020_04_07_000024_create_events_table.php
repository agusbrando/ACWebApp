<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->integer('session_id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->integer('type_id')->unsigned();
            $table->string('title');
            $table->string('description');
            $table->date('date');
            $table->timestamps();
  
            $table->foreign('session_id')->references('id')->on('sessions');
            $table->foreign('user_id')->references('id')->on('users');
   
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('events');
    }
}
