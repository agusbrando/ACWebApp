<?php

use Illuminate\Database\Seeder;

class AsignaturasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('asignaturas')->insert([
            'nombre' => 'Acceso a Datos',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('asignaturas')->insert([
            'nombre' => 'Bases de Datos',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('asignaturas')->insert([
            'nombre' => '​​​​​​​Programación multimedia y dispositivos móviles​',
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
