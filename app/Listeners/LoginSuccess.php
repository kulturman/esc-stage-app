<?php

namespace App\Listeners;

use Illuminate\Auth\Events\Login;
use App\Util\Util;

class LoginSuccess
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
     * @param  IlluminateAuthEventsLogin  $event
     * @return void
     */
    public function handle(Login $login)
    {
        Util::setStatus($login->user);
    }
}
