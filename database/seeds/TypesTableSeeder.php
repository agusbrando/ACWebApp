<?php

use Illuminate\Database\Seeder;
use App\Models\Percentage;
use App\Models\Item;
use App\Models\Misbehavior;
use App\Models\Event;


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
        
        DB::table('types')->insert([
            'name' => 'default2',
            'model' => Event::class,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('types')->insert([
            'name' => 'Portatil',
            'model' => Item::class,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('types')->insert([
            'name' => 'All in One',
            'model' => Item::class,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('types')->insert([
            'name' => 'Torre',
            'model' => Item::class,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('types')->insert([
            'name' => 'Teclado',
            'model' => Item::class,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('types')->insert([
            'name' => 'Pantalla',
            'model' => Item::class,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('types')->insert([
            'name' => 'default3',
            'model' => Misbehavior::class,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('types')->insert([
            'name' => 'Trabajos',
            'model' => Percentage::class,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('types')->insert([
            'name' => 'Examenes',
            'model' => Percentage::class,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('types')->insert([
            'name' => 'Practicas',
            'model' => Percentage::class,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('types')->insert([
            'name' => 'Actitud',
            'model' => Percentage::class,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('types')->insert([
            'name' => 'Parcial',
            'model' => Task::class,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('types')->insert([
            'name' => 'Practica',
            'model' => Task::class,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('types')->insert([
            'name' => 'ActitudNota',
            'model' => Task::class,
            'created_at' => now(),
            'updated_at' => now()
        ]);
    
    }
}
