<?php

namespace App\Listeners;

use App\Jobs\UserCreateJob;
use App\Events\UserCreateEvent;
use App\Notifications\UserCreateNotification;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Notification;

class UserCreateListener
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
    public function handle(UserCreateEvent $event): void
    {
        logger('UserCreateListener runned');


        UserCreateJob::dispatch($event->user); // need to run queue:worker to process this job
    }
}
