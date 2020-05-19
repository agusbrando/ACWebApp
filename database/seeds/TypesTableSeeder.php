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
        //TODO Tutorías, Reserva de Aula, PCS, Portatiles, Pantallas, RACK, Proyector (COMPLETO)
        DB::table('types')->insert([
            'name' => 'Tutorías',
            'model' => Event::class,
	        'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('types')->insert([
            'name' => 'Reserva de aulas',
            'model' => Event::class,
	        'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('types')->insert([
            'name' => 'Horario',
            'model' =>'App\Models\Sessions',
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
            'name' => 'RACK',
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
            'name' => 'Proyector',
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
            'model' => 'App\Models\Task',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('types')->insert([
            'name' => 'Examenes',
            'model' => 'App\Models\Task',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('types')->insert([
            'name' => 'Actitud',
            'model' => 'App\Models\Task',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('types')->insert([
            'name' => 'Recuperacion',
            'model' => 'App\Models\Task',
            'created_at' => now(),
            'updated_at' => now()
        ]);
       

    }
}
