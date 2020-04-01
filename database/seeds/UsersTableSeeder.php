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
        DB::table('users')->insert([
            'name' => 'Admin',
            'email' => 'admin@campusaula.com',
            'password' => bcrypt('adminPass'),
            'id_curso' => 'SMR',
        ]);
        DB::table('users')->insert([
            'name' => 'User',
            'email' => 'user@campusaula.com',
            'password' => bcrypt('userPass'),
            'id_curso' => 'DAM',
        ]);
    }
}
