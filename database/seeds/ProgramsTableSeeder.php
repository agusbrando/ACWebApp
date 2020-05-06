<?php

use Illuminate\Database\Seeder;

class ProgramsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('programs')->insert([
            'professor_id' => 3,
            'name'=> 'DAM - Programacion multimedia y dispositivos moviles (2020)',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('programs')->insert([
            'professor_id' => 3,
            'name'=> 'DAW - Bases de Datos (2020)',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('programs')->insert([
            'professor_id' => 3,
            'name'=>'DAM semipresencial - Programacion multimedia y dispositivos moviles (2020)',
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
