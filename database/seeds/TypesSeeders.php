<?php

use Illuminate\Database\Seeder;

class TypesSeeders extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('types')->insert([
            'id' => 1,
            'model' => 'defaultModel',
            'name' => 'default'
            ]);
        }
}
