<?php

namespace App\Notifications;

use App\Models\TaskCompletion;
use Illuminate\Notifications\Notification;

class TaskCompletedNotification extends Notification
{
    private $taskCompletion;

    public function __construct(TaskCompletion $taskCompletion)
    {
        $this->taskCompletion = $taskCompletion;
    }

    public function via($notifiable)
    {
        return ['database'];  // Store in the database only
    }

    public function toArray($notifiable)
    {
        return [
            
            'task_name' => $this->taskCompletion->task->name,
            'completed_at' => $this->taskCompletion->completed_at,
            'notes' => $this->taskCompletion->notes,
            'type' => 'TaskCompleted' // This is the type of notification
            
        
        ];
    }
}
