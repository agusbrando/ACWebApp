<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableItemsUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items-users', function (Blueprint $table) {

            $table->primary(['item_id','user_id']); //Declaro las claves primarias
            $table->integer('item_id')->unsigned(); //Pongo unsigned para que sepa que es una clave primaria
            $table->integer('user_id')->unsigned();
            $table->DateTime('date_inicio');
            $table->DateTime('date_fin');
            $table->timestamps();


            $table->foreign('item_id')->references('id')->on('items');
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('items-users');
    }
}
