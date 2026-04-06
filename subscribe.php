<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize and validate the email address
    $email = filter_input(INPUT_POST, 'EMAIL', FILTER_VALIDATE_EMAIL);

    if (!$email) {
        echo "Invalid email address. Please try again.";
    } else {
        // Check if the email is already subscribed
        $stmt = $conn->prepare("SELECT id FROM newsletter_subscribers WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows > 0) {
            echo "This email address is already subscribed.";
        } else {
            // Insert the email into the subscribers table
            $stmt = $conn->prepare("INSERT INTO newsletter_subscribers (email) VALUES (?)");
            $stmt->bind_param("s", $email);

            if ($stmt->execute()) {
                echo "Thank you for subscribing!";
            } else {
                echo "There was an error processing your subscription. Please try again.";
            }
        }

        $stmt->close();
    }

    $conn->close();
} else {
    // Redirect if accessed directly
    header("Location: index.php"); // Redirect to the form page
    exit;
}
?>
