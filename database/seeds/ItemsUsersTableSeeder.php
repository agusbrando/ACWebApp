<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class ItemsUsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        //ERROR: NO CARGA LOS DATOS EN LA BD
        //
        DB::table('items-users')->insert([
            'id_item' => 2,
            'id_user' => 1,
            'fecha_inicio' => Carbon::create('2019','09','16'),
            'fecha_fin' => Carbon::create('2020','06','12'),
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('items-users')->insert([
            'id_item' => 1,
            'id_user' => 2,
            'fecha_inicio' => Carbon::create('2019','09','16'),
            'fecha_fin' => Carbon::create('2020','06','12'),
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
