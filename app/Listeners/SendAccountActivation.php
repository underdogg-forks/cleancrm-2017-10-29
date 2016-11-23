<?php

namespace Splate\Listeners;

use Illuminate\Auth\Events\Registered;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendAccountActivation
{

    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        
    }

    /**
     * Handle the event.
     *
     * @param  IlluminateAuthEventsRegistered  $event
     * @return void
     */
    public function handle(Registered $event)
    {
        $event->user->notify(new \Splate\Notifications\AccountActivation($event->user));
    }
}
