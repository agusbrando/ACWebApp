<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMisbehaviorsTable extends Migration
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
            $table->string('description')->nullable();
            $table->integer('type_id')->unsigned();
            $table->foreign('type_id')->references('id')->on('types');
            $table->integer('year_user_id')->unsigned();
            $table->foreign('year_user_id')->references('id')->on('yearUnionUsers');
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
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('misbehaviors');
        Schema::enableForeignKeyConstraints();
    }
}
