<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Socket.IO with Pure JavaScript</title>
    <!-- Include Socket.IO Client Script -->
    {{-- <script src="/socket.io/socket.io.js"></script> --}}
    
</head>
<body>
    <h1>Socket.IO and Pure JavaScript Example</h1>
    <button id="sendMessage">Send Message</button>
    

<script src="http://localhost:3000/socket.io/socket.io.js"></script>
<script>
    // Connect to the Socket.IO server
    var socket = io('http://localhost:3000');

    // Get the button element
    const sendMessageButton = document.getElementById('sendMessage');

    // Send a custom event when the button is clicked
    sendMessageButton.addEventListener('click', function() {
        const message = 'Hello from client!';
        socket.emit('clientMessage', message); // Sending custom event with message data
        console.log('Message sent:', message);
    });

</script>


    {{-- <script src="http://localhost:3000/socket.io/socket.io.js"></script>
    <script>
        // Connect to the Socket.IO server  
        var socket = io('http://localhost:3000');

        // // Send a message when the button is clicked
        // document.getElementById('sendMessage').addEventListener('click', function() {
        //     socket.emit('message', 'Hello from client!');
        //     console.log('Message sent!');
        // });

        // // Listen for messages from the server
        // socket.on('message', function(data) {
        //     console.log('Message received:', data);
        // });
    </script> --}}
</body>
</html>
