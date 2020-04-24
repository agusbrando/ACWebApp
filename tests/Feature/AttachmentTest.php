<?php

namespace Tests\Feature;
use App\Models\Role;
use App\Models\User;
use App\Models\Post;
use App\Models\Attachment;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AttachmentTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testAttachmentable() {
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

        $attachment = Attachment::create([
            'name' => 'Attachment Name',
            'attachmentable_id' => $post->id,
            'attachmentable_type' => Post::class,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        $this->assertEquals($attachment->attachmentable->id, $post->id);

        $this->assertInstanceOf(Post::class, $attachment->attachmentable);

        $attachment->delete();
        $post->delete();
        $user->delete();
        $role->delete();
    }
}
