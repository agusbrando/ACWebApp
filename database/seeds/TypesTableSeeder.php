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
            'name' => 'Practicas',
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
            'name' => 'default3',
            'model' => 'App\Models\Misbehaviors',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        // DB::table('types')->insert([
        //     'name' => 'Parcial',
        //     'model' => 'App\Models\Task',
        //     'created_at' => now(),
        //     'updated_at' => now()
        // ]);

        // DB::table('types')->insert([
        //     'name' => 'Practica',
        //     'model' => 'App\Models\Task',
        //     'created_at' => now(),
        //     'updated_at' => now()
        // ]);

        // DB::table('types')->insert([
        //     'name' => 'ActitudNota',
        //     'model' => 'App\Models\Task',
        //     'created_at' => now(),
        //     'updated_at' => now()
        // ]);
    }
}
