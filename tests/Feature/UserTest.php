<?php

namespace Tests\Feature;
use App\Models\User;
use App\Models\Role;
use App\Models\Post;
use App\Models\Comment;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testRole() {
        $role = Role::create([
            'name' => 'Name Testing',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        $user = User::create([
            'role_id' => $role->id,
            'first_name' => 'First Name Testing',
            'last_name' => 'Last Name Testing',
            'password' => 'Password Testing',
            'email' => 'emailtesting@campusaula.com',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        $this->assertEquals($user->role->id, $role->id);

        $user->delete();
        $role->delete();
    }

    public function testComments() {
        $role = Role::create([
            'name' => 'Name Testing',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        $user = User::create([
            'role_id' => $role->id,
            'first_name' => 'First Name Testing',
            'last_name' => 'Last Name Testing',
            'password' => 'Password Testing',
            'email' => 'emailtesting@campusaula.com',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        $post = Post::create([
            'user_id' => $user->id,
            'text' => 'Post Testing',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        $comment1 = Comment::create([
            'user_id' => $user->id,
            'post_id' => $post->id,
            'text' => 'Comment 1 Testing',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        $comment2 = Comment::create([
            'user_id' => $user->id,
            'post_id' => $post->id,
            'text' => 'Comment 2 Testing',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        $this->assertCount(2, $user->comments);
        $this->assertEquals($user->comments[0]->id, $comment1->id);
        $this->assertEquals($user->comments[1]->id, $comment2->id);

        $comment2->delete();
        $comment1->delete();
        $post->delete();
        $user->delete();
        $role->delete();
    }
}
