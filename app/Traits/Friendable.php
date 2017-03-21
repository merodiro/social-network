<?php

namespace App\Traits;

use App\Friendship;
use App\User;

trait Friendable
{
	public function addFriend($userId)
	{
		$friendshipStatus = $this->checkFriendship($userId);

		if ($friendshipStatus == 'not friends') {
			return $friendship = Friendship::create([
				'requester' => $this->id,
				'user_requested' => $userId
			]);
		} else {
			return 0;
		}
	}

	public function checkFriendship($userId)
	{
		if ($this->id == $userId) {
			return "same user";
		}

		$friendship = Friendship::where('requester', $this->id)
			->where('user_requested', $userId)
			->orWhere('requester', $userId)
			->where('user_requested', $this->id)
			->first();

		if (!$friendship) {
			return "not friends";
		} elseif ($friendship->status == 1) {
			return "friends";
		} elseif ($friendship->requester == $this->id) {
			return "waiting";
		} elseif ($friendship->user_requested == $this->id) {
			return "pending";
		}
	}


	public function acceptFriend($requester)
	{
		if (!$this->hasPendingFriendRequestFrom($requester)) {
			return 0;
		}

		$friendship = Friendship::where('requester', $requester)
			->where('user_requested', $this->id)
			->first();

		if ($friendship) {
			$friendship->update([
					'status' => 1
				]);
			return 1;
		}

		return 0;
	}

	public function deleteFriend($userId)
	{
		Friendship::where('requester', $this->id)
			->where('user_requested', $userId)
			->orWhere('requester', $userId)
			->delete();
		return 1;
	}

	public function friendsIds()
	{
		$friendsIds = Friendship::where('status', 1)
			->where('requester', $this->id)
			->orWhere('user_requested', $this->id)
			->where('status', 1)
			->get(['requester', 'user_requested']);
		$friendsIds = $friendsIds->toArray();

		$friendsIds = collect($friendsIds)->flatten()->unique();

		$friendsIds = $friendsIds->filter(function ($value, $key) {
		    return $value != $this->id;
		});
		return $friendsIds;
	}

	public function friends()
	{
		$friendsIds = $this->friendsIds();
		$friends = User::whereIn('id', $friendsIds)->get();

		return $friends;
	}

	public function pendingFriendRequestsIds()
	{
		$Ids = Friendship::where('status', 0)
			->Where('user_requested', $this->id)
			->get(['requester']);
		$Ids = $Ids->toArray();

		$Ids = collect($Ids)->flatten()->unique();

		return $Ids;
	}

	public function pendingFriendRequests()
	{
		$Ids = $this->pendingFriendRequestsIds();
		$friendships = User::whereIn('id', $Ids)->get();

		return $friendships;
	}

	public function pendingFriendRequestsSentIds()
	{
		$Ids = Friendship::where('status', 0)
			->Where('requester', $this->id)
			->get(['user_requested']);
		$Ids = $Ids->toArray();

		$Ids = collect($Ids)->flatten()->unique();

		return $Ids;
	}

	public function pendingFriendRequestsSent()
	{
		$Ids = $this->friendsIds();
		$friendships = User::whereIn('id', $Ids)->get();

		return $friendships;
	}

}
