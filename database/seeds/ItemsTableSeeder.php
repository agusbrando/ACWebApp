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
            'name' => 'Portatil HP',
            'date_pucharse' => Carbon::create('2020','03','30'),
            'classroom_id' => 1,
            'state_id' => 1,
            'type_id' => 1,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('items')->insert([
            'name' => 'All in One Lenovo',
            'date_pucharse' => Carbon::create('2020','02','23'),
            'classroom_id' => 2,
            'state_id' => 1,
            'type_id' => 2,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('items')->insert([
            'name' => 'Teclado Logitech',
            'date_pucharse' => Carbon::create('2015','01','10'),
            'classroom_id' => 2,
            'state_id' => 1,
            'type_id' => 1,
            'created_at' => now(),
            'updated_at' => now()
        ]);

       
    }
}
