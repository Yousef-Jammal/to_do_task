const express = require('express');
const http = require('http');
const socketIo = require('socket.io');

// Initialize express and create a server
const app = express();
const server = http.createServer(app);

// Initialize Socket.IO with the server
const io = socketIo(server, {
    cors: {
        origin: "http://127.0.0.1:8000",  // The domain you want to allow
        methods: ["GET", "POST"]
    }
});

// Serve static files (e.g., the frontend)
app.use(express.static('public'));

// Handle socket connections
io.on('connection', (socket) => {
    console.log('a user connected');

    socket.on('disconnect', () => {
        console.log('user disconnected');
    });

    
    socket.on('newTask', (data) => {
        console.log('new task');

        io.emit('send-notification', data);
    });

});

// Start the server
// const PORT = process.env.PORT || 3000;
const PORT = 3000;
server.listen(PORT, () => {
    console.log(`Server is running on http://localhost:${PORT}`);
});
