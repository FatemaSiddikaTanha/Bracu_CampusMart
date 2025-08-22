<!DOCTYPE html>
<html>
<head>
    @include('home.css')
    <title>Message</title>
    <style>
        body {
            background-color: lightgray;
            font-weight: bold;
        }

        .container {
            background-color: white;
            padding: 40px;
            border-radius: 12px;
            box-shadow: 0 6px 18px gray;
        }

        h2, h4 {
            color: violet;
            font-style: italic;
        }

        label {
            color: darkblue;
            font-weight: bold;
        }

        .form-control {
            border-radius: 8px;
            padding: 12px;
            border: 1px solid gray;
            color: navy;
            font-weight: bold;
        }

        .btn-primary {
            background-color: blue; 
            border-color: blue;
            color: white;
            font-style: italic;
            padding: 12px;
            border-radius: 8px;
        }

        .btn-primary:hover {
            background-color: darkblue;
            border-color: darkblue;
        }

        .alert-success {
            background-color: lightgreen;
            color: darkgreen;
            font-style: italic;
        }

        .alert-danger {
            background-color: skyblue;
            color: darkred;
            font-style: italic;
        }

        .message-card {
            border-radius: 15px;
            padding: 16px;
            margin-bottom: 12px;
            max-width: 75%;
            word-wrap: break-word;
            font-weight: bold;
        }

        .message-user {
            background-color: lightblue; 
            color: black; 
            margin-left: auto;
            text-align: right;
            font-size: 1.2rem;
        }

        .message-admin {
            background-color: whitesmoke;
            color: navy; 
            margin-right: auto;
            text-align: left;
            font-size: 1rem;
        }

        .message-small {
            font-size: 0.85rem;
            color: gray; 
            font-style: italic;
        }
    </style>
</head>
<body>
    <div class="container mt-5" style="max-width: 650px;">
        <h2 class="text-center mb-4">My Messages</h2>

        <!-- Success message -->
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <!-- Validation errors -->
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Send Message Form -->
        <div class="card mb-4">
            <div class="card-header">
                Message to Admin
            </div>
            <div class="card-body">
                <form action="{{ route('messages.send') }}" method="POST">
                    @csrf

                    <div class="mb-3">
                        <label for="message">Message Box</label>
                        <textarea name="message" id="message" class="form-control" rows="3" placeholder="Type your message..." required></textarea>
                    </div>

                    <button type="submit" class="btn btn-primary w-100">Send</button>
                </form>
            </div>
        </div>

        <!-- Inbox -->
        <h4>Inbox</h4>
        @forelse($messages as $msg)
            @php
                $isUser = $msg->sender->id == Auth::id();
            @endphp
            <div class="message-card {{ $isUser ? 'message-user' : 'message-admin' }}">
                <strong>{{ $msg->sender->name }}:</strong> {{ $msg->message }}
                <br>
                <small class="message-small">{{ $msg->created_at->diffForHumans() }}</small>
            </div>
        @empty
            <p>No messages yet.</p>
        @endforelse
    </div>
</body>
</html>
