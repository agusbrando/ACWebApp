<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('year_union_id')->unsigned();
            $table->string('name');
            $table->integer('type_id')->unsigned();

            $table->timestamps();
            $table->foreign('type_id')->references('id')->on('types');
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
        Schema::dropIfExists('tasks');
    }
}
