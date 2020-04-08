<?php

namespace Tests\Feature;

use App\Models\Attachment;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use App\Models\Message;
use App\Models\Role;

class AttachmentTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testAttachmentableMessage()
    {
        $role = Role::create([
            'name' => 'Test',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        $user = User::create([
            'first_name' => 'Pruebas',
            'last_name' => 'Tests',
            'email' => 'pruebas@campusaula.com',
            'password' => 'pruebas',
            'created_at' => now(),
            'updated_at' => now(),
            'timetable_id' => '1',
            'role_id' => $role->id
        ]);

        $message = Message::create([
            'title' => 'Pruebas',
            'text' => 'Tests',
            'created_at' => now(),
            'user_id' => $user->id
        ]);

        $attachment = Attachment::create([
            'name' => 'Pruebas1',
            'attachmentable_type' => Message::class,
            'attachmentable_id' => $message->id
        ]);

        $this->assertEquals($attachment->attachmentable->id, $message->id);
        $this->assertInstanceOf(Message::class, $attachment->attachmentable);

        $attachment->delete();
        $message->delete();
        $user->delete();
        $role->delete();
    }
}
