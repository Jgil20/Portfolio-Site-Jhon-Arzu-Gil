<?php
require_once __DIR__ . '/config.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: service-details-updated.php#comments');
    exit;
}

$name = trim($_POST['name'] ?? '');
$comment = trim($_POST['comment'] ?? '');

if ($name === '' || $comment === '') {
    header('Location: service-details-updated.php#comments');
    exit;
}

if (!isset($conn) || !($conn instanceof mysqli)) {
    die('Database connection is not available.');
}

$stmt = $conn->prepare("INSERT INTO comments (name, comment) VALUES (?, ?)");
$stmt->bind_param("ss", $name, $comment);
$stmt->execute();
$stmt->close();

header('Location: service-details-updated.php#comments');
exit;
