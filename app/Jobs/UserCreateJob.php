<?php

namespace App\Jobs;

use App\Models\User;
use App\Mail\UserCreateMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Notification;
use App\Notifications\UserCreateNotification;

class UserCreateJob implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new job instance.
     */
    public function __construct(public User $user)
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        Mail::to($this->user->email)->send(new UserCreateMail($this->user));

        Notification::send($this->user,new UserCreateNotification($this->user));

    }
}
