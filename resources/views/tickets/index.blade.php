<!DOCTYPE html>
<html>
<head>
    <title>Student Services Portal</title>
</head>
<body>
    <h1>Tickets</h1>
    <a href="/tickets/create">Create New Ticket</a>
    <hr>
    @foreach($tickets as $ticket)
        <div>
            <h3><a href="/tickets/{{ $ticket->id }}">{{ $ticket->title }}</a></h3>
            <p>Status: {{ $ticket->status }}</p>
            <p>Priority: {{ $ticket->priority }}</p>
        </div>
        <hr>
    @endforeach
</body>
</html>