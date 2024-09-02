<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize and validate inputs
    $fname = filter_var(trim($_POST["fname"]), FILTER_SANITIZE_STRING);
    $email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);
    $phone = filter_var(trim($_POST["phone"]), FILTER_SANITIZE_STRING);
    $message = filter_var(trim($_POST["message"]), FILTER_SANITIZE_STRING);

    // Basic validation
    if (empty($fname) || empty($email) || empty($phone) || empty($message)) {
        http_response_code(400);
        echo "Please fill out all required fields.";
        exit;
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        http_response_code(400);
        echo "Invalid email format.";
        exit;
    }

    // Prepare the email
    $to = "admin@arzugil.com"; // Replace with your email address
    $subject = "New Contact Form Submission from $fname";
    $body = "
    Name: $fname\n
    Email: $email\n
    Phone: $phone\n
    Message:\n$message
    ";
    $headers = "From: $email\r\n";
    $headers .= "Reply-To: $email\r\n";
    $headers .= "X-Mailer: PHP/" . phpversion();

    // Send the email
    if (mail($to, $subject, $body, $headers)) {
        http_response_code(200);
        echo "Your message has been sent successfully.";
    } else {
        http_response_code(500);
        echo "There was a problem sending your message. Please try again later.";
        // Consider logging the error to a file
        error_log("Mail send failed for contact form submission from $email");
    }
} else {
    http_response_code(403);
    echo "Invalid request method.";
}
?>
