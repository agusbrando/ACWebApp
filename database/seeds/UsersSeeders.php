<?php

use Illuminate\Database\Seeder;

class UsersSeeders extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'id' => '1',
            'first_name' =>'Guillermo',
            'last_name' => 'Garrido',
            'rol_id' => 1, 
            'password' => bcrypt('adminPass'),
            'email' => 'admin@campusaula.com',
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
