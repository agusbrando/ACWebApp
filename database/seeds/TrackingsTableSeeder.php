<?php

use Illuminate\Database\Seeder;

class TrackingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $trackings = [
            [
                'signature'=>'',
                'user_id' => '3',
                'datetime_start' =>  now(),
                'datetime_end' => now(),
                'num_hours'=>'4',
                'created_at' => now(),
                'updated_at' => now(),
                
                
            ],
            [
                'signature'=>'',
                'user_id' => '4',
                'datetime_start' =>  now(),
                'datetime_end' =>  now(),
                'num_hours'=>'3',
                'created_at' => now(),
                'updated_at' => now(),
                
                
            ],
        ];
        DB::table('trackings')->insert($trackings);
    }
}
