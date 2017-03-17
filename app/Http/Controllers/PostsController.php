<?php

namespace App\Http\Controllers;
use Auth;
use App\Post;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    public function store(Request $request)
    {
    	$post = Auth::user()->posts()->create($request->all());

    	return Post::find($post->id);
    }

    public function feed()
    {
    	$friends = Auth::user()->friends_ids();

        $friends = $friends->merge(Auth::id());

        $feed = Post::whereIn('user_id', $friends)
            ->with('user')
            ->get();
    	return $feed;
    }
}
