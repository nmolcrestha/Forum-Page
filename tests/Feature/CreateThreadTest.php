<?php

namespace Tests\Feature;

use App\Models\Thread;
use Tests\TestCase;
use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class CreateThreadTest extends TestCase
{
    use DatabaseMigrations;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_an_authemticated_user_can_create_a_thread()
    {
        $user = User::factory()->create();
        $this->actingAs($user);
        $thread = Thread::factory()->create();
        $this->post('/threads', $thread->toArray());
        $this->get('/threads/'.$thread->id)
            ->assertSee($thread->title)
            ->assertSee($thread->body);
    }
     public function test_guests_cannot_create_threads()
     {
        $this->expectException('Illuminate\Auth\AuthenticationException');
        $thread = Thread::factory()->create();
        $this->post('/threads', $thread->toArray());
     }
}
