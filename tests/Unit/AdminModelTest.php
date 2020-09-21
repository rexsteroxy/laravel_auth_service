<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Admin;
use App\User;

class AdminModelTest extends TestCase
{
    
   
    public function testCreateAdmin()
    {
         //Given we have admin in the database
        $admin = new Admin;

         //Given we have users in the database
        $user = new User;
 
        //When admin visits the dashboard
        $response = $this->get('/admin'); // your route to display all users
 
        //He should be able to see all registered users
        $response->assertSee($user->name);

    }


   
}
