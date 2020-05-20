<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
class ItemsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //TODO Eliminar para produccion cuando se termine de implementar los test
        DB::table('items')->insert([
            'number' => 322,
            'name' => 'HP en-df4w43fd',
            'date_pucharse' => Carbon::create('2020','03','30'),
            'classroom_id' => 1,
            'state_id' => 1,
            'type_id' => 3,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('items')->insert([
            'number' => 243,
            'name' => 'Lenovo f4d-4f',
            'date_pucharse' => Carbon::create('2020','02','23'),
            'classroom_id' => 2,
            'state_id' => 1,
            'type_id' => 6,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('items')->insert([
            'number' => 163,
            'name' => 'Logitech g903',
            'date_pucharse' => Carbon::create('2015','01','10'),
            'classroom_id' => 2,
            'state_id' => 1,
            'type_id' => 5,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        for($i = 1; $i<=20; $i++){

            DB::table('items')->insert([
                'number' => $i,
                'name' => 'Logitech '.$i,
                'date_pucharse' => Carbon::create('2015','01','10'),
                'classroom_id' => 2,
                'state_id' => 1,
                'type_id' => 5,
                'created_at' => now(),
                'updated_at' => now()
            ]);


        }

    }
}
