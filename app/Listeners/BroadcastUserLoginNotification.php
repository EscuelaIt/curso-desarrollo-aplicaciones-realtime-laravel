<?php

namespace App\Listeners;

use App\Events\UserSessionChanged;

class BroadcastUserLoginNotification
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

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
        broadcast(new UserSessionChanged("{$event->user->name} is online", 'success'));
    }
}
