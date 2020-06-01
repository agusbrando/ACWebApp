<?php

namespace Tests\Feature;
use App\Models\Role;
use App\Models\User;
use App\Models\Post;
use App\Models\Comment;
use App\Models\Attachment;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PostTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
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
            'title' => 'Post Title Testing',
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

        $this->assertCount(2, $post->comments);
        $this->assertEquals($post->comments[0]->id, $comment1->id);
        $this->assertEquals($post->comments[1]->id, $comment2->id);

        $comment2->delete();
        $comment1->delete();
        $post->delete();
        $user->delete();
        $role->delete();
    }

    public function testAttachmentablements() {
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

        $attachment1 = Attachment::create([
            'name' => 'Attachment Name Testing 1',
            'attachmentable_id' => $post->id,
            'attachmentable_type' => Post::class,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        $attachment2 = Attachment::create([
            'name' => 'Attachment Name Testing 2',
            'attachmentable_id' => $post->id,
            'attachmentable_type' => Post::class,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        $this->assertCount(2, $post->attachments);
        $this->assertEquals($post->attachments[0]->id, $attachment1->id);
        $this->assertEquals($post->attachments[1]->id, $attachment2->id);

        $this->assertInstanceOf(Post::class, $attachment1->attachmentable);
        $this->assertInstanceOf(Post::class, $attachment2->attachmentable);

        $attachment2->delete();
        $attachment1->delete();
        $post->delete();
        $user->delete();
        $role->delete();
    }
}
