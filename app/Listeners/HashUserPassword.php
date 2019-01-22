<?php

namespace App\Listeners;

use App\Events\UserPasswordCreating;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Hash;

class HashUserPassword
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
     * @param  UserPasswordCreating  $event
     * @return void
     */
    public function handle(UserPasswordCreating $event)
    {
        $event->user->password = Hash::make($event->user->password);
    }
}
