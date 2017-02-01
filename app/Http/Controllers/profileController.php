<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Auth;
use Session;

class profileController extends Controller
{
    public function index($slug)
    {
    	$user = User::where('slug', $slug)->first();
        $posts = $user->posts()->orderBy('id', 'desc')->get();
        $friends = $user->friends();
    	return view('profiles.profile')
            ->with('posts', $posts)
            ->with('friends', $friends)
    		->with('user', $user);
    }

    public function edit()
    {
    	return view('profiles.edit')
    		->with('info', Auth::user()->profile);
    }

    public function update(Request $request)
    {
    	$this->validate($request, [
    			'location' => 'required',
    			'about' => 'required|max:255'
    		]);

    	Auth::user()->profile()->update([
    			'location' => $request->location,
    			'about' => $request->about
    		]);

    	if ($request->hasFile('avatar')) {
    		Auth::user()->update([
    				'avatar' => $request->avatar->store('public/avatars')
    			]);
    	}
    	Session::flash('success', 'profile updated');

    	return redirect()->back();
    }
}
