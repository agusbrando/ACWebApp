<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTimetablesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
<<<<<<< HEAD:database/migrations/1202_04_03_084150_create_timetables_table.php
        Schema::create('timetables', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->date('date_start');
            $table->date('date_end');
            $table->timestamps();



           
=======
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('first_name');
            $table->string('last_name');
            $table->integer('rol_id')->unsigned();
            $table->string('password');
            $table->string('email')->unique();
            $table->timestamps();

            $table->foreign('rol_id')->references('id')->on('roles');
>>>>>>> origin/master_serlomar:database/migrations/2020_04_01_100002_create_users_table.php
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
<<<<<<< HEAD:database/migrations/1202_04_03_084150_create_timetables_table.php
        Schema::dropIfExists('timetables');
=======
        
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('users');
>>>>>>> origin/master_serlomar:database/migrations/2020_04_01_100002_create_users_table.php
    }
}
