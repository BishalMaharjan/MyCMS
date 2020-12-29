<?php

namespace App\Listeners;

use App\Events\NewPostCreated;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Mail;
use Notification;
use Illuminate\Mail\Mailable;
use App\Mail\NewPost;

class MailtoAdmin
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
        Mail::to('sabin.maharjan@auxfin.com')->send(new NewPost);
        // Notification::route('mail', 'sabin.maharjan@auxfin.com')->notify(new NewPost());
    }
}
