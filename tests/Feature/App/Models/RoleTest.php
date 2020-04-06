<?php

namespace Tests\Feature\App\Models;

use App\Models\Rol;
use App\Models\User;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Support\Facades\DB;

class RoleTest extends TestCase
{

    /**
     * A basic feature test example.
     *
     * @return void
     */

    /**@test */
    public function testUsers(){

        $role_id=3;
        $users = Role::findorfail($role_id)->users->pluck('id');

        $expected_users = DB::table('users')->where('role_id', $role_id)->pluck('id');
        $this->assertEquals($users,$expected_users);

    }
}
