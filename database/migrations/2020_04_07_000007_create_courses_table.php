<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


class CreateCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {
            //Esto crea un id que cada vez se añada uno se vaya incrementando
            $table->increments('id'); 
            //Este solo permite decimales que no sean negativos
            $table->integer('level')->unsigned();  
            $table->string('name');
            $table->string('abbreviation');
            $table->integer('num_students');
            //Esto creará utomaticamente las fechas de cuando se creó y se editó
            $table->timestamps();
            //Cuando eliminemos un objeto de esta tabla solo se borrará el registro,
            //así que el usuario no lo verá pero segirá esixtiendo en la Base de datos.
            //Así si hay otros objetos que dependan de este nos ahorramos errores.
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('courses');
    }
}
