<?php

use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //TODO Create permisions for each CRUD - One permision for create, one for edit, one for delete, one for list, one for show
        DB::table('permissions')->insert([
            'name'        => 'Can View Users',
            'slug'        => 'view.users',
            'description' => 'Can view users',
            'model'       => 'Permission',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('permissions')->insert([
            'name'        => 'Can Create Users',
            'slug'        => 'create.users',
            'description' => 'Can create new users',
            'model'       => 'Permission',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('permissions')->insert([
            'name'        => 'Can Edit Users',
            'slug'        => 'edit.users',
            'description' => 'Can edit users',
            'model'       => 'Permission',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
