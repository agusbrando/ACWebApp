<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\User;
use App\Models\Role;
class UserTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
    {
         $user = User::find(3);
        $role = Role::find($user->role_id);

        $this->assertEquals($user->role->name, $role->name);

    }
}
