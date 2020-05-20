<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateYearUnionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('yearUnions', function (Blueprint $table) {

            $table->increments('id');
            $table->integer('subject_id')->unsigned();
            $table->integer('course_id')->unsigned();
            $table->integer('evaluation_id')->unsigned();
            $table->integer('year_id')->unsigned();
            $table->integer('program_id')->unsigned()->nullable();
            $table->integer('responsable_id')->unsigned()->nullable();
            $table->string('notes')->nullable();
            $table->date('date_check')->nullable();
            $table->date('date_start');
            $table->date('date_end');
            $table->softDeletes();
            $table->timestamps();
            
            $table->foreign('subject_id')->references('id')->on('subjects');
            $table->foreign('course_id')->references('id')->on('courses');
            $table->foreign('evaluation_id')->references('id')->on('evaluations');
            $table->foreign('year_id')->references('id')->on('years');
            $table->foreign('program_id')->references('id')->on('programs');
            $table->foreign('responsable_id')->references('id')->on('users');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('yearUnions');
    }
}
