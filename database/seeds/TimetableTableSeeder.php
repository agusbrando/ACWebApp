<?php

use Illuminate\Database\Seeder;

class TimetableTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //TODO SMR y FPBasica
        DB::table('timetables')->insert([
            'name' => '1SMR2020',
            'date_start' =>  now(),
            'date_end' => now(),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('timetables')->insert([
            'name' => '2SMR2020',
            'date_start' =>  now(),
            'date_end' => now(),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('timetables')->insert([
            'name' => '1FPB2020',
            'date_start' =>  now(),
            'date_end' => now(),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('timetables')->insert([
            'name' => '2FPB2020',
            'date_start' =>  now(),
            'date_end' => now(),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('timetables')->insert([
            'name' => '1DAM2020',
            'date_start' =>  now(),
            'date_end' => now(),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('timetables')->insert([
            'name' => '2DAM2020',
            'date_start' =>  now(),
            'date_end' => now(),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('timetables')->insert([
            'name' => '1ASIR2020',
            'date_start' =>  now(),
            'date_end' => now(),
            'created_at' => now(),
            'updated_at' => now(),
       
        ]);  
        DB::table('timetables')->insert([
            'name' => '1FPBASICA2020',
            'date_start' =>  now(),
            'date_end' => now(),
            'created_at' => now(),
            'updated_at' => now(),
        ]);   
        DB::table('timetables')->insert([
            'name' => '2FPBASICA2020',
            'date_start' =>  now(),
            'date_end' => now(),
            'created_at' => now(),
            'updated_at' => now(),
        ]);      

        DB::table('timetables')->insert([
            'name' => '2ASIR2020',
            'date_start' =>  now(),
            'date_end' => now(),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('timetables')->insert([
            'name' => '1ASIR2020',
            'date_start' =>  now(),
            'date_end' => now(),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('timetables')->insert([
            'name' => '2DAW2020',
            'date_start' =>  now(),
            'date_end' => now(),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('timetables')->insert([
            'name' => '1DAW2020',
            'date_start' =>  now(),
            'date_end' => now(),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('timetables')->insert([
            'name' => '1SMR2020',
            'date_start' =>  now(),
            'date_end' => now(),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('timetables')->insert([
            'name' => '2SMR2020',
            'date_start' =>  now(),
            'date_end' => now(),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
