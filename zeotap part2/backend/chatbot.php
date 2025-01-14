<?php
// Connect to the database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "cdp_chatbot"; // Replace with your actual database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get the question from the POST data
$question = isset($_POST['question']) ? $_POST['question'] : '';

// Debugging: log the question to check if it's being sent correctly
error_log("Received question: " . $question);

// Query the database for a matching answer
$sql = "SELECT platform, answer FROM cdp_data WHERE question LIKE '%$question%' LIMIT 1";
$result = $conn->query($sql);

// Prepare the response
$response = array();

if ($result->num_rows > 0) {
    // If an answer is found
    $row = $result->fetch_assoc();
    $response['status'] = 'success';
    $response['platform'] = $row['platform'];
    // $response['task'] = $row['task'];
    $response['answer'] = $row['answer']; // Get the 'answer' from the database
} else {
    // If no matching answer is found
    $response['status'] = 'error';
    $response['message'] = 'Sorry, I could not find an answer to your question.';
}

// Return the response as JSON
echo json_encode($response);

// Close the connection
$conn->close();
?>
