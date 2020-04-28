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
        DB::table('permissionRole')->insert([
            'role_id' => 1,
            'permission_id' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('permissionRole')->insert([
            'role_id' => 1,
            'permission_id' => 2,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('permissionRole')->insert([
            'role_id' => 1,
            'permission_id' => 3,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
