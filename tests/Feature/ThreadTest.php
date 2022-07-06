<?php

namespace Tests\Feature;

use App\Models\Reply;
use App\Models\Thread;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ThreadTest extends TestCase
{
    use DatabaseMigrations;

    public function setUp():void
    {
        parent::setUp();
        
        $this->thread = Thread::factory()->create();
    }
    /**
     * A basic test example.
     *
     * @return void
     */
    /** @test */
    public function a_user_can_browse_threads_page()
    {
        $response = $this->get('/threads')
                    ->assertStatus(200);
    }

    /** @test */
    public function a_user_can_view_all_threads()
    {
        $response = $this->get('/threads')
                    ->assertSee($this->thread->title);
    }

    /** @test */
    public function a_user_can_view_a_thread()
    {
        $response = $this->get('/threads/'.$this->thread->id)
                    ->assertSee($this->thread->title);
    }

    /** @test */
    public function a_user_can_read_reply_associated_with_thread()
    {
        $reply = Reply::factory()->create([
            'thread_id' => $this->thread->id
        ]);
        $this->get('/threads/'.$this->thread->id)
            ->assertSee($reply->body);
    }
}
