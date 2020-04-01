<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        for ($i = 1; $i < 6; $i++) {
            DB::table('users')->insert([
                'email'         =>    'email ' . $i,
                'password'    =>    'password ' . $i,
                'first_name'         =>    'first_name ' . $i,
                'last_name'    =>    'last_name ' . $i,
                'rol_id'         =>    $i
            ]);
        }
    }
}
