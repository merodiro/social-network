<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class HomeController extends Controller
{

    public function index()
    {
        return view('welcome');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function home()
    {
        return view('home');
    }


    public function notifications()
    {
        Auth::user()->unreadnotifications->markAsRead();
        return view('nots')->with('nots', Auth::user()->notifications);
    }

    public function unread_notifications()
    {
        return Auth::user()->unreadNotifications;
    }
}
