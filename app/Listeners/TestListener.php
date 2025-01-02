<?php

namespace App\Listeners;

use App\Mail\TestMail;
use App\Events\TestEvent;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class TestListener
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
    public function handle(TestEvent $event): void
    {
        logger('TestListener handle');
        Mail::to($event->user->email)->send(new TestMail($event->user));
    }
}
