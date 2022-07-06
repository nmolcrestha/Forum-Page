<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use App\Models\Reply;
use App\Models\Thread;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class ParticipateInFormTest extends TestCase
{
    use DatabaseMigrations;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_an_authenticated_user_may_participate_in_forum_threads()
    {
        $user = User::factory()->create();
        $this->be($user);
        $thread = Thread::factory()->create();
        $reply = Reply::factory()->create();
        // dd($reply);
        $this->post('/threads/'.$thread->id.'/replies',$reply->toArray());
        $this->get('/threads/'.$thread->id)
                ->assertSee($reply->body);
               
        
    }
}
