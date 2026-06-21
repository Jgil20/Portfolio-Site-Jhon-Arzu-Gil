<?php
require_once __DIR__ . '/includes/config.php';

header('Content-Type: application/json');

$pageSlug = trim($_GET['page_slug'] ?? '');

if ($pageSlug === '') {
    http_response_code(400);
    echo json_encode([
        'success' => false,
        'message' => 'Missing page slug.'
    ]);
    exit;
}

try {
    $stmt = $pdo->prepare("
        SELECT name, comment, created_at
        FROM comments
        WHERE page_slug = :page_slug
        AND status = 'approved'
        ORDER BY created_at DESC
        LIMIT 20
    ");

    $stmt->execute([
        ':page_slug' => $pageSlug
    ]);

    $comments = $stmt->fetchAll();

    echo json_encode([
        'success' => true,
        'comments' => $comments
    ]);
} catch (Exception $e) {
    http_response_code(500);

    echo json_encode([
        'success' => false,
        'message' => 'Could not load comments.'
    ]);
}