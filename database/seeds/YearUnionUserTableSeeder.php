<?php

use Illuminate\Database\Seeder;

class YearUnionUserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('yearUnionUsers')->insert([
            'year_union_id' => '2',
            'user_id' => '2',
            'assistance' => 'true',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('yearUnionUsers')->insert([
            'year_union_id' => '1',
            'user_id' => '1',
            'assistance' => 'true',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('yearUnionUsers')->insert([
            'year_union_id' => '3',
            'user_id' => '3',
            'assistance' => 'true',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('yearUnionUsers')->insert([
            'year_union_id' => '6',
            'user_id' => '2',
            'assistance' => 'true',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('yearUnionUsers')->insert([
            'year_union_id' => '5',
            'user_id' => '3',
            'assistance' => 'true',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
