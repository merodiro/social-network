<?php

namespace App\Listeners;

use App\Events\UserCreated;

class CreateProfile
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function handle(UserCreated $event)
    {
        $event->user->profile()->create([]);
    }
}
