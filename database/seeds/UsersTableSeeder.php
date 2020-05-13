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
            'created_at' => now(),
            'updated_at' => now(),
            'timetable_id'=>1
        ]);
        DB::table('users')->insert([
            'first_name' => 'Alumno',
            'last_name' => 'Apellido',
            'email' => 'user@campusaula.com',
            'password' => bcrypt('password'),
            'created_at' => now(),
            'updated_at' => now(),
            'timetable_id'=>1
        ]);
        DB::table('users')->insert([
            'first_name' => 'Guillermo',
            'last_name' => 'Garrido Portes',
            'email' => 'guillermo.garrido@campusaula.com',
            'password' => bcrypt('password'),
            'created_at' => now(),
            'updated_at' => now(),
            'timetable_id'=>1
        ]);
        DB::table('users')->insert([
            'first_name' => 'sergio',
            'last_name' => 'sergio',
            'email' => 'sergio@sergio.com',
            'password' => bcrypt('@VcEse5F@b25c7e'),
            'created_at' => now(),
            'updated_at' => now(),
            'role_id' => 4,
            'timetable_id'=>1
        ]);
        
        DB::table('users')->insert([
            'first_name' => 'Marcelo',
            'last_name' => 'Malonda Pellicer',
            'email' => 'marcelo.malonda@campusaula.com',
            'password' => bcrypt('password'),
            'created_at' => now(),
            'updated_at' => now(),
            'timetable_id'=>1
        ]);
        DB::table('users')->insert([
            'first_name' => 'Default',
            'last_name' => 'User',
            'email' => 'user@default.com',
            'password' => bcrypt('default'),
            'created_at' => now(),
            'updated_at' => now(),
            'timetable_id'=>1
        ]);
        for ($i = 1; $i <= 15; $i++) {
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
// public function run()
//     {
//         $userRole = config('roles.models.role')::where('name', '=', 'User')->first();
//         $adminRole = config('roles.models.role')::where('name', '=', 'Admin')->first();
//         $permissions = config('roles.models.permission')::all();

//         /*
//          * Add Users
//          *
//          */
//         if (config('roles.models.defaultUser')::where('email', '=', 'admin@admin.com')->first() === null) {
//             $newUser = config('roles.models.defaultUser')::create([
//                 'name'     => 'Admin',
//                 'email'    => 'admin@admin.com',
//                 'password' => bcrypt('password'),
//             ]);

//             $newUser->attachRole($adminRole);
//             foreach ($permissions as $permission) {
//                 $newUser->attachPermission($permission);
//             }
//         }

//         if (config('roles.models.defaultUser')::where('email', '=', 'user@user.com')->first() === null) {
//             $newUser = config('roles.models.defaultUser')::create([
//                 'name'     => 'User',
//                 'email'    => 'user@user.com',
//                 'password' => bcrypt('password'),
//             ]);

//             $newUser;
//             $newUser->attachRole($userRole);
//         }
//     }
