<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProgramacionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('programaciones', function (Blueprint $table) {
            $table->increments('id');
            $table->date('f_comprobacion');	
            $table->text('observaciones');
            $table->integer('id_asignatura')->unsigned();
            $table->integer('id_profesor')->unsigned();
            $table->integer('id_responsable')->unsigned();
            $table->foreign('id_asignatura')->references('id')->on('asignaturas');
            $table->foreign('id_profesor')->references('id')->on('usuarios');
            $table->foreign('id_responsable')->references('id')->on('usuarios');
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
        Schema::dropIfExists('programaciones');
    }
}
