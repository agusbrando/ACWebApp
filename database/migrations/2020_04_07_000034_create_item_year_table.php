<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemYearTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('itemYear', function (Blueprint $table) {

            $table->increments('id');
            $table->integer('item_id')->unsigned();
            $table->integer('year_user_id')->unsigned();
            $table->timestamps();
            $table->foreign('item_id')->references('id')->on('items');
            $table->foreign('year_user_id')->references('id')->on('yearUnionUsers');
           

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('itemYear');
    }
}
