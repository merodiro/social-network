<?php

namespace App\Http\Controllers;

use App\Notifications\FriendRequestAccepted;
use App\Notifications\NewFriendRequest;
use App\User;
use Auth;
use Illuminate\Http\Request;

class FriendshipsController extends Controller
{
    public function check($id)
    {
    	if (Auth::user()->is_friends_with($id)) {
    		return ["status" => "friends"];
    	}

    	if (Auth::user()->has_pending_friend_request_from($id)) {
    		return ["status" => "pending"];
    	}

    	if (Auth::user()->has_pending_friend_request_sent_to($id)) {
    		return ["status" => "waiting"];
    	}

    	return ["status" => 0];
    }

    public function add_friend($id)
    {
    	$res = Auth::user()->add_friend($id);

    	User::find($id)->notify(new NewFriendRequest(Auth::user()));

    	return $res;
    }

    public function accept_friend($id)
    {
    	$res = Auth::user()->accept_friend($id);

    	User::find($id)->notify(new FriendRequestAccepted(Auth::user()));

    	return $res;
    }

    public function delete_friend($id)
    {
        $res = Auth::user()->delete_friend($id);

        return $res;
    }

}
