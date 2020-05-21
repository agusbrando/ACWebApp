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
            'name' => '2019/2020',
            'date_start' => '2019/09/09',
            'date_end' => '2020/06/15',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        
        
        
        
    }
}
