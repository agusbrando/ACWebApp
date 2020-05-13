<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEvaluationTypeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('percentages', function (Blueprint $table) {
            $table->integer('year_union_id')->unsigned();
            $table->integer('type_id')->unsigned();
            $table->integer('percentage')->unsigned();
            $table->integer('min_grade')->unsigned();
            $table->integer('average_grade')->unsigned();
            $table->integer('min_average_grade')->unsigned();
            $table->timestamps();

            $table->primary(['year_union_id', 'type_id']);
            $table->foreign('year_union_id')->references('id')->on('yearUnions');
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
        Schema::dropIfExists('evaluation_type');
    }
}
