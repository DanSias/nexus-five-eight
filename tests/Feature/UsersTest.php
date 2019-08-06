<?php

namespace Tests\Feature;

use App\User;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UsersTest extends TestCase
{
    use RefreshDatabase;
    
    /** @test */
    public function a_user_can_be_added() 
    {
        $this->withoutExceptionHandling();

        $user = [
            'name' => 'Test Name',
            'email' => 'Test Email',
        ];
        
        $this->post('/api/users', $user);

        $this->assertCount(1, User::all());
    }
}
