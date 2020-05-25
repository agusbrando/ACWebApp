<?php

use Illuminate\Database\Seeder;
use App\Models\Role;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            'name'        => 'Admin',
            'slug'        => 'admin',
            'description' => 'Admin Role',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        

        DB::table('roles')->insert([
            'name'        => 'User',
            'slug'        => 'user',
            'description' => 'User Role',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('roles')->insert([
            'name'        => 'Profesor',
            'slug'        => 'profesor',
            'description' => 'Profesor Role',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('roles')->insert([
            'name'        => 'Alumno',
            'slug'        => 'alumno',
            'description' => 'Alumno Role',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('roles')->insert([
            'name'        => 'Administracion',
            'slug'        => 'administracion',
            'description' => 'Administracion Role',
            'created_at' => now(),
            'updated_at' => now(),
        ]);        
        DB::table('roles')->insert([
            'name'        => 'Unverified',
            'slug'        => 'unverified',
            'description' => 'Unverified Role',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
