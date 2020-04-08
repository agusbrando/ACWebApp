<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMisbehaviors extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('misbehaviors', function (Blueprint $table) {
            $table->increments('id');
            $table->string('description')->nullable(false);
            $table->integer('type_id')->unsigned();
            $table->foreign('type_id')->references('id')->on('types');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
            $table->integer('session_timetable_id')->unsigned();
            $table->foreign('session_timetable_id')->references('id')->on('session_timetables');
            $table->dateTime('date');
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
        Schema::enableForeignKeyConstraints(); //Ponemos esto en la ultima tabla para que no de error de permisos al hacer el refesh
        Schema::dropIfExists('misbehaviors');
    }
}
