<?php

namespace Tests\Feature;

use Tests\TestCase;
use MailThief\Testing\InteractsWithMail;
use Illuminate\Foundation\Testing\RefreshDatabase;

class MailTest extends TestCase
{
    use RefreshDatabase,
        InteractsWithMail;

    /** @test */
    public function it_sends_an_email_when_user_adds_friend()
    {
        $sender = factory('App\User')->create();
        $recipient = factory('App\User')->create();
        $sender->addFriend($recipient);

        $this->seeMessageFor($recipient->email);
        $this->seeMessageWithSubject('New Friend Request');
        $this->assertTrue($this->lastMessage()->contains($sender->name));
    }

    /** @test */
    public function it_sends_an_email_when_user_accepts_friend()
    {
        $sender = factory('App\User')->create();
        $recipient = factory('App\User')->create();
        $sender->addFriend($recipient);
        $recipient->acceptFriend($sender);

        $this->seeMessageFor($sender->email);
        $this->seeMessageWithSubject('Friend Request Accepted');
        $this->assertTrue($this->lastMessage()->contains($recipient->name));
    }
}
