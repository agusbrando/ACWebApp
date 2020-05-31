<?php

namespace Tests\Feature;
use App\Models\Role;
use App\Models\User;
use App\Models\Post;
use App\Models\Comment;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CommentTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testUser() {
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
            'title' => 'Post Title Testing',
            'text' => 'Post Testing',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        $comment = Comment::create([
            'user_id' => $user->id,
            'post_id' => $post->id,
            'text' => 'Comment Testing',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        $this->assertEquals($comment->user->id, $user->id);

        $comment->delete();
        $post->delete();
        $user->delete();
        $role->delete();
    }

    public function testPost() {
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
            'title' => 'Post Title Testing',
            'text' => 'Post Testing',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        $comment = Comment::create([
            'user_id' => $user->id,
            'post_id' => $post->id,
            'text' => 'Comment Testing',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        $this->assertEquals($comment->post->id, $post->id);

        $comment->delete();
        $post->delete();
        $user->delete();
        $role->delete();
    }
}
