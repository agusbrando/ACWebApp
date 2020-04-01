<?php

use Illuminate\Database\Seeder;

class EstadosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('estados')->insert([
            'nombre' => 'Averiado',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('estados')->insert([
            'nombre' => 'Mantenimiento',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('estados')->insert([
            'nombre' => 'Reparado',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('estados')->insert([
            'nombre' => 'Sin Averias',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('estados')->insert([
            'nombre' => 'Obsoleto',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('estados')->insert([
            'nombre' => 'Pendiente de compra',
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
