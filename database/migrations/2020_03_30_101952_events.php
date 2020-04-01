<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Events extends Migration
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
            $table->integer('types_id')->unsigned();
            $table->integer('sessions_id')->unsigned();
            $table->integer('users_id')->unsigned();
            $table->string('description');
            $table->date('date');
            $table->timestamps();

            
            $table->foreign('types_id')->references('id')->on('types');
            $table->foreign('sessions_id')->references('id')->on('sessions');
            $table->foreign('users_id')->references('id')->on('users');
   
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
