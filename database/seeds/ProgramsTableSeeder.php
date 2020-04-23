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
            'date_check' => '2019-09-22',	
            'notes' => 'Muy bien estructurado',
            'subject_id' => 3,
            'professor_id' => 3,
            'name'=> 'DAM - Programacion multimedia y dispositivos moviles (2020)',
            'user_id' => 4,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('programs')->insert([
            'date_check' => '2019-09-22',	
            'notes' => 'Muy bien estructurado',
            'subject_id' => 2,
            'professor_id' => 3,
            'user_id' => 4,
            'name'=> 'DAW - Bases de Datos (2020)',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('programs')->insert([
            'date_check' => '2019-09-22',	
            'notes' => 'Muy bien estructurado',
            'subject_id' => 3,
            'professor_id' => 3,
            'user_id' => 4,
            'name'=>'DAM semipresencial - Programacion multimedia y dispositivos moviles (2020)',
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
