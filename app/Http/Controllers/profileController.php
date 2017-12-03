<?php

namespace App\Http\Controllers;

use App\User;
use Auth;
use Illuminate\Http\Request;
use Session;

class profileController extends Controller
{
    public function index(User $user)
    {
        $user->load(['posts' => function ($query) {
            $query->orderBy('id', 'desc')->limit(3);
        }]);

        $friends = $user->friends();

        return view('profiles.profile')
            ->with('user', $user)
            ->with('friends', $friends);
    }

    public function edit()
    {
        return view('profiles.edit')
            ->with('info', Auth::user()->profile);
    }

    public function update(Request $request)
    {
        $this->validate($request, [
                'about'    => 'max:255',
            ]);

        Auth::user()->profile()->update([
                'location' => $request->location,
                'about'    => $request->about,
            ]);

        if ($request->hasFile('avatar')) {
            Auth::user()->update([
                    'avatar' => $request->avatar->store('public/avatars'),
                ]);
        }
        Session::flash('success', 'profile updated');

        return redirect()->back();
    }
}
