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
        //TODO matricular al estudiante default en todas las asignaturas de su curso

        for ($i = 5; $i <= 11; $i++) {
            DB::table('yearUnionUsers')->insert([
                'user_id' => $i,
                'year_union_id' => 1,
                'assistance' =>true,
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }

        for ($i = 11; $i <= 16; $i++) {
            DB::table('yearUnionUsers')->insert([
                'user_id' => $i,
                'year_union_id' => 2,
                'assistance' =>true,
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }






        DB::table('yearUnionUsers')->insert([
            'year_union_id' => '2',
            'user_id' => '2',
            'assistance' => true,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('yearUnionUsers')->insert([
            'year_union_id' => '1',
            'user_id' => '1',
            'assistance' => true,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('yearUnionUsers')->insert([
            'year_union_id' => '3',
            'user_id' => '3',
            'assistance' => true,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('yearUnionUsers')->insert([
            'year_union_id' => '3',
            'user_id' => '2',
            'assistance' => true,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('yearUnionUsers')->insert([
            'year_union_id' => '4',
            'user_id' => '3',
            'assistance' => true,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
