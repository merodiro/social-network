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
}
