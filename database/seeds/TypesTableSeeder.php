<?php

use Illuminate\Database\Seeder;

class TypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('types')->insert([
            'name' => 'default',
            'model' => 'defaultModel'
        ]);
        
        DB::table('types')->insert([
            'name' => 'default2',
            'model' => 'defaultModel'      
        ]);
    }
}
