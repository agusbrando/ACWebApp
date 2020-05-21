<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class StatesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('states')->insert([
            'name' => 'Nuevo',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('states')->insert([
            'name' => 'Averiado',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('states')->insert([
            'name' => 'Mantenimiento',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('states')->insert([
            'name' => 'Reparado',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('states')->insert([
            'name' => 'Sin Averias',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('states')->insert([
            'name' => 'Obsoleto',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('states')->insert([
            'name' => 'Pendiente de compra',
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
