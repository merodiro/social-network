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

        $post->load('user', 'likes');

        return $post;
    }

    public function feed()
    {
        $friends = Auth::user()->friends()->pluck('id');

        $users = $friends->merge(Auth::id());

        $feed = Post::whereIn('user_id', $users)
            ->with('user')
            ->with('likes')
            ->get();

        return $feed;
    }
}
