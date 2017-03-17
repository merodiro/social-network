<?php 

namespace App\Traits;

use App\Friendship;
use App\User;

trait Friendable
{
	public function add_friend($user_requested_id)
	{
		if ($this->id === $user_requested_id) {
			\Log::info('same user');
			return 0;
		}

		if ($this->has_pending_friend_request_sent_to($user_requested_id)) {
			\Log::info('already friends');
			return "already sent a friend request";
		}

		if ($this->has_pending_friend_request_from($user_requested_id)) {
			\Log::info('accept friend');
			return $this->accept_friend($user_requested_id);
		}

		if ($this->is_friends_with($user_requested_id)) {
			\Log::info('already friend');
			return "already friends";
		}
		\Log::info('send friendship');

		$friendship = Friendship::create([
				'requester' => $this->id,
				'user_requested' => $user_requested_id
			]);

		if ($friendship) {
			return 1;
		}

		return 0;
	}


	public function accept_friend($requester)
	{
		if (!$this->has_pending_friend_request_from($requester)) {
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

	public function delete_friend($user_id)
	{
		Friendship::where('requester', $this->id)
			->where('user_requested', $user_id)
			->orWhere('requester', $user_id)
			->delete();
		return 1;
	}

	public function friends_ids()
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
		$friendsIds = $this->friends_ids();
		$friends = User::whereIn('id', $friendsIds)->get();

		return $friends;
	}

	public function pending_friend_requests_ids()
	{
		$Ids = Friendship::where('status', 0)
			->Where('user_requested', $this->id)
			->get(['requester']);
		$Ids = $Ids->toArray();

		$Ids = collect($Ids)->flatten()->unique();

		return $Ids;
	}

	public function pending_friend_requests()
	{
		$Ids = $this->pending_friend_requests_ids();
		$friendships = User::whereIn('id', $Ids)->get();

		return $friendships;
	}

	public function pending_friend_requests_sent_ids()
	{
		$Ids = Friendship::where('status', 0)
			->Where('requester', $this->id)
			->get(['user_requested']);
		$Ids = $Ids->toArray();

		$Ids = collect($Ids)->flatten()->unique();

		return $Ids;
	}

	public function pending_friend_requests_sent()
	{
		$Ids = $this->friends_ids();
		$friendships = User::whereIn('id', $Ids)->get();

		return $friendships;
	}

	public function is_friends_with($user_id)
	{
		return $this->friends_ids()
			->contains($user_id);
	}

	public function has_pending_friend_request_from($user_id)
	{
		return $this->pending_friend_requests_ids()
			->contains($user_id);
		
	}

	public function has_pending_friend_request_sent_to($user_id)
	{
		return $this->pending_friend_requests_sent_ids()
			->contains($user_id);
	}

}