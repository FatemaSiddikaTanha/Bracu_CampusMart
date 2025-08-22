<!DOCTYPE html>
<html>
<head>
    @include('admin.css')
    <style>
        .chat-container {
            width: 70%;
            max-width: 700px;
            margin: 20px auto;
            border: 1px solid violet;
            border-radius: 12px;
            padding: 15px;
            display: flex;
            flex-direction: column;
            max-height: 400px;
            overflow-y: auto;
            background-color: skyblue;
        }

        .message {
            padding: 12px ;
            margin: 8px 0;
            border-radius: 12px;
            max-width: 95%;
            word-wrap: break-word;
        }

        .message.user {
            align-self: flex-start;
            background-color: #ecf0f1;
            color: #2c3e50;
            text-align: left;
        }

        .message-time {
            font-size: 0.8rem;
            color: black;
        }

        .send-message {
            width: 90%;
            max-width: 900px;
            margin: 0 auto 20px auto;
            display: flex;
            flex-direction: column;
        }

        .send-message textarea {
            flex: 1;
            padding: 15px;
            border-radius: 12px;
            border: 1px  navyblue;
            
            width: 100%;
            height: 100px;
            font-size: 1rem;
            margin-top: 5px;
        }

        .send-message button {
            margin-top: 10px;
            padding: 12px 25px;
            border-radius: 12px;
            
            background-color: skyblue;
            color: black;
            align-self: flex-end;
        }
    </style>
</head>
<body>
    @include('admin.header')
    @include('admin.sidebar')

    <div class="page-content">
        <h2 class="text-center my-4">User Messages (Total: {{ $count }})</h2>

        @if(session('success'))
            <div class="alert alert-success text-center">{{ session('success') }}</div>
        @endif

        
        <div class="chat-container" id="chatContainer">
            @php $userMessages = $messages->where('sender_id', '!=', Auth::id()); @endphp

            @forelse($userMessages as $msg)
                @php
                    $senderName = is_object($msg->sender) ? $msg->sender->name : 'Unknown';
                @endphp
                <div class="message user">
                    <strong>{{ $senderName }}:</strong> {{ $msg->message }}
                    <br>
                    <span class="message-time">{{ $msg->created_at->format('d M Y, h:i A') }}</span>

                    <form action="{{ route('admin.messages.send') }}" method="POST" class="send-message">
                        @csrf
                        <input type="hidden" name="user_id" value="{{ $msg->sender_id }}">
                        <textarea name="message" placeholder="Reply to {{ $senderName }}" required></textarea>
                        <button type="submit">Send</button>
                    </form>
                </div>
            @empty
                <p class="text-center text-muted">No messages from users yet.</p>
            @endforelse
        </div>
    </div>

    <script>
        
        var chatContainer = document.getElementById('chatContainer');
        chatContainer.scrollTop = chatContainer.scrollHeight;
    </script>
</body>
</html>
