<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CDP Chatbot</title>
    <link rel="stylesheet" href="assets/chatbot.css">
</head>
<body>

<div class="chatbot-container">
    <div class="chatbox" id="chatbox">
        <div class="bot-message">Hello! Ask me how to perform tasks on Segment, mParticle, Lytics, or Zeotap.</div>
    </div>

    <input type="text" id="userQuery" placeholder="Ask a question..." />
    <button onclick="sendMessage()">Send</button>
</div>

<script src="chatbot.js"></script>
</body>
</html>
