<?php

namespace App\Listeners;

use App\Events\UserCreatedEvents;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
Use App\RolePivots;

class SetDefaultRoleListener
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
     * @param  UserCreatedEvents  $event
     * @return void
     */
    public function handle(UserCreatedEvents $event)
    {
        dd($event->user);
        $role = RolePivots::where('role_id', '3')->firstOrFail();
        $event->user->rolePivots()->attach($role->id);
    }
}
