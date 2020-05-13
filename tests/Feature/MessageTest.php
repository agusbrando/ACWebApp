<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use App\Models\Message;
use App\Models\Role;
use App\Models\Attachment;

class MessageTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testExample()
    {
        $user = User::create([
            'first_name' => 'Pruebas',
            'last_name' => 'Tests',
            'email' => 'pruebas@campusaula.com',
            'password' => 'pruebas',
            'created_at' => now(),
            'updated_at' => now(),
            'timetable_id' => '1',
            'role_id' => '1'
        ]);


        $message = Message::create([
            'title' => 'Pruebas',
            'text' => 'Tests',
            'created_at' => now(),
            'user_id' => $user->id
        ]);

        $this->assertEquals($message->user->id, $user->id);

        $message->delete();
        $user->delete();
    }

    public function testAttachments()
    {
        $role = Role::create([
            'name' => 'Test',
            'created_at' => now(),
            'updated_at' => now()
        ]);
            //falta timetable
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

        $attachment2 = Attachment::create([
            'name' => 'Pruebas2',
            'attachmentable_type' => Message::class,
            'attachmentable_id' => $message->id
        ]);
        $this->assertCount(2,$message->attachments);
        $this->assertEquals($message->attachments[0]->id, $attachment->id);
        $this->assertEquals($message->attachments[1]->id, $attachment2->id);
        
        $attachment2->delete();
        $attachment->delete();
        $message->delete();
        $user->delete();
        $role->delete();
        

    }
}
