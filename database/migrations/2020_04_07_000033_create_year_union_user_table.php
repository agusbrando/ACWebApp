<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class YearUnionUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('yearUnionUsers', function (Blueprint $table) {

            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->integer('year_union_id')->unsigned();
            $table->boolean('assistance');
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('year_union_id')->references('id')->on('yearUnions');
           

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('yearUnionUsers');
    }
}
