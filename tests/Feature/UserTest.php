<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Role;
use App\Models\User;

class UserTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testExample()
    {
        $user = User::find(3);
        $role = Role::find($user->role_id);

        $this->assertEquals($user->role->name,$role->name);
    }
}
