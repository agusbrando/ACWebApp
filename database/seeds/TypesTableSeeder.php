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
            'name' => 'Teclado',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('types')->insert([
            'model' => 'Item',
            'name' => 'All in One',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('types')->insert([
            'model' => 'Item',
            'name' => 'Raton',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('types')->insert([
            'model' => 'Item',
            'name' => 'Aire Acondicionado',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('types')->insert([
            'model' => 'Item',
            'name' => 'Portatil',
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
