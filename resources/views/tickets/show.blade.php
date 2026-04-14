<!DOCTYPE html>
<html>
<head>
    <title>Ticket Details</title>
</head>
<body>
    <h1>Ticket Details</h1>
    <a href="/tickets">Back to tickets</a>
    <hr>
    <h2>{{ $ticket->title }}</h2>
    <p><strong>Description:</strong> {{ $ticket->description }}</p>
    <p><strong>Status:</strong> {{ $ticket->status }}</p>
    <p><strong>Priority:</strong> {{ $ticket->priority }}</p>
    <p><strong>Created:</strong> {{ $ticket->created_at }}</p>
</body>
</html>