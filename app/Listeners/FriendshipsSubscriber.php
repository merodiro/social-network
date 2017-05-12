<?php

namespace App\Listeners;

use App\Notifications\FriendRequestAccepted;
use App\Notifications\NewFriendRequest;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class FriendshipsSubscriber implements ShouldQueue
{
    use InteractsWithQueue;

    public function onFriendRequestSent($sender, $recipient)
    {
        $recipient->notify(new NewFriendRequest($sender));
    }

    public function onFriendRequestAccepted($recipient, $sender)
    {
        $sender->notify(new FriendRequestAccepted($recipient));
    }

    public function subscribe($events)
    {
        $events->listen(
            'friendrequest.sent',
            'App\Listeners\FriendshipsSubscriber@onFriendRequestSent'
        );

        $events->listen(
            'friendrequest.accepted',
            'App\Listeners\FriendshipsSubscriber@onFriendRequestAccepted'
        );
    }
}
