<?php

namespace App\Http\Controllers;

use Auth;
use App\User;

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

        if ($res) {
            return response('', 201);
        }

        return response('', 500);
    }

    public function acceptFriend(User $user)
    {
        $res = Auth::user()
            ->acceptFriend($user);

        if ($res) {
            return response('', 201);
        }

        return response('', 500);
    }

    public function deleteFriend(User $user)
    {
        $res = Auth::user()
            ->deleteFriend($user);

        if ($res) {
            return response('', 201);
        }

        return response('', 500);
    }
}
