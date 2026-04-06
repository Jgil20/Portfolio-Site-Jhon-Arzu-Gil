<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $conn->real_escape_string(strip_tags($_POST['name']));
    $comment = $conn->real_escape_string(strip_tags($_POST['comment']));

    if (!empty($name) && !empty($comment)) {
        $sql = "INSERT INTO comments (name, comment) VALUES ('$name', '$comment')";
        if ($conn->query($sql) === TRUE) {
            // Redirect back to the fullstack developer page
            header("Location: fullstack-developer.php?comment=success");
            exit();
        } else {
            // Redirect with error flag
            header("Location: fullstack-developer.php?comment=error");
            exit();
        }
    } else {
        // Redirect if fields are empty
        header("Location: fullstack-developer.php?comment=empty");
        exit();
    }
} else {
    // Invalid access
    header("Location: fullstack-developer.php");
    exit();
}
?>