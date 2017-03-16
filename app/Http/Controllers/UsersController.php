<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UsersController extends Controller
{
	public function auth(Request $request)
	{
		return $request->user();
	}

	public function search(Request $request)
	{
		return User::search($request->get('query'))->take(3)->get();
	}
}
