<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Activity Log</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Fredoka:wght@400;500;700&display=swap');

        body {
            font-family: 'Fredoka', sans-serif;
            background-color: #ffebcc;
            margin: 0;
            padding: 20px;
            overflow-x: hidden;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 16px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            position: relative;
            animation: fadeIn 1s ease-in-out;
        }

        .header {
            text-align: center;
            padding: 20px 0;
            background-color: #ff6600;
            color: #fff;
            border-radius: 16px 16px 0 0;
        }

        h2 {
            margin: 0;
            font-size: 2em;
        }

        .task-log {
            margin-top: 20px;
            max-height: 60vh;
            overflow-y: auto;
        }

        .task-item {
            display: flex;
            align-items: center;
            padding: 10px;
            margin-bottom: 15px;
            background-color: #fff4e6;
            border-left: 6px solid #ff6600;
            border-radius: 12px;
            transition: transform 0.3s ease, background-color 0.3s ease;
        }

        .task-item:hover {
            transform: translateX(10px);
            background-color: #fff0db;
        }

        .task-icon {
            color: #ff6600;
            font-size: 1.5em;
            margin-right: 10px;
        }

        .task-name {
            font-weight: 700;
            color: #ff6600;
            font-size: 1.2em;
        }

        .task-details {
            margin-top: 5px;
            flex-grow: 1;
            color: #999;
            font-size: 0.9em;
        }

        /* Back to Dashboard Button */
        .back-to-dashboard {
            position: fixed;
            top: 20px;
            left: 20px;
            background-color: #ff6600;
            color: white;
            padding: 10px 20px;
            border-radius: 50px;
            text-decoration: none;
            font-weight: bold;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: background-color 0.3s ease;
            z-index: 100;
        }

        .back-to-dashboard:hover {
            background-color: #e65c00;
        }

        /* Fade in animation */
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Media Query to hide the Back to Dashboard button on smaller screens */
        @media screen and (max-width: 768px) {
            .back-to-dashboard {
                display: none;
            }

            .container {
                padding: 15px;
            }

            h2 {
                font-size: 1.5em;
            }

            .task-item {
                padding: 8px;
            }

            .task-name {
                font-size: 1em;
            }

            .task-icon {
                font-size: 1.2em;
            }
        }
    </style>
</head>

<body>
    <a href="{{ route('pet-owner.dashboard') }}" class="back-to-dashboard">
        <i class="fas fa-arrow-left"></i> Back to Dashboard
    </a>

    <div class="container">
        <div class="header">
            <h2>Activity Log for {{ $appointment->pet->pet_name }}</h2>
        </div>

        <div class="task-log">
            @foreach($appointment->taskCompletions as $taskCompletion)
            <div class="task-item">
                <i class="fas fa-paw task-icon"></i>
                <div>
                    <div class="task-name">{{ $taskCompletion->task->name }}</div>
                    <div class="task-details">{{ $taskCompletion->completed_at }}</div>
                    @if($taskCompletion->notes)
                    <div class="task-notes">Notes: {{ $taskCompletion->notes }}</div>
                    @endif
                </div>
            </div>
            @endforeach
        </div>
    </div>

    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>

</body>

</html>
