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
        
        DB::table('items-users')->insert([
            'item_id' => 2,
            'user_id' => 1,
            'date_inicio' => Carbon::create('2019','09','16'),
            'date_fin' => Carbon::create('2020','06','12'),
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('items-users')->insert([
            'item_id' => 1,
            'user_id' => 2,
            'date_inicio' => Carbon::create('2019','09','16'),
            'date_fin' => Carbon::create('2020','06','12'),
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
