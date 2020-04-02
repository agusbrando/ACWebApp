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
            $table->unique(['rol_id','id_permiso']);
            $table->increments('id');
            $table->integer('rol_id')->unsigned();
            $table->integer('id_permiso')->unsigned();
            $table->foreign('rol_id')->references('id')->on('roles')->onDelete('cascade');
            $table->foreign('id_permiso')->references('id')->on('permisos')->onDelete('cascade');
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
        Schema::dropIfExists('roles_permisos');
    }
}
