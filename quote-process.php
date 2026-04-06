<?php

include 'config.php';
// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // Collect and sanitize the input data
    $name = $conn->real_escape_string(trim($_POST['fname']));
    $email = $conn->real_escape_string(trim($_POST['email']));
    $phone = $conn->real_escape_string(trim($_POST['phone']));
    $service = $conn->real_escape_string(trim($_POST['service']));

    // Validate the form fields
    $errors = [];
    
    if (empty($name)) {
        $errors[] = "Name is required.";
    }
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "A valid email address is required.";
    }
    if (empty($phone)) {
        $errors[] = "Phone number is required.";
    }
    if (empty($service)) {
        $errors[] = "Please select a service.";
    }

    // If there are no errors, insert the data into the database
    if (empty($errors)) {
        $stmt = $conn->prepare("INSERT INTO quotes (name, email, phone, service) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $name, $email, $phone, $service);

        if ($stmt->execute()) {
            // Return a success message
            echo "Thank you! Your request has been submitted successfully.";
        } else {
            echo "Error: " . $stmt->error;
        }

        $stmt->close();
    } else {
        // If there are errors, return them
        echo "<h3>There were errors with your submission:</h3>";
        echo "<ul>";
        foreach ($errors as $error) {
            echo "<li>" . htmlspecialchars($error) . "</li>";
        }
        echo "</ul>";
    }
}

// Close connection
$conn->close();
?>
