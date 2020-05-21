<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class ItemYearTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('itemYear')->insert([
            'item_id' => '1',
            'year_user_id' => '1',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('itemYear')->insert([
            'item_id' => '2',
            'year_user_id' => '2',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('itemYear')->insert([
            'item_id' => '3',
            'year_user_id' => '3',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('itemYear')->insert([
            'item_id' => '1',
            'year_user_id' => '2',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('itemYear')->insert([
            'item_id' => '2',
            'year_user_id' => '1',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
