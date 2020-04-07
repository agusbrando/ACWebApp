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
            'model' => 'App\Models\Percentage'
        ]);
        
        DB::table('types')->insert([
            'name' => 'default2',
            'model' => 'App\Models\Event'      
        ]);

	DB::table('types')->insert([
            'name' => 'default2',
            'model' => 'App\Models\Item'      
        ]);
	
	DB::table('types')->insert([
            'name' => 'default2',
            'model' => 'App\Models\Misbehaviors'      
        ]);
    }
}
