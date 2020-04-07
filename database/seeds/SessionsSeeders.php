<?php

use Illuminate\Database\Seeder;

class SessionsSeeders extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sessions')->insert([
            'id' => 1,
            'time_start' => now(),
            'time_end' => now(),
            'model' => 'prueba',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
