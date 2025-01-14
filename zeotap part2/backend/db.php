<?php
$servername = "localhost";
$username = "root";  // Update with your database username
$password = "";      // Update with your database password
$dbname = "cdp_chatbot";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
