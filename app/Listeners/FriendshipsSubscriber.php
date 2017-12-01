<?php

namespace App\Listeners;

use App\Notifications\FriendRequestAccepted;
use App\Notifications\NewFriendRequest;
use App\User;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class FriendshipsSubscriber implements ShouldQueue
{
    use InteractsWithQueue;

    public function onFriendRequestSent(User $sender, User $recipient)
    {

        $recipient->notify(new NewFriendRequest($sender));

        // TODO

        // $notifications = $recipient->notifications;

        // $notifications->each(function ($notification) use ($sender) {
        //     if ($notification->data['message'] == "$sender->name sent you a friend request") {
        //         $GLOBALS['exist'] = true;
        //         return false;
        //     }
        // });
        // if (!isset($GLOBALS['exist'])) {
        //     $recipient->notify(new NewFriendRequest($sender));
        // }
    }

    public function onFriendRequestAccepted(User $recipient, User $sender)
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
