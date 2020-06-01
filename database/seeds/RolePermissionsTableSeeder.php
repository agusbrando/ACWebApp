<?php

use Illuminate\Database\Seeder;
use App\Models\Role;
use App\Models\Permission;

class RolePermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $roles = Role::all();
        $permissions = Permission::all();
        foreach ($roles as $role) {
            if ($role->name == 'Admin') {
                foreach ($permissions as $permission) {
                    $permission->roles()->sync($role->id);
                }
            }
        }
    }
}
