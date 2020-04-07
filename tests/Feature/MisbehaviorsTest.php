<?php

namespace Tests\Feature;


use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

use app\Models\User;
use app\Models\Misbehavior;

class MisbehaviorsTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testUser()
    {
        $user =User::find(1);
        $misbehaviors = Misbehavior::find($user->misbehaviors_id);
        
        $this ->assertEquals($user ->misbehaviors->description, $misbehaviors->description);
    }
    // public function testType()
    // {
    //     $user =User::find(1);
    //     $misbehaviors = Misbehavior::find($user->misbehaviors_id);
        
    //     $this ->assertEquals($user ->misbehaviors->name, $misbehaviors->name);
    // }
    // public function testTSessionTimetable()
    // {
    //     $user =User::find(1);
    //     $misbehaviors = Misbehavior::find($user->misbehaviors_id);
        
    //     $this ->assertEquals($user ->misbehaviors->name, $misbehaviors->name);
    // }
}
