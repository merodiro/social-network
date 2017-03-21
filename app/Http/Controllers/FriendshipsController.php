<?php

namespace App\Http\Controllers;

use App\Notifications\FriendRequestAccepted;
use App\Notifications\NewFriendRequest;
use App\User;
use Auth;

class FriendshipsController extends Controller
{
    public function check($id)
    {
        $friendshipStatus = Auth::user()->checkFriendship($id);

        return ['status' => $friendshipStatus];
    }

    public function addFriend($id)
    {
        $res = Auth::user()->addFriend($id);

        User::find($id)->notify(new NewFriendRequest(Auth::user()));

        return $res;
    }

    public function acceptFriend($id)
    {
        $res = Auth::user()->acceptFriend($id);

        User::find($id)->notify(new FriendRequestAccepted(Auth::user()));

        return $res;
    }

    public function deleteFriend($id)
    {
        $res = Auth::user()->deleteFriend($id);

        return $res;
    }
}
