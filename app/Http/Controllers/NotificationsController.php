<?php

namespace App\Http\Controllers;

use Auth;

class NotificationsController extends Controller
{
    public function notifications()
    {
        Auth::user()->unreadnotifications->markAsRead();

        return view('nots')->with('nots', Auth::user()->notifications);
    }

    public function unread()
    {
        return Auth::user()->unreadNotifications;
    }
}
