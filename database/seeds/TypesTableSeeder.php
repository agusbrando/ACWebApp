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
            'model' => 'App\Models\Percentage',
	    'created_at' => now(),
            'updated_at' => now()      
        ]);
        
        DB::table('types')->insert([
            'name' => 'default2',
            'model' => 'App\Models\Event',
	    'created_at' => now(),
            'updated_at' => now()      
        ]);

	DB::table('types')->insert([
            'name' => 'Portatil',
            'model' => 'App\Models\Item',	    
            'created_at' => now(),
            'updated_at' => now()      
        ]);
	
	DB::table('types')->insert([
            'name' => 'default2',
            'model' => 'App\Models\Misbehaviors',
	    'created_at' => now(),
            'updated_at' => now()            
        ]);
    }
}
