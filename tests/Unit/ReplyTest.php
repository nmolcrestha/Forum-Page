<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\User;
use App\Models\Reply;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class ReplyTest extends TestCase
{
   use DatabaseMigrations;

   /** @test */
   function reply_has_an_owner()
   {
      $user = User::factory()->create();
      $reply = Reply::factory(['user_id'=>$user->id])->create();
      $this->assertInstanceOf('\App\Models\User', $reply->owner);
   }
}
