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
            'email' => 'admin@champusaula.com',
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
            'role_id' => 3,
            'timetable_id'=>1
        ]);
        
        DB::table('users')->insert([
            'first_name' => 'sergio',
            'last_name' => 'sergio',
            'email' => 'sergio@sergio.com',
            'password' => bcrypt('@VcEse5F@b25c7e'),
            'created_at' => now(),
            'updated_at' => now(),
            'role_id' => 3,
            'timetable_id'=>1
        ]);
        
        DB::table('users')->insert([
            'first_name' => 'Default',
            'last_name' => 'User',
            'email' => 'user@default.com',
            'password' => bcrypt('default'),
            'created_at' => now(),
            'updated_at' => now(),
            'role_id' => 3,
            'timetable_id'=>1
        ]);

        //Profesores
        DB::table('users')->insert([
            'first_name' => 'Belén',
            'last_name' => 'López Pérez',
            'email' => 'belen.lopez@champusaula.com',
            'password' => bcrypt('password'),
            'created_at' => now(),
            'updated_at' => now(),
            'role_id' => 3,
            'timetable_id'=>1
        ]);
        DB::table('users')->insert([
            'first_name' => 'Guillermo',
            'last_name' => 'Garrido Portes',
            'email' => 'guillermo.garrido@champusaula.com',
            'password' => bcrypt('password'),
            'created_at' => now(),
            'updated_at' => now(),
            'role_id' => 2,
            'timetable_id'=>1
        ]);
        DB::table('users')->insert([
            'first_name' => 'Marcelo',
            'last_name' => 'Malonda Pellicer',
            'email' => 'marcelo.malonda@champusaula.com',
            'password' => bcrypt('password'),
            'created_at' => now(),
            'updated_at' => now(),
            'role_id' => 3,
            'timetable_id'=>1
        ]);
        DB::table('users')->insert([
            'first_name' => 'Matilde',
            'last_name' => 'Gil Villanova',
            'email' => 'matilde.gil@champusaula.com',
            'password' => bcrypt('password'),
            'created_at' => now(),
            'updated_at' => now(),
            'role_id' => 3,
            'timetable_id'=>1
        ]);

        DB::table('users')->insert([
            'first_name' => 'Miguel Ángel',
            'last_name' => 'Belenguer Sánchez',
            'email' => 'miguel.belenguer@champusaula.com',
            'password' => bcrypt('password'),
            'created_at' => now(),
            'updated_at' => now(),
            'role_id' => 3,
            'timetable_id'=>1
        ]);

        DB::table('users')->insert([
            'first_name' => 'José Manuel',
            'last_name' => 'Ramón García',
            'email' => 'josemanuel.ramon@champusaula.com',
            'password' => bcrypt('password'),
            'created_at' => now(),
            'updated_at' => now(),
            'role_id' => 3,
            'timetable_id'=>1
        ]);

        DB::table('users')->insert([
            'first_name' => 'Raquel',
            'last_name' => 'Valls Valls',
            'email' => 'raquel.valls@champusaula.com',
            'password' => bcrypt('password'),
            'created_at' => now(),
            'updated_at' => now(),
            'role_id' => 3,
            'timetable_id'=>1
        ]);

        DB::table('users')->insert([
            'first_name' => 'Jose',
            'last_name' => 'Fito',
            'email' => 'jose.fito@champusaula.com',
            'password' => bcrypt('password'),
            'created_at' => now(),
            'updated_at' => now(),
            'role_id' => 3,
            'timetable_id'=>1
        ]);

        DB::table('users')->insert([
            'first_name' => 'Mario',
            'last_name' => 'García Atienza',
            'email' => 'mario.garcia@champusaula.com',
            'password' => bcrypt('password'),
            'created_at' => now(),
            'updated_at' => now(),
            'role_id' => 3,
            'timetable_id'=>1
        ]);

        DB::table('users')->insert([
            'first_name' => 'Olga ',
            'last_name' => 'Minguet',
            'email' => 'olga.minguet@champusaula.com',
            'password' => bcrypt('password'),
            'created_at' => now(),
            'updated_at' => now(),
            'role_id' => 3,
            'timetable_id'=>1
        ]);

        //ALUMNOS
        for ($i = 1; $i <= 120; $i++) {
            DB::table('users')->insert([
                'first_name' => 'Alumno'.$i,
                'last_name' => 'Apellido'.$i,
                'email' => 'user'.$i.'@campusaula.com',
                'password' => bcrypt('password'),
                'created_at' => now(),
                'updated_at' => now(),
                'role_id' => 4,
                'timetable_id'=>1
            ]);
        }
        
    }
}
