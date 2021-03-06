<?php

use Illuminate\Database\Seeder;
use App\Models\Course;


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
            'signature' => '..\storage\app\signatures\'1\'5ea93e9b2fb28.png',
            'created_at' => now(),
            'updated_at' => now(),
            'role_id' => 1,
            'timetable_id' => 1
        ]);


        //Profesores
        //2
        DB::table('users')->insert([
            'first_name' => 'Belén',
            'last_name' => 'López Pérez',
            'email' => 'belen.lopez@champusaula.com',
            'password' => bcrypt('password'),
            'created_at' => now(),
            'updated_at' => now(),
            'role_id' => 3,
            'timetable_id' => 1
        ]);
        //3
        DB::table('users')->insert([
            'first_name' => 'Guillermo',
            'last_name' => 'Garrido Portes',
            'email' => 'guillermo.garrido@champusaula.com',
            'password' => bcrypt('password'),
            'created_at' => now(),
            'updated_at' => now(),
            'role_id' => 3,
            'timetable_id' => 1
        ]);
        //4
        DB::table('users')->insert([
            'first_name' => 'Marcelo',
            'last_name' => 'Malonda Pellicer',
            'email' => 'marcelo.malonda@champusaula.com',
            'password' => bcrypt('password'),
            'created_at' => now(),
            'updated_at' => now(),
            'role_id' => 3,
            'timetable_id' => 1
        ]);
        //5
        DB::table('users')->insert([
            'first_name' => 'Matilde',
            'last_name' => 'Gil Villanova',
            'email' => 'matilde.gil@champusaula.com',
            'password' => bcrypt('password'),
            'created_at' => now(),
            'updated_at' => now(),
            'role_id' => 3,
            'timetable_id' => 1
        ]);
        //6
        DB::table('users')->insert([
            'first_name' => 'Miguel Ángel',
            'last_name' => 'Belenguer Sánchez',
            'email' => 'miguel.belenguer@champusaula.com',
            'password' => bcrypt('password'),
            'created_at' => now(),
            'updated_at' => now(),
            'role_id' => 3,
            'timetable_id' => 1
        ]);
        //7
        DB::table('users')->insert([
            'first_name' => 'José Manuel',
            'last_name' => 'Ramón García',
            'email' => 'josemanuel.ramon@champusaula.com',
            'password' => bcrypt('password'),
            'created_at' => now(),
            'updated_at' => now(),
            'role_id' => 3,
            'timetable_id' => 1
        ]);
        //8
        DB::table('users')->insert([
            'first_name' => 'Raquel',
            'last_name' => 'Valls Valls',
            'email' => 'raquel.valls@champusaula.com',
            'password' => bcrypt('password'),
            'created_at' => now(),
            'updated_at' => now(),
            'role_id' => 3,
            'timetable_id' => 1
        ]);
        //9
        DB::table('users')->insert([
            'first_name' => 'Jose',
            'last_name' => 'Fito',
            'email' => 'jose.fito@champusaula.com',
            'password' => bcrypt('password'),
            'created_at' => now(),
            'updated_at' => now(),
            'role_id' => 3,
            'timetable_id' => 1
        ]);
        //10
        DB::table('users')->insert([
            'first_name' => 'Mario',
            'last_name' => 'García Atienza',
            'email' => 'mario.garcia@champusaula.com',
            'password' => bcrypt('password'),
            'created_at' => now(),
            'updated_at' => now(),
            'role_id' => 3,
            'timetable_id' => 1
        ]);
        //11
        DB::table('users')->insert([
            'first_name' => 'Olga ',
            'last_name' => 'Minguet',
            'email' => 'olga.minguet@champusaula.com',
            'password' => bcrypt('password'),
            'created_at' => now(),
            'updated_at' => now(),
            'role_id' => 3,
            'timetable_id' => 1
        ]);
        //12
        DB::table('users')->insert([
            'first_name' => 'Javier ',
            'last_name' => 'Tárrega',
            'email' => 'javier.tarrega@champusaula.com',
            'password' => bcrypt('password'),
            'created_at' => now(),
            'updated_at' => now(),
            'role_id' => 3,
            'timetable_id' => 1
        ]);


        //ALUMNOS
        $cursos = Course::all();
        foreach ($cursos as $curso) {
            for ($i = 1; $i <= $curso->num_students; $i++) {
                DB::table('users')->insert([
                    'first_name' => 'Alumno' . $i . ' ' . $curso->level . $curso->abbreviation,
                    'last_name' => 'Apellido' . $i,
                    'email' => 'Alumno' . $i . $curso->level . $curso->abbreviation . '@campusaula.com',
                    'password' => bcrypt('password'),
                    'created_at' => now(),
                    'updated_at' => now(),
                    'role_id' => 4,
                    'timetable_id' => 1
                ]);
            }
        }
    }
}
