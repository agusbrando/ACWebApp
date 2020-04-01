<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRolesPermisosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('roles_permisos', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     
     /*$table->increments('id_roles','id_permisos');
            $table->integer('rol_id');
            $table->integer('permisos_id');
            $table->timestamps();
            
            $table->foreign('rol_id')->references('id')->on('roles');
            $table->foreign('permisos_id')->references('id')->on('permisos');*/
     
    public function down()
    {
        Schema::dropIfExists('roles_permisos');
    }
}
