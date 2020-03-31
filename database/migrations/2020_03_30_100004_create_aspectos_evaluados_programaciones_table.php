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
        Schema::create('aspectos_evaluados', function (Blueprint $table) {
            $table->primary(['id_programacion', 'id_aspecto']);
            $table->integer('id_aspecto')->unsigned();
            $table->integer('id_programacion')->unsigned();
            $table->foreign('id_aspecto')->references('id')->on('aspectos_evaluables')->onDelete('cascade');
            $table->foreign('id_programacion')->references('id')->on('programaciones')->onDelete('cascade');
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
        Schema::dropIfExists('aspectos_evaluados');
    }
}
