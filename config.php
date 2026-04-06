<?php
$host = '127.0.0.1:3306'; // Change if needed
$db = 'u249000411_Honeypot'; // Replace with your database name
$user = 'u249000411_Admin'; // Replace with your database username
$pass = 'Spiderman8085$'; // Replace with your database password

// Create connection
$conn = new mysqli($host, $user, $pass, $db);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

?>