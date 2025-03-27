<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>To-Do List with Real-Time Notifications</title>
    <link rel="stylesheet" href="style.css">
    <!-- Include Socket.IO client -->
    <script src="https://cdn.socket.io/4.0.0/socket.io.min.js"></script>
</head>
<body>

    <div class="container">
        <header>
            <h1>To-Do List</h1>
        </header>

        <section class="todo-list">
            <ul id="todo-items">
                <!-- To-Do Items will be added here dynamically -->
            </ul>
        </section>

        <section class="add-todo">
            <input type="text" id="new-todo" placeholder="Add a new task" />
            <button onclick="addTodo()">Add Task</button>
        </section>

        <div id="notification" class="notification">
            <p id="notification-message"></p>
        </div>
    </div>

    <script src="app.js"></script>
</body>
</html>
