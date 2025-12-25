<?php
namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Task;
use App\Jobs\SendReminderMail;
use Carbon\Carbon;

class SendScheduledReminders extends Command
{
    protected $signature = 'tasks:send-reminders';
    protected $description = 'Envoie les rappels des tâches arrivées à échéance';

    public function handle()
    {
        $now = Carbon::now();

        // Récupérer toutes les tâches dont la date est <= maintenant
        $tasks = Task::where('taskReminder', '<=', $now)
                     ->where('is_reminded', false)  // éviter d’envoyer deux fois
                     ->get();

        foreach ($tasks as $task) {
            dispatch(new SendReminderMail($task));
            $task->update(['is_reminded' => true]);
        }

        return Command::SUCCESS;
    }
}
