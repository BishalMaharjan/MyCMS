<?php

namespace App\Events;

use Illuminate\Queue\SerializesModels;
use App\User;

class UserCreatedEvents
{
    use SerializesModels;

    public $user;

    /**
     * Create a new event instance.
     *
     * @param  \App\User  $user
     * @return void
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }

  
}
