<?php

namespace Tests\Unit;

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\User;
use App\Models\Thread;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class ThreadTest extends TestCase
{
    use DatabaseMigrations;
    /**
     * A basic unit test example.
     *
     * @return void
     */

    public function setUp():void
    {
        parent::setUp();
        $this->thread = Thread::factory()->create();
    }

    public function test_a_thread_has_reply()
    {
        $this->assertInstanceOf('\Illuminate\Database\Eloquent\Collection', $this->thread->replies);
    }

    public function test_a_thread_has_owener()
    {
        $user = User::factory()->create();
        $thread = Thread::factory(['user_id' => $user->id])->create();
        $this->assertInstanceOf('\App\Models\User', $thread->creator);
    }

    public function test_thread_can_add_a_reply()
    {
        $this->thread->addReply([
            'body' => 'Test',
            'user_id' => 2
        ]);

        $this->assertCount(1, $this->thread->replies);
    }
}
