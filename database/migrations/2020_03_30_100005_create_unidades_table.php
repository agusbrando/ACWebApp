<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUnidadesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('unidades', function (Blueprint $table) {
            $table->increments('id');
            $table->date('f_inicio_programada');	
            $table->date('f_fin_programada');	
            $table->date('f_inicio_impartida');	
            $table->date('f_fin_impartida');	
            $table->enum('eval_programada', ['1EVAL', '2EVAL','3EVAL']);
            $table->enum('eval_impartida', ['1EVAL', '2EVAL','3EVAL']);
            $table->text('observaciones');
            $table->text('mejoras');
            $table->integer('id_programacion')->unsigned();
            $table->foreign('id_programacion')->references('id')->on('programaciones')->onDelete('cascade');
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
        Schema::dropIfExists('unidades');
        Schema::enableForeignKeyConstraints();
    }
}
