<?php

use Illuminate\Database\Seeder;

class ProgramacionesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('programaciones')->insert([
            'f_comprobacion' => '2019-09-22',	
            'observaciones' => 'Muy bien estructurado',
            'id_asignatura' => 3,
            'id_profesor' => 3,
            'id_responsable' => 4,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('programaciones')->insert([
            'f_comprobacion' => '2019-09-22',	
            'observaciones' => 'Muy bien estructurado',
            'id_asignatura' => 2,
            'id_profesor' => 3,
            'id_responsable' => 4,
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
