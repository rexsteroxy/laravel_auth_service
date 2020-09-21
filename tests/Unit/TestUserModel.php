<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\User;

class TestUserModel extends TestCase
{
    
  


    public function testCreateUser()
    {
         //Given we have users in the database
        $user = new User;
    
        //When user hits create endpoint
        $this->post('register',$user->toArray()); // your route to create user
    
        //It gets stored in the database
        $this->assertEquals(User::all()->count(),User::all()->count());

    }


   
}
