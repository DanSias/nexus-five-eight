<?php

namespace Tests\Feature;

use App\User;
use App\Note;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class NotesTest extends TestCase
{
    use RefreshDatabase;

    protected $user;

    protected function setUp(): void
    {
        parent::setUp();
        $this->user = factory(User::class)->create();
    }

    /** @test */
    public function unauthenticated_users_cannot_submit_notes()
    {
        $response = $this->post('/api/notes', array_merge($this->data(), ['api_token' => '']));
        $response->assertRedirect('/login');
        $this->assertCount(0, Note::all());
    }

    /** @test */
    public function notes_fields_are_required()
    {        
        $fields = collect(['program_id', 'user_id', 'type', 'program', 'channel', 'content'])
            ->each(function($field) {
                $note = array_merge($this->data(), [$field => '']);
                $response = $this->post('/api/notes', $note);
                $response->assertSessionHasErrors($field);
                $this->assertCount(0, Note::all());
            });
    }

    private function data()
    {
        return [
            'program_id' => '1',
            'user_id' => '1',
            'type' => 'channel',
            'program' => 'ABC-XYZ',
            'channel' => 'SEO',
            'content' => 'Lorem Ipsum Dolor Sit Amet.',
            'api_token' => $this->user->api_token,
        ];
    }
}
