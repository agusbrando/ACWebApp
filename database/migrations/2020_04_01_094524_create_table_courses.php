<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableCourses extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        
        Schema::create('courses', function (Blueprint $table) {
            $table->integer('id')->unsigned(); //Pongo unsigned para que lo detecte como clave
            $table->string('nombre');
            $table->string('curso');
            $table->integer('num_alumnos'); 
            $table->integer('classroom_id');
            $table->timestamps();

            $table->foreign('classroom_id')->references('id')->on('classrooms');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        
        Schema::dropIfExists('courses');
    }
}
