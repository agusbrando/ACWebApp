<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSessionTimetablesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('session_timetables', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('timetable_id')->unsigned();
            $table->integer('session_id')->unsigned();
            $table->integer('year_union_id')->unsigned();
            $table->unique(['timetable_id','session_id','year_union_id']);
            $table->timestamps();
            $table->foreign('timetable_id')->references('id')->on('timetables');
            $table->foreign('session_id')->references('id')->on('sessions');
            $table->foreign('year_union_id')->references('id')->on('yearUnions');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('session_timetables');
    }
}
