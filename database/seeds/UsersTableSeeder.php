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
            'first_name' => 'Admin',
            'email' => 'admin@campusaula.com',
            'last_name' => 'Admin',
            'password' => bcrypt('adminPass'),
            'signature'=>'..\storage\app\signatures\'1\'5ea93e9b2fb28.png',
            'created_at' => now(),
            'updated_at' => now(),
            'role_id' => 1,
            'timetable_id'=>1
        ]);
        DB::table('users')->insert([
            'first_name' => 'Alumno',
            'last_name' => 'Apellido',
            'email' => 'user@campusaula.com',
            'password' => bcrypt('password'),
            'created_at' => now(),
            'updated_at' => now(),
            'role_id' => 4,
            'timetable_id'=>1
        ]);
        DB::table('users')->insert([
            'first_name' => 'Guillermo',
            'last_name' => 'Garrido Portes',
            'email' => 'guillermo.garrido@campusaula.com',
            'password' => bcrypt('password'),
            'created_at' => now(),
            'updated_at' => now(),
            'role_id' => 2,
            'timetable_id'=>1
        ]);
        DB::table('users')->insert([
            'first_name' => 'Marcelo',
            'last_name' => 'Malonda Pellicer',
            'email' => 'marcelo.malonda@campusaula.com',
            'password' => bcrypt('password'),
            'created_at' => now(),
            'updated_at' => now(),
            'role_id' => 3,
            'timetable_id'=>1
        ]);
    }
}
