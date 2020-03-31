<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSeguimientosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('seguimientos', function (Blueprint $table) {
            $table->bigIncrements('id');
           
            $table->timestamps();
            $table->string('firma');
            $table->integer('id_usuario')->foreign('id_usuario')->references('id')->on('users');
            
            $table->string('hora_entrada');
            $table->string('hora_salida');
            $table->string('horas');
            $table->date('fecha');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('seguimientos');
    }
}