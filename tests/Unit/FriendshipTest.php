<?php

namespace Tests\Unit;

use App\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class FriendshipTest extends TestCase
{
    use DatabaseTransactions;

    /** @test */
    public function user_can_send_a_friend_request()
    {
        $sender = factory('App\User')->create();
        $recipient  = factory('App\User')->create();

        $sender->addFriend($recipient);

        $this->assertCount(1, $recipient->friendRequestFrom());
        $this->assertCount(1, $sender->friendRequestTo());
    }

    /** @test */
    public function user_can_not_send_a_friend_request_if_frienship_is_pending()
    {
        $sender = factory('App\User')->create();
        $recipient  = factory('App\User')->create();

        $sender->addFriend($recipient);
        $sender->addFriend($recipient);
        $sender->addFriend($recipient);
        
        $this->assertCount(1, $recipient->friendRequestFrom());        
    }

    /** @test */
    public function user_can_send_a_friend_request_if_frienship_is_denied()
    {
        $sender = factory('App\User')->create();
        $recipient  = factory('App\User')->create();

        $sender->addFriend($recipient);

        $recipient->deleteFriend($sender);
        $this->assertCount(0, $recipient->friendRequestFrom());

        $sender->addFriend($recipient);
        $this->assertCount(1, $recipient->friendRequestFrom());        
    }

    /** @test */
    public function user_can_remove_a_friend_request()
    {
        $sender = factory('App\User')->create();
        $recipient  = factory('App\User')->create();        
        
        $sender->addFriend($recipient);
        $sender->deleteFriend($recipient);
        $this->assertCount(0, $recipient->friendRequestFrom());

        $sender->addFriend($recipient);
        $this->assertCount(1, $recipient->friendRequestFrom());

        $recipient->acceptfriend($sender);
        $this->assertEquals('friends', $recipient->checkFriendship($sender));

        $sender->deleteFriend($recipient);
        $this->assertEquals('not friends', $recipient->checkFriendship($sender));
    }

    /** @test */
    public function change_statue_to_pending_and_waiting()
    {
        $sender = factory('App\User')->create();
        $recipient = factory('App\User')->create();

        $sender->addFriend($recipient);

        $this->assertEquals('pending', $recipient->checkFriendship($sender));
        $this->assertEquals('waiting', $sender->checkFriendship($recipient));
    }

    /** @test */
    public function user_is_friend_with_another_user_if_accepts_a_friend_request()
    {
        $sender = factory('App\User')->create();
        $recipient = factory('App\User')->create();

        $sender->addFriend($recipient);
        $recipient->acceptFriend($sender);

        $this->assertEquals('friends', $recipient->checkFriendship($sender));
        $this->assertEquals('friends', $sender->checkFriendship($recipient));
    }

     /** @test */
    public function user_has_not_friend_request_from_if_he_accepted_the_friend_request()
    {
        $sender = factory('App\User')->create();
        $recipient = factory('App\User')->create();

        $sender->addFriend($recipient);
        $recipient->acceptFriend($sender);

        $this->assertCount(0, $recipient->friendRequestFrom());
        $this->assertCount(0, $sender->friendRequestTo());
    }

    /** @test */
    public function user_cannot_accept_his_own_friend_request()
    {
        $sender = factory('App\User')->create();
        $recipient = factory('App\User')->create();
        $sender->addFriend($recipient);
        $sender->acceptFriend($recipient);

        $this->assertEquals('pending', $recipient->checkFriendship($sender));
    }

     /** @test */
    public function it_returns_accepted_friendships()
    {
        $sender = factory('App\User')->create();
        $recipients = factory('App\User', 3)->create();

        foreach ($recipients as $recipient) {
            $sender->addFriend($recipient);
        }

        $recipients[0]->acceptFriend($sender);
        $recipients[1]->acceptFriend($sender);
        $recipients[2]->deleteFriend($sender);

        $this->assertCount(2 , $sender->friends());
    }

    /** @test */
    public function it_returns_only_accepted_user_friendships()
    {
        $sender = factory('App\User')->create();
        $recipients = factory('App\User', 4)->create();

        foreach ($recipients as $recipient) {
            $sender->addFriend($recipient);
        }

        $recipients[0]->acceptFriend($sender);
        $recipients[1]->acceptFriend($sender);
        $recipients[2]->deleteFriend($sender);

        $this->assertCount(2 , $sender->friends());

        $this->assertCount(1 , $recipients[0]->friends());
        $this->assertCount(1 , $recipients[1]->friends());
        $this->assertCount(0 , $recipients[2]->friends());
        $this->assertCount(0 , $recipients[3]->friends());

        $this->containsOnlyInstancesOf(\App\User::class, $sender->friends());
    }

     /** @test */
    public function it_returns_friend_requests_to()
    {
        $sender = factory('App\User')->create();
        $recipients = factory('App\User', 3)->create();

        foreach ($recipients as $recipient) {
            $sender->addFriend($recipient);
        }

        $recipients[0]->acceptFriend($sender);

        $this->assertCount(2 , $sender->friendRequestTo());
        $this->containsOnlyInstancesOf(\App\User::class, $sender->friendRequestTo());
    }

    public function it_returns_friend_requests_from()
    {
        $recipient = factory('App\User')->create();
        $senders = factory('App\User', 3)->create();

        foreach ($senders as $sender) {
            $sender->addFriend($sender);
        }

        $recipient->acceptFriend($senders[0]);

        $this->assertCount(2 , $sender->friendRequestFrom());
        $this->containsOnlyInstancesOf(\App\User::class, $sender->friendRequestFrom());
    }    
}