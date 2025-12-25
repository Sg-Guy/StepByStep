<?php

namespace App\Jobs;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Support\Facades\Mail;

class SendReminderMail implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new job instance.
     */
   public function __construct(public $task) {}

    public function handle()
    {
        Mail::to($this->task->user->email)
            ->send(new \App\Mail\TaskReminderMail($this->task));
    }

}
