<?php
namespace App\Listeners;

use Illuminate\Auth\Events\Registered;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

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
     * @param  IlluminateAuthEventsRegistered $event
     * @return void
     */
    public function handle(Registered $event)
    {
        $event->user->notify(new \App\Notifications\AccountActivation($event->user));
    }
}
