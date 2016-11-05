<?php

namespace App\Listeners;

use Illuminate\Auth\Events;
use Illuminate\Auth\Events\Registered;

class SetDefaultRole
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
     * @param  IlluminateAuthEventsRegistered  $event
     * @return void
     */
    public function handle(Registered $event)
    {
        $role = \App\Role::find(2);
        $event->user->attachRole($role);
    }
}
