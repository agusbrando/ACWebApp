<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAspectosEvaluadosProgramacionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('aspectos_evaluados_programaciones', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_aspecto_evaluable')->unsigned();
            $table->integer('id_programacion')->unsigned();
            $table->foreign('id_aspecto_evaluable')->references('id')->on('aspectos_evaluables');
            $table->foreign('id_programacion')->references('id')->on('programaciones');
            $table->text('descripcion');
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
        Schema::dropIfExists('aspectos_evaluados_programaciones');
    }
}
