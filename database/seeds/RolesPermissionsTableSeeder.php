<?php

use Illuminate\Database\Seeder;

class RolesPermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles_permissions')->insert([
            'role_id' => 1,
            'id_permission' => 2,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
