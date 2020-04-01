<?php

use Illuminate\Database\Seeder;

class TiposItemTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tipos_items')->insert([
            'nombre' => 'Teclado',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('tipos_items')->insert([
            'nombre' => 'All in One',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('tipos_items')->insert([
            'nombre' => 'Raton',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('tipos_items')->insert([
            'nombre' => 'Aire Acondicionado',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('tipos_items')->insert([
            'nombre' => 'Portatil',
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
