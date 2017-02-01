<?php

namespace App\Http\Controllers;
use App\Post;
use Auth;
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
    	$friends = Auth::user()->friends();

    	$feed = array();

    	foreach ($friends as $friend) {
    		foreach ($friend->posts as $post) {

    			array_push($feed, $post);

    		}
    	}

        foreach (Auth::user()->posts as $post) {
            array_push($feed, $post);
        }

        usort($feed, function ($p1, $p2)
        {
            return $p1->id > $p2->id;
        });

    	return $feed;
    }
}
