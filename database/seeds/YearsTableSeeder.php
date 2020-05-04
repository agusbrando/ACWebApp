<?php

use Illuminate\Database\Seeder;

class YearsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('years')->insert([
            'name' => '2016/2017',
            'email' => 'admin@campusaula.com',
            'date_start' => '2016/09/09',
            'date_end' => '2017/06/15',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('years')->insert([
            'name' => '2017/2018',
            'email' => 'admin@campusaula.com',
            'date_start' => '2017/09/09',
            'date_end' => '2018/06/15',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('years')->insert([
            'name' => '2018/2019',
            'email' => 'admin@campusaula.com',
            'date_start' => '2018/09/09',
            'date_end' => '2019/06/15',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('years')->insert([
            'name' => '2019/2020',
            'email' => 'admin@campusaula.com',
            'date_start' => '2019/09/09',
            'date_end' => '2020/06/15',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('years')->insert([
            'name' => '2019/2020',
            'email' => 'admin@campusaula.com',
            'date_start' => '2019/09/09',
            'date_end' => '2020/06/15',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
