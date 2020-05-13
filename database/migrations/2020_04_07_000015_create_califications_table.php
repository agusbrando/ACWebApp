<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCalificationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('califications', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('task_id')->unsigned();
            $table->integer('year_user_id')->unsigned();
            $table->decimal('value');
            $table->timestamps();
            $table->unique(['task_id', 'year_user_id']);
            $table->foreign('task_id')->references('id')->on('tasks');
            $table->foreign('year_user_id')->references('id')->on('yearUnionUsers');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('califications');
    }
}
