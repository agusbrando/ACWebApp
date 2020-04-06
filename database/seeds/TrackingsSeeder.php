<?php

use Illuminate\Database\Seeder;

class TrackingsSeeder extends Seeder
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
                
                
            ],
            [
                'signature'=>'',
                'user_id' => '4',
                'datetime_start' =>  now(),
                'datetime_end' =>  now(),
                'num_hours'=>'3',
                
                
            ],
        ];
        DB::table('trackings')->insert($trackings);
    }
}
