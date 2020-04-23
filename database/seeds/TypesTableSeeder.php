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
            'name' => 'Reunión',
            'model' => 'App\Models\Percentage',
	        'created_at' => now(),
            'updated_at' => now()      
        ]);
        
        DB::table('types')->insert([
            'name' => 'Examen',
            'model' => 'App\Models\Event',
	        'created_at' => now(),
            'updated_at' => now()      
        ]);

	    DB::table('types')->insert([
            'name' => 'Claustro',
            'model' => 'App\Models\Item',	    
            'created_at' => now(),
            'updated_at' => now()      
        ]);
	
	    DB::table('types')->insert([
            'name' => 'Charla',
            'model' => 'App\Models\Misbehaviors',
	        'created_at' => now(),
            'updated_at' => now()            
        ]);
    }
}
