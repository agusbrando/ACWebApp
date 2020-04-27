<?php

use Illuminate\Database\Seeder;

class TasksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tasks')->insert([
            'evaluation_id' => 1,
            'type_id' => 9,
            'name' => 'Practica 1',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('tasks')->insert([
            'evaluation_id' => 1,
            'type_id' => 8,
            'name' => 'Parcial 1',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('tasks')->insert([
            'evaluation_id' => 1,
            'type_id' => 8,
            'name' => 'Parcial 2',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('tasks')->insert([
            'evaluation_id' => 1,
            'type_id' => 8,
            'name' => 'Parcial 3',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('tasks')->insert([
            'evaluation_id' => 1,
            'type_id' => 9,
            'name' => 'Practica 2',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

    }
}
