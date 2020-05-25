<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEvaluatedsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('evaluateds', function (Blueprint $table) {
            $table->unique(['program_id', 'evaluable_id']);
            $table->increments('id');
            $table->integer('evaluable_id')->unsigned();
            $table->integer('program_id')->unsigned();
            $table->foreign('evaluable_id')->references('id')->on('evaluables')->onDelete('cascade');
            $table->foreign('program_id')->references('id')->on('programs')->onDelete('cascade');
            $table->text('description')->nullable();
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
        Schema::dropIfExists('evaluateds');
    }
}
