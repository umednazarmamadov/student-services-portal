<!DOCTYPE html>
<html>
<head>
    <title>Create Ticket</title>
</head>
<body>
    <h1>Create New Ticket</h1>
    <a href="/tickets">Back to tickets</a>
    <hr>
    <form method="POST" action="/tickets">
        @csrf
        <div>
            <label>Title:</label>
            <input type="text" name="title" required>
        </div>
        <br>
        <div>
            <label>Description:</label>
            <textarea name="description" required></textarea>
        </div>
        <br>
        <div>
            <label>Priority:</label>
            <select name="priority">
                <option value="low">Low</option>
                <option value="medium" selected>Medium</option>
                <option value="high">High</option>
            </select>
        </div>
        <br>
        <button type="submit">Create Ticket</button>
    </form>
</body>
</html>