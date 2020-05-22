<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
            $table->increments('id');
            $table->string('number');
            $table->string('name');
            $table->DateTime('date_pucharse');
            $table->integer('classroom_id')->unsigned(); //Clava ajena
            $table->integer('state_id')->unsigned(); //Clava ajena
            $table->integer('type_id')->unsigned(); //Clava ajena
            $table->timestamps();
            $table->softDeletes();

            //Ponemos las claves ajenas
            $table->foreign('classroom_id')->references('id')->on('classrooms');
            $table->foreign('state_id')->references('id')->on('states');
            $table->foreign('type_id')->references('id')->on('types')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::disableForeignKeyConstraints();  //Ponemos esto en la primera tabla que tiene claves ajenas para que no de error de permisos al hacer el refesh
        Schema::dropIfExists('items');
    }
}
