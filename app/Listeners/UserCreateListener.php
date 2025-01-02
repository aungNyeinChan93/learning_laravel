<?php

namespace App\Listeners;

use App\Events\UserCreateEvent;
use App\Jobs\UserCreateJob;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

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
        UserCreateJob::dispatch($event->user);
    }
}
