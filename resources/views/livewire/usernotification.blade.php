<?php

use function Livewire\Volt\{state, mount};

state([
    'notifications' => []
]);

$loadNotifications = function(){
    $user = null;

    // Check which user is authenticated
    foreach(['petowner', 'trainingcenter', 'boardingcenter'] as $user_guard) {
        if(auth($user_guard)->check()) {
            $user = auth($user_guard)->user();
            break;
        }
    }

    if ($user) {
        $this->notifications = $user->notifications;
    }
};

?>

<div x-data="{
    init(){
       @this.loadNotifications();
    }
}">
    <ul>
        @foreach($notifications as $notification)
        <li>
            
            <strong>Task:</strong> {{ $notification->data['task_name'] }} <br>
            <strong>Completed At:</strong> {{ $notification->data['completed_at'] }} <br>
            <strong>Notes:</strong> {{ $notification->data['notes'] }} <br>
 
        </li>
        
        @endforeach
    </ul>
</div>
