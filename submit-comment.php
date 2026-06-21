<?php
require_once __DIR__ . '/includes/config.php';

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode([
        'success' => false,
        'message' => 'Invalid request method.'
    ]);
    exit;
}

$pageSlug = trim($_POST['page_slug'] ?? '');
$name = trim($_POST['name'] ?? '');
$email = trim($_POST['email'] ?? '');
$comment = trim($_POST['comment'] ?? '');

if ($pageSlug === '' || $name === '' || $comment === '') {
    http_response_code(400);
    echo json_encode([
        'success' => false,
        'message' => 'Please fill out all required fields.'
    ]);
    exit;
}

if ($email !== '' && !filter_var($email, FILTER_VALIDATE_EMAIL)) {
    http_response_code(400);
    echo json_encode([
        'success' => false,
        'message' => 'Please enter a valid email address.'
    ]);
    exit;
}

if (strlen($name) > 150) {
    http_response_code(400);
    echo json_encode([
        'success' => false,
        'message' => 'Name is too long.'
    ]);
    exit;
}

if (strlen($comment) > 2000) {
    http_response_code(400);
    echo json_encode([
        'success' => false,
        'message' => 'Comment is too long. Please keep it under 2,000 characters.'
    ]);
    exit;
}

try {
    $stmt = $pdo->prepare("
        INSERT INTO comments 
        (page_slug, name, email, comment, status, created_at)
        VALUES 
        (:page_slug, :name, :email, :comment, 'approved', NOW())
    ");

    $stmt->execute([
        ':page_slug' => $pageSlug,
        ':name' => $name,
        ':email' => $email !== '' ? $email : null,
        ':comment' => $comment
    ]);

    echo json_encode([
        'success' => true,
        'message' => 'Your comment was posted successfully.'
    ]);
} catch (Exception $e) {
    http_response_code(500);

    echo json_encode([
        'success' => false,
        'message' => 'There was a problem saving your comment.'
    ]);
}