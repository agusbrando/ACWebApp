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
            'model' => 'defaultModel',
            'name' => 'default'
            
        ]);
        
        DB::table('types')->insert([
            'model' => 'defaultModel',
            'name' => 'default2'
                
        ]);
    }
}