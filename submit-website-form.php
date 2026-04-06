<?php
include 'config.php';

// Sanitize and prepare inputs
$name = $conn->real_escape_string($_POST['name']);
$email = $conn->real_escape_string($_POST['email']);
$phone = $conn->real_escape_string($_POST['phone']);
$company = $conn->real_escape_string($_POST['company']);
$website = $conn->real_escape_string($_POST['website']);
$services = isset($_POST['services']) ? implode(", ", $_POST['services']) : '';
$budget = $conn->real_escape_string($_POST['budget']);
$timeline = $conn->real_escape_string($_POST['timeline']);
$features = $conn->real_escape_string($_POST['features']);
$goals = $conn->real_escape_string($_POST['goals']);
$referral = $conn->real_escape_string($_POST['referral']);

// Insert into database
$sql = "INSERT INTO website_inquiries (name, email, phone, company, website, services, budget, timeline, features, goals, referral)
        VALUES ('$name', '$email', '$phone', '$company', '$website', '$services', '$budget', '$timeline', '$features', '$goals', '$referral')";

if ($conn->query($sql) === TRUE) {
    // Send email notification
    $to = 'jhon@arzugil.com';
    $subject = 'New Website Development Inquiry';
    $message = "You’ve received a new inquiry from your website:\n\n";
    $message .= "Name: $name\n";
    $message .= "Email: $email\n";
    $message .= "Phone: $phone\n";
    $message .= "Company: $company\n";
    $message .= "Website: $website\n";
    $message .= "Services: $services\n";
    $message .= "Budget: $budget\n";
    $message .= "Timeline: $timeline\n";
    $message .= "Features: $features\n";
    $message .= "Goals: $goals\n";
    $message .= "Referral: $referral\n";

    $headers = "From: jhon@arzugil.com\r\n";
    $headers .= "Reply-To: $email\r\n";

    mail($to, $subject, $message, $headers);

    echo "Thank you! Your form has been submitted successfully.";
} else {
    echo "Error: " . $conn->error;
}

$conn->close();
?>