<?php

use function Livewire\Volt\{state, mount};

state([
    'notifications' => [],
    'unreadCount' => 0
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
        $this->notifications = $user->notifications; // Load notifications
        $this->unreadCount = $user->unreadNotifications()->count(); // Count unread notifications
    }
};

$markAsRead = function() {
    $user = null;

    // Again, checking for the authenticated user
    foreach(['petowner', 'trainingcenter', 'boardingcenter'] as $user_guard) {
        if(auth($user_guard)->check()) {
            $user = auth($user_guard)->user();
            break;
        }
    }

    // Mark notifications as read
    if ($user) {
        $user->unreadNotifications->markAsRead(); // Mark all unread notifications as read
        $this->unreadCount = 0; // Reset unread count
    }
};

?>

<!-- Wrap everything inside a single div to avoid multiple root elements error -->
<div>
    <!-- Bell Icon with Unread Count Badge -->
    <div class="fab" id="notificationFab">
        <i class="fas fa-bell"></i>
        @if($unreadCount > 0)
            <span class="badge">{{ $unreadCount }}</span> <!-- Display unread count if any -->
        @endif
    </div>

    <!-- Notification Modal for displaying notifications -->
    <div class="modal fade" id="notificationModal" tabindex="-1" aria-labelledby="notificationModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="notificationModalLabel">Notifications</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Display the list of notifications -->
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
                <div class="modal-footer">
                    <!-- Mark all notifications as read -->
                    <button class="btn btn-primary" @click="$markAsRead()">Mark all as read</button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Style for the bell icon and modal -->
<style>
    .fab {
        position: fixed;
        bottom: 20px;
        right: 20px;
        width: 60px;
        height: 60px;
        background-color: #ff006a;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.3);
        cursor: pointer;
        color: white;
        font-size: 24px;
    }

    .modal-body ul {
        list-style-type: none;
        padding-left: 0;
    }

    .modal-body ul li {
        padding: 10px;
        border-bottom: 1px solid #ddd;
    }

    .modal-body ul li:last-child {
        border-bottom: none;
    }

    .badge {
        background-color: red;
        color: white;
        padding: 5px 10px;
        border-radius: 50%;
        position: absolute;
        top: 10px;
        right: 15px;
        font-size: 12px;
    }
</style>

<!-- Script to handle the modal display -->
<script>
    document.getElementById('notificationFab').addEventListener('click', function() {
        var modal = new bootstrap.Modal(document.getElementById('notificationModal'));
        modal.show();

        // Optionally call the markAsRead function when the modal is opened
        @this.call('markAsRead');
    });
</script>
