<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUnitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('units', function (Blueprint $table) {
            $table->increments('id');
            $table->date('expected_date_start');	
            $table->date('expected_date_end');	
            $table->date('date_start')->nullable();	
            $table->date('date_end')->nullable();
            $table->string('name');
            $table->enum('expected_eval', ['1EVAL', '2EVAL','3EVAL']);
            $table->enum('eval', ['1EVAL', '2EVAL','3EVAL'])->nullable();
            $table->text('improvements')->nullable();
            $table->text('notes')->nullable();
            $table->integer('program_id')->unsigned();
            $table->foreign('program_id')->references('id')->on('programs')->onDelete('cascade');
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
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('units');
        Schema::enableForeignKeyConstraints();
    }
}
