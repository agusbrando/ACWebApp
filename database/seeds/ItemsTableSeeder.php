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
            'number' => 322,
            'name' => 'Portatil HP',
            'date_pucharse' => Carbon::create('2020','03','30'),
            'classroom_id' => 1,
            'state_id' => 1,
            'type_id' => 3,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('items')->insert([
            'number' => 243,
            'name' => 'All in One Lenovo',
            'date_pucharse' => Carbon::create('2020','02','23'),
            'classroom_id' => 2,
            'state_id' => 1,
            'type_id' => 6,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('items')->insert([
            'number' => 163,
            'name' => 'Teclado Logitech',
            'date_pucharse' => Carbon::create('2015','01','10'),
            'classroom_id' => 2,
            'state_id' => 1,
            'type_id' => 5,
            'created_at' => now(),
            'updated_at' => now()
        ]);

       
    }
}
