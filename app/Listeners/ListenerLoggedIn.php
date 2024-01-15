<?php

namespace App\Listeners;

use App\Events\UserLoggedIn;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Models\User;

class ListenerLoggedIn
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Cuando el usuario se logea salta esta funcion añadida en AuthenticicatedSessionController y RedirectIfAuthenticated
     */
    public function handle(UserLoggedIn $event): void
    {
        $event->user->ultimaConexion = now();
        $event->user->update();
    }
}
