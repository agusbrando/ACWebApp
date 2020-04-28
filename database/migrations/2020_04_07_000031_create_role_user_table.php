<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRoleUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

            Schema::create('roleUser', function (Blueprint $table) {
                $table->increments('id')->unsigned();
                $table->integer('role_id')->unsigned()->index();
                $table->foreign('role_id')->references('id')->on('roles')->onDelete('cascade');
                $table->integer('user_id')->unsigned()->index();
                $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
                $table->timestamps();
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
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('roleUser');
        Schema::enableForeignKeyConstraints();
    }
}