<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePercentagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('percentages', function (Blueprint $table) {
            $table->integer('evaluation_id')->unsigned();
            $table->integer('type_id')->unsigned();
            $table->integer('percentage')->unsigned();
            $table->timestamps();

            $table->primary(['evaluation_id', 'type_id']);
            $table->foreign('evaluation_id')->references('id')->on('evaluations');
            $table->foreign('type_id')->references('id')->on('types');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('percentages');
    }
}
