<?php

namespace Tests\Feature;

use App\User;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UsersTest extends TestCase
{
    use RefreshDatabase;

    protected $user;

    protected function setUp(): void
    {
        parent::setUp();
        $this->user = factory(User::class)->create();
    }

    /** @test */
    public function an_unauthenticated_user_is_redirected_to_login()
    {
        $response = $this->post('/api/users', $this->data());
        $response->assertRedirect('/login');
        $this->assertCount(0, User::all());
    }
    
    /** @test */
    public function a_user_can_be_added() 
    {
        $this->post('/api/users', $this->data());
        $this->assertCount(2, User::all());
    }

    /** @test */
    public function fields_are_required()
    {
        $fields = collect(['name', 'email'])
            ->each(function($field) {
                $user = array_merge($this->data(), [$field => '']);
                $response = $this->post('/api/users', $user);
                $response->assertSessionHasErrors($field);
                $this->assertCount(1, User::all());
            });
    }

    /** @test */
    public function email_must_be_valid()
    {
        $user = array_merge($this->data(), ['email' => 'NOT AN EMAIL']);
        $response = $this->post('/api/users', $user);
        $response->assertSessionHasErrors('email');
        $this->assertCount(1, User::all());
    }

    /** @test */
    public function a_user_can_be_retrieved()
    {        
        $user = factory(User::class)->create();
        $response = $this->get('/api/users/' . $user->id);
        $response->assertJson([
            'name' => $user->name,
            'email' => $user->email
        ]);
    }

    /** @test */
    public function a_user_can_be_patched()
    {        
        $user = factory(User::class)->create();
        $response = $this->patch('/api/users/' . $user->id, $this->data());

        $user = $user->fresh();

        $this->assertEquals('Test Name', $user->name);
        $this->assertEquals('test@email.com', $user->email);
    }

    /** @test */
    public function a_user_can_be_deleted()
    {
        $user = factory(User::class)->create();

        $this->delete('/api/users/' . $user->id);

        $this->assertCount(1, User::all());
    }

    private function data()
    {
        return [
            'name' => 'Test Name',
            'email' => 'test@email.com',
            'api_token' => $this->user->api_token,
        ];
    }
}
