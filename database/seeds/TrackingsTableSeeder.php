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
                'date_signature'=>  now(),
                'time_start'=>'8:30',
                'time_end'=>'14:30',
                'num_hours'=>'4',
                'created_at' => now(),
                'updated_at' => now(),
                
            ],
            [
                'signature'=>'',
                'user_id' => '4',
                'date_signature'=>  now(),
                'time_start'=>'8:30',
                'time_end'=>'14:30',
                'num_hours'=>'3',
                'created_at' => now(),
                'updated_at' => now(),
                
                
            ],
        ];
        DB::table('trackings')->insert($trackings);
    }
}
