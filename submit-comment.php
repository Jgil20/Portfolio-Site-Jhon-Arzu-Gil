<?php
include 'config.php';

// Get POST data and sanitize
$post_id = intval($_POST['post_id']);
$name = $conn->real_escape_string($_POST['author']);
$email = $conn->real_escape_string($_POST['email']);
$comment = $conn->real_escape_string($_POST['comment']);

// Insert into database
$sql = "INSERT INTO blog_comments (post_id, name, email, comment) 
        VALUES ('$post_id', '$name', '$email', '$comment')";

if ($conn->query($sql) === TRUE) {
    echo "Comment submitted successfully.";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
