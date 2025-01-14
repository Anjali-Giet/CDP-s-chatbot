function sendMessage() {
    let userQuestion = document.getElementById("userQuery").value;
    if (!userQuestion) return;

    let chatbox = document.getElementById("chatbox");

    // Add user's question to the chatbox
    let userMessage = document.createElement("div");
    userMessage.classList.add("user-message");
    userMessage.textContent = userQuestion;
    chatbox.appendChild(userMessage);

    // Clear the input field immediately
    document.getElementById("userQuery").value = '';

    // Send the question to the PHP backend
    fetch('backend/chatbot.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded'
        },
        body: 'question=' + encodeURIComponent(userQuestion)
    })
    .then(response => response.json())
    .then(data => {
        console.log("Response from backend:", data); // Log the response to debug
        
        // Add the bot's response to the chatbox
        let botMessage = document.createElement("div");
        botMessage.classList.add("bot-message");

        if (data.status === 'success') {
            // If the response has instructions, show it
            botMessage.innerHTML = `Platform: ${data.platform}<br>instruction: ${data.answer}`;
        } else {
            // Show an error message if no data is found
            botMessage.textContent = `Sorry, I couldn't find an answer for: "${userQuestion}"`;
        }

        // Add the bot's response below the user's question
        chatbox.appendChild(botMessage);

        // Scroll to the bottom of the chatbox to show the latest message
        chatbox.scrollTop = chatbox.scrollHeight;
    })
    .catch(error => {
        console.error('Error:', error);
    });
}
