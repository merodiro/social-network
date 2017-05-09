<?php

namespace App\Http\Controllers;

use App\User;
use Auth;

class FriendshipsController extends Controller
{
    public function check(User $user)
    {
        $friendshipStatus = Auth::user()
            ->checkFriendship($user);
        return ['status' => $friendshipStatus];
    }

    public function addFriend(User $user)
    {
        $res = Auth::user()
            ->addFriend($user);
        return $res;
    }

    public function acceptFriend(User $user)
    {
        $res = Auth::user()
            ->acceptFriend($user);
        return $res;
    }

    public function deleteFriend(User $user)
    {
        $res = Auth::user()
            ->deleteFriend($user);
        return $res;
    }
}
