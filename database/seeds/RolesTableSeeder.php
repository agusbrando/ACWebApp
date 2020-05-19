<?php

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
<<<<<<< HEAD
        $role = new Role();
        $role->name = 'admin';
        $role->slug = 'admin';
        $role->description = 'Administrator';
        $role->level = '5';
        $role->save();
        
        $role = new Role();
        $role->name = 'Profesor';
        $role->slug = 'prof';
        $role->description = 'Profesorado';
        $role->level = '4';
        $role->save();

        $role = new Role();
        $role->name = 'Direccion';
        $role->slug = 'direc';
        $role->description = 'Direccion del centro';
        $role->level = '5';
        $role->save();


        // DB::table('roles')->insert([
        //     'name'        => 'Admin',
        //     'slug'        => 'admin',
        //     'description' => 'Admin Role',
        //     'level'       => 5,
        //     'created_at' => now(),
        //     'updated_at' => now(),
        // ]);
=======
        //TODO Roles Profesor, Alumno, Administrador, Administracion
        DB::table('roles')->insert([
            'name'        => 'Admin',
            'slug'        => 'admin',
            'description' => 'Admin Role',
            'level'       => 5,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
>>>>>>> af269c95e9b945cb87e766c055e3d88113611d06
        DB::table('roles')->insert([
            'name'        => 'User',
            'slug'        => 'user',
            'description' => 'User Role',
            'level'       => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('roles')->insert([
            'name'        => 'Unverified',
            'slug'        => 'unverified',
            'description' => 'Unverified Role',
            'level'       => 0,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }


    // public function run()
    // {
    //     /*
    //      * Role Types
    //      *
    //      */
    //     $RoleItems = [
    //         [
    //             'name'        => 'Admin',
    //             'slug'        => 'admin',
    //             'description' => 'Admin Role',
    //             'level'       => 5,
    //         ],
    //         [
    //             'name'        => 'User',
    //             'slug'        => 'user',
    //             'description' => 'User Role',
    //             'level'       => 1,
    //         ],
    //         [
    //             'name'        => 'Unverified',
    //             'slug'        => 'unverified',
    //             'description' => 'Unverified Role',
    //             'level'       => 0,
    //         ],
    //     ];

    //     /*
    //      * Add Role Items
    //      *
    //      */
    //     foreach ($RoleItems as $RoleItem) {
    //         $newRoleItem = config('roles.models.role')::where('slug', '=', $RoleItem['slug'])->first();
    //         if ($newRoleItem === null) {
    //             $newRoleItem = config('roles.models.role')::create([
    //                 'name'          => $RoleItem['name'],
    //                 'slug'          => $RoleItem['slug'],
    //                 'description'   => $RoleItem['description'],
    //                 'level'         => $RoleItem['level'],
    //             ]);
    //         }
    //     }
    // }
}
