<?php

namespace App\Listeners;

use App\Events\NewPostCreated;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Notifications\NewPost;
use Notification;

class Savetodatebase
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
     * @param  NewPostCreated  $event
     * @return void
     */
    public function handle(NewPostCreated $event)
    {
        Notification::route('mail', 'bibek@gmail.com')->notify(new NewPost());
    }
}
