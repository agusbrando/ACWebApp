<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use App\Models\Role;

class UserTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function rolTest()
    {
        $user = User::find(3);
        $role = Role::find($user->role_id);

        $this->assertEquals($user->role->name, $role->name);
    }
}
