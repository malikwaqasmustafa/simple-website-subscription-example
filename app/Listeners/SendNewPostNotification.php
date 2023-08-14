<?php

namespace App\Listeners;

use App\Events\NewPostCreated;
use App\Notifications\NewPostNotification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class SendNewPostNotification
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(NewPostCreated $event)
    {
        $subscribers = $event->website->subscribers;

        foreach ($subscribers as $subscriber) {
            Mail::to($subscriber->email)->send(new NewPostNotification($event->post));
        }
    }
}
