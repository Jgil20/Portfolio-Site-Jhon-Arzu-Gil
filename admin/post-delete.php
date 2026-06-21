<?php
require_once __DIR__ . '/auth_check.php';

if (!isset($_GET['slug'])) {
    header('Location: posts.php');
    exit;
}

$slug = $_GET['slug'];

// Delete the post
$stmt = $pdo->prepare("DELETE FROM blog_posts WHERE slug = ?");
$stmt->execute([$slug]);

if ($stmt->rowCount() > 0) {
    // Redirect with success message
    header('Location: posts.php?deleted=1');
} else {
    header('Location: posts.php?error=1');
}
exit;
?>
