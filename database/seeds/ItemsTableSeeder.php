<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class ItemsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('items')->insert([
            'nombre' => 'Portatil HP',
            'fecha_compra' => Carbon::create('2020','03','30'),
            'id_aula' => 1,
            'id_estado' => 6,
            'id_tipo_item' => 5,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('items')->insert([
            'nombre' => 'All in One Lenovo',
            'fecha_compra' => Carbon::create('2020','02','23'),
            'id_aula' => 2,
            'id_estado' => 4,
            'id_tipo_item' => 2,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('items')->insert([
            'nombre' => 'Teclado Logitech',
            'fecha_compra' => Carbon::create('2015','01','10'),
            'id_aula' => 2,
            'id_estado' => 1,
            'id_tipo_item' => 1,
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
