<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chat with Pet Boarders</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Fredoka+One&display=swap');
        @import url('https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap');

        body {
            font-family: 'Nunito', sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 0;
            overflow: hidden;
        }

        .chat-container {
            display: flex;
            height: 100vh;
            overflow: hidden;
        }

        .chat-sidebar {
            background-color: #fff;
            border-right: 1px solid #ddd;
            width: 300px;
            overflow-y: auto;
            padding: 20px;
            transition: all 0.3s ease-in-out;
            position: relative;
            z-index: 1000;
            display: flex;
            flex-direction: column;
        }

        .chat-sidebar h4 {
            font-family: 'Fredoka One', cursive;
            font-size: 1.8rem;
            font-weight: bold;
            color: #ff6600; /* Fredoka Orange */
            margin-bottom: 20px;
            text-align: center;
        }

        .chat-sidebar a {
            padding: 15px;
            display: block;
            border-radius: 5px;
            margin-bottom: 10px;
            background-color: #f8f9fa;
            color: #333;
            text-decoration: none;
            font-weight: bold;
        }

        .chat-sidebar a:hover {
            background-color: #ff6600;
            color: white;
        }

        .chat-sidebar a.active {
            background-color: #ff6600;
            color: white;
        }

        /* Go Back to Dashboard button */
        .go-back-btn {
            background-color: #ff6600;
            color: white;
            padding: 12px;
            text-align: center;
            border-radius: 5px;
            margin-top: auto;
            display: block;
            text-decoration: none;
            font-weight: bold;
            transition: background-color 0.3s ease;
        }

        .go-back-btn:hover {
            background-color: #e65c00;
        }

        .chat-main {
            flex: 1;
            display: flex;
            flex-direction: column;
            background-color: #f8f9fa;
        }

        .chat-header {
            background-color: #ff6600;
            color: white;
            padding: 15px;
            text-align: center;
            font-family: 'Fredoka One', cursive;
            font-size: 1.5rem;
            position: relative;
        }

        #chatBox {
            background-color: white;
            padding: 20px;
            flex: 1;
            overflow-y: auto;
            display: flex;
            flex-direction: column;
        }

        .message {
            margin-bottom: 15px;
            padding: 10px;
            border-radius: 20px;
            max-width: 70%;
            font-size: 1rem;
        }

        .message.sent {
            background-color: #ff6600;
            color: white;
            text-align: right;
            align-self: flex-end;
        }

        .message.received {
            background-color: #f1f1f1;
            color: black;
            text-align: left;
            align-self: flex-start;
        }

        .chat-input {
            background-color: #fff;
            padding: 15px;
            display: flex;
            border-top: 1px solid #ddd;
        }

        .chat-input input {
            flex-grow: 1;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 20px;
            margin-right: 10px;
        }

        .chat-input button {
            background-color: #ff6600;
            border: none;
            padding: 10px 20px;
            border-radius: 20px;
            color: white;
            white-space: nowrap;
            align-self: center;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .chat-sidebar {
                position: absolute;
                top: 0;
                left: -300px;
                width: 300px;
                height: 100%;
                z-index: 1000;
                background-color: #fff;
                transition: left 0.3s ease-in-out;
            }

            .chat-sidebar.show {
                left: 0;
            }

            .chat-main {
                width: 100%;
            }

            .chat-header {
                display: flex;
                justify-content: space-between;
                align-items: center;
            }

            .toggle-sidebar {
                display: block;
                font-size: 1rem;
                background-color: #fff;
                border: none;
                color: #ff6600;
                margin-right: 10px;
                padding: 5px 10px;
                border-radius: 5px;
            }
        }

        @media (max-width: 576px) {
            .chat-sidebar a {
                padding: 10px;
                font-size: 0.9rem;
            }

            .message {
                font-size: 0.9rem;
                padding: 8px;
            }

            .chat-input input {
                font-size: 0.9rem;
            }

            .chat-input button {
                font-size: 0.9rem;
                padding: 8px 15px;
            }
        }
    </style>
</head>
<body>

<div class="chat-container">
    <div class="chat-sidebar">
        <h4>Pet Boarders</h4>
        @foreach($boarders as $boarder)
            <a href="{{ route('pet-owner.chats', ['boarder_id' => $boarder->id]) }}"
               class="{{ isset($selectedBoarder) && $selectedBoarder->id == $boarder->id ? 'active' : '' }}">
                {{ $boarder->business_name }}
            </a>
        @endforeach

        <!-- Go Back to Dashboard button at the bottom of the sidebar -->
        <a href="{{ route('pet-owner.dashboard') }}" class="go-back-btn">Go Back to Dashboard</a>
    </div>

    <div class="chat-main">
        <div class="chat-header">
            @if(isset($selectedBoarder))
                Chat with {{ $selectedBoarder->business_name }}
            @else
                Select a pet boarder to chat
            @endif
            <button class="toggle-sidebar d-md-none">Pet Boarders</button> <!-- Button to toggle contacts on mobile -->
        </div>

        <div id="chatBox">
            @if(isset($selectedBoarder))
                @foreach($messages as $message)
                    <div class="message {{ ($message->sender_user_type == 'petowner' ? 'sent' : 'received') }}">
                        {{ $message->message }}
                    </div>
                @endforeach
            @endif
        </div>

        @if(isset($selectedBoarder))
            <div class="chat-input">
                <form id="sendMessageForm" style="display: flex; width: 100%;">
                    @csrf
                    <input type="hidden" name="receiver_id" value="{{ $selectedBoarder->id }}" />
                    <input type="text" name="message" class="form-control chat-input-field" placeholder="Type your message here..." required />
                    <button type="submit" class="btn btn-primary send-btn">Send</button>
                </form>
            </div>
        @endif
    </div>
</div>

<script>
    @if(isset($selectedBoarder))
    const fetchMessages = () => {
        fetch("{{ route('fetch.messagesBetweenPetOwnerAndBoarder', ['receiver_id' => $selectedBoarder->id]) }}")
        .then(response => response.json())
        .then(data => {
            const chatBox = document.getElementById('chatBox');
            chatBox.innerHTML = '';
            data.messages.forEach(message => {
                const messageElement = document.createElement('div');
                messageElement.classList.add('message', message.sender_id === {{ auth()->id() }} ? 'sent' : 'received');
                messageElement.innerText = message.message;
                chatBox.appendChild(messageElement);
            });
            chatBox.scrollTop = chatBox.scrollHeight; // Scroll to bottom after messages are fetched
        });
    }

    document.getElementById('sendMessageForm').addEventListener('submit', function (e) {
        e.preventDefault();
        const formData = new FormData(this);

        fetch("{{ route('send.messageBetweenPetOwnerAndBoarder') }}", {
            method: 'POST',
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                this.reset();
                location.reload(); // Reload the entire page after sending the message
            }
        });
    });

    setInterval(fetchMessages, 1000); // Fetch messages every 2 seconds
    @endif

    // Scroll to bottom after page reloads
    window.onload = () => {
        const chatBox = document.getElementById('chatBox');
        chatBox.scrollTop = chatBox.scrollHeight;
    };

    // Toggle chat sidebar on mobile
    const toggleSidebar = document.querySelector('.toggle-sidebar');
    const chatSidebar = document.querySelector('.chat-sidebar');

    toggleSidebar.addEventListener('click', function () {
        chatSidebar.classList.toggle('show');
    });

</script>

</body>
</html>