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
            'model' => 'Item',
            'nombre' => 'Teclado',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('types')->insert([
            'model' => 'Item',
            'nombre' => 'All in One',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('types')->insert([
            'model' => 'Item',
            'nombre' => 'Raton',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('types')->insert([
            'model' => 'Item',
            'nombre' => 'Aire Acondicionado',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('types')->insert([
            'model' => 'Item',
            'nombre' => 'Portatil',
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
