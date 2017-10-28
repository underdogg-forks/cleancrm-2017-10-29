<?php
namespace App\Listeners;

use Illuminate\Auth\Events\Registered;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SetupAccountActivationToken
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
     * @param  IlluminateAuthEventsRegistered $event
     * @return void
     */
    public function handle(Registered $event)
    {
        \App\UserToken::create([
          'user_id' => $event->user->id,
          'token' => str_random(64),
          'status' => 0
        ]);
    }
}
