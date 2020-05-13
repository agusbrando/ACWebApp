<?php

namespace Tests\Feature\App\Models;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Role;
use App\Models\Permission;
use App\Models\RolePermission;

class PermissionTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testExample()
    {
        $role_1 = Role::create([
            'name' => 'Test',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        $role_2 = Role::create([
            'name' => 'Test 2',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        $permission_1 = Permission::create([
            'name' => 'Prueba',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        $permission_2 = Permission::create([
            'name' => 'Prueba 2',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        $roles_permissions_1 = RolePermission::create([
            'role_id' => $role_1->id,
            'id_permission' => $permission_1->id,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        $roles_permissions_2 = RolePermission::create([
            'role_id' => $role_2->id,
            'id_permission' => $permission_1->id,
            'created_at' => now(),
            'updated_at' => now()
        ]);
         $roles_ids = $permission_1->roles->pluck('id');
         $expected_roles_id = collect([
             ['id' => $role_1->id],
             ['id' => $role_2->id]
         ])->pluck('id');

         $this->assertEquals($roles_ids,$expected_roles_id);

         RolePermission::destroy($roles_permissions_2);
         RolePermission::destroy($roles_permissions_1);
         $permission_2->delete();
         $permission_1->delete();
         $role_2->delete();
         $role_1->delete();
    }
}
