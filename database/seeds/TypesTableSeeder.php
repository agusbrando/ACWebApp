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
            'name' => 'Tutorías',
            'model' => 'App\Models\Percentage',
	        'created_at' => now(),
            'updated_at' => now()      
        ]);
        
        DB::table('types')->insert([
            'name' => 'Reserva de aulas',
            'model' => 'App\Models\Event',
	        'created_at' => now(),
            'updated_at' => now()      
        ]);

    }
}
