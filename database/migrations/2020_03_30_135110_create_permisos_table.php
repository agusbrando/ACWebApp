<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePermisosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('permisos', function (Blueprint $table) {
            $table->bigIncrements('id')->unsigned;
            $table->string('nombre_permiso');
            $table->integer('id_rol')->foreign('id_rol')->references('id')->on('roles');
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
        
        Schema::enableForeignKeyConstraints();
        Schema::dropIfExists('permisos');
        Schema::disableForeignKeyConstraints();
    }
}
