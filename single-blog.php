<?php
require_once __DIR__ . '/includes/config.php';

if (!function_exists('e')) {
    function e($value): string
    {
        return htmlspecialchars((string) $value, ENT_QUOTES, 'UTF-8');
    }
}

$slug = trim($_GET['slug'] ?? '');

if ($slug === '') {
    $latestStmt = $pdo->query("SELECT slug FROM blog_posts WHERE status = 'published' ORDER BY date DESC, id DESC LIMIT 1");
    $latestSlug = $latestStmt->fetchColumn();

    if ($latestSlug) {
        header('Location: /blog/' . rawurlencode($latestSlug));
        exit;
    }

    http_response_code(404);
    exit('No published blog posts were found.');
}

$postStmt = $pdo->prepare("\n    SELECT\n        p.*,\n        (\n            SELECT COUNT(*)\n            FROM blog_comments bc\n            WHERE bc.post_id = p.id\n        ) AS comment_count\n    FROM blog_posts p\n    WHERE p.slug = :slug\n      AND p.status = 'published'\n    LIMIT 1\n");
$postStmt->execute([':slug' => $slug]);
$post = $postStmt->fetch();

if (!$post) {
    http_response_code(404);
    exit('Blog post not found.');
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit_comment'])) {
    $name = trim($_POST['name'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $comment = trim($_POST['comment'] ?? '');

    if ($name === '' || $email === '' || $comment === '') {
        $commentError = 'Please complete all required fields.';
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $commentError = 'Please enter a valid email address.';
    } elseif (mb_strlen($name) > 100 || mb_strlen($email) > 100 || mb_strlen($comment) > 3000) {
        $commentError = 'Your comment is too long.';
    } else {
        try {
            $insertComment = $pdo->prepare("\n                INSERT INTO blog_comments (post_id, name, email, comment)\n                VALUES (:post_id, :name, :email, :comment)\n            ");
            $insertComment->execute([
                ':post_id' => $post['id'],
                ':name' => $name,
                ':email' => $email,
                ':comment' => $comment
            ]);

            header('Location: /blog/' . rawurlencode($post['slug']) . '?comment=success#comments');
            exit;
        } catch (Throwable $e) {
            $commentError = 'There was a problem saving your comment.';
        }
    }
}

$pageTitle = $post['title'] . ' | Jhon Arzu-Gil';
$pageDescription = $post['excerpt'];
$pageKeywords = $post['tags'] ?? '';
$canonicalUrl = 'https://www.arzugil.com/blog/' . rawurlencode($post['slug']);

$previousStmt = $pdo->prepare("\n    SELECT title, slug\n    FROM blog_posts\n    WHERE status = 'published'\n      AND (`date` < :post_date_before OR (`date` = :post_date_equal AND id < :post_id))\n    ORDER BY date DESC, id DESC\n    LIMIT 1\n");
$previousStmt->execute([
    ':post_date_before' => $post['date'],
    ':post_date_equal' => $post['date'],
    ':post_id' => $post['id']
]);
$previousPost = $previousStmt->fetch();

$nextStmt = $pdo->prepare("\n    SELECT title, slug\n    FROM blog_posts\n    WHERE status = 'published'\n      AND (`date` > :post_date_after OR (`date` = :post_date_equal_next AND id > :post_id))\n    ORDER BY date ASC, id ASC\n    LIMIT 1\n");
$nextStmt->execute([
    ':post_date_after' => $post['date'],
    ':post_date_equal_next' => $post['date'],
    ':post_id' => $post['id']
]);
$nextPost = $nextStmt->fetch();

$relatedStmt = $pdo->prepare("\n    SELECT id, title, slug, image, excerpt, date\n    FROM blog_posts\n    WHERE status = 'published'\n      AND category = :category\n      AND id != :post_id\n    ORDER BY date DESC, id DESC\n    LIMIT 3\n");
$relatedStmt->execute([
    ':category' => $post['category'],
    ':post_id' => $post['id']
]);
$relatedPosts = $relatedStmt->fetchAll();

$recentStmt = $pdo->prepare("\n    SELECT\n        p.id, p.title, p.slug, p.image, p.date,\n        (SELECT COUNT(*) FROM blog_comments bc WHERE bc.post_id = p.id) AS comment_count\n    FROM blog_posts p\n    WHERE p.status = 'published'\n      AND p.id != :post_id\n    ORDER BY p.date DESC, p.id DESC\n    LIMIT 6\n");
$recentStmt->execute([':post_id' => $post['id']]);
$recentPosts = $recentStmt->fetchAll();

$commentsStmt = $pdo->prepare("\n    SELECT id, name, comment, created_at\n    FROM blog_comments\n    WHERE post_id = :post_id\n    ORDER BY created_at DESC, id DESC\n");
$commentsStmt->execute([':post_id' => $post['id']]);
$comments = $commentsStmt->fetchAll();

$recentCommentsStmt = $pdo->query("\n    SELECT bc.name, bc.comment, bc.created_at, p.title, p.slug\n    FROM blog_comments bc\n    INNER JOIN blog_posts p ON p.id = bc.post_id\n    WHERE p.status = 'published'\n    ORDER BY bc.created_at DESC, bc.id DESC\n    LIMIT 6\n");
$recentComments = $recentCommentsStmt->fetchAll();

include __DIR__ . '/header.php';
?>

<link rel="canonical" href="<?= e($canonicalUrl); ?>">
<meta property="og:type" content="article">
<meta property="og:title" content="<?= e($pageTitle); ?>">
<meta property="og:description" content="<?= e($pageDescription); ?>">
<meta property="og:url" content="<?= e($canonicalUrl); ?>">
<meta property="og:image" content="<?= e('https://www.arzugil.com/' . ltrim($post['image'], '/')); ?>">

<section id="single-page-banner" class="page-title page-title-image blog-hbg">
    <div class="container">
        <div class="row">
            <div class="col-md-6"><h2>Article Details</h2></div>
            <div class="col-md-6">
                <ul class="breadcrumb">
                    <li><a href="index.php">Home</a></li>
                    <li><a href="blog.php">Blog</a></li>
                    <li class="active"><?= e($post['title']); ?></li>
                </ul>
            </div>
        </div>
    </div>
</section>

<div id="content" class="content SectionMargin">
    <div class="container">
        <div class="row">
            <div id="single-post-content" class="col-md-8">
                <article class="post">
                    <div class="post-title"><h1><?= e($post['title']); ?></h1></div>

                    <div class="post-meta">
                        <span><i class="fa-solid fa-user"></i> <?= e($post['author']); ?></span>
                        <span><i class="fa-solid fa-calendar"></i> <?= date('F j, Y', strtotime($post['date'])); ?></span>
                        <span><i class="fa-solid fa-folder-open"></i> <?= e($post['category']); ?></span>
                        <span><i class="fa-solid fa-comments"></i> <a href="#comments"><?= (int) $post['comment_count']; ?></a></span>
                    </div>

                    <div class="post-image">
                        <img src="<?= e($post['image']); ?>" alt="<?= e($post['title']); ?>" loading="eager">
                    </div>

                    <div class="post-body">
                        <?= $post['content']; ?>
                    </div>

                    <div class="share-icon clearfix">
                        <span>Share this Post:</span>
                        <?php $shareUrl = rawurlencode($canonicalUrl); $shareTitle = rawurlencode($post['title']); ?>
                        <ul class="list-inline list-social">
                            <li><a href="https://www.facebook.com/sharer/sharer.php?u=<?= $shareUrl; ?>" target="_blank" rel="noopener noreferrer" class="social-icon social-icon-small social-icon-colored social-icon-facebook"><i class="fa-brands fa-facebook-f"></i><i class="fa-brands fa-facebook-f"></i></a></li>
                            <li><a href="https://twitter.com/intent/tweet?url=<?= $shareUrl; ?>&text=<?= $shareTitle; ?>" target="_blank" rel="noopener noreferrer" class="social-icon social-icon-small social-icon-colored social-icon-twitter"><i class="fa-brands fa-twitter"></i><i class="fa-brands fa-twitter"></i></a></li>
                            <li><a href="https://www.linkedin.com/sharing/share-offsite/?url=<?= $shareUrl; ?>" target="_blank" rel="noopener noreferrer" class="social-icon social-icon-small social-icon-colored social-icon-linkedin"><i class="fa-brands fa-linkedin"></i><i class="fa-brands fa-linkedin"></i></a></li>
                        </ul>
                    </div>
                </article>

                <div class="post-navigation clearfix">
                    <div class="row"><div class="col-sm-12">
                        <div class="float-start">
                            <?php if ($previousPost): ?>
                                <a href="<?= e('/blog/' . rawurlencode($previousPost['slug'])); ?>"><i class="fa-solid fa-angles-left"></i> <?= e($previousPost['title']); ?></a>
                            <?php endif; ?>
                        </div>
                        <div class="float-end">
                            <?php if ($nextPost): ?>
                                <a href="<?= e('/blog/' . rawurlencode($nextPost['slug'])); ?>"><?= e($nextPost['title']); ?> <i class="fa-solid fa-angles-right"></i></a>
                            <?php endif; ?>
                        </div>
                    </div></div>
                </div>

                <?php if ($relatedPosts): ?>
                <div id="related-blog" class="blog">
                    <div class="title-box"><h3>Related <strong>Posts</strong></h3></div>
                    <div class="row">
                        <?php foreach ($relatedPosts as $related): ?>
                            <div class="col-sm-4">
                                <article class="blog-wrap">
                                    <div class="blog-thumb"><a href="<?= e('/blog/' . rawurlencode($related['slug'])); ?>"><img src="<?= e($related['image']); ?>" alt="<?= e($related['title']); ?>" loading="lazy"></a></div>
                                    <div class="blog-title"><h3><a href="<?= e('/blog/' . rawurlencode($related['slug'])); ?>"><?= e($related['title']); ?></a></h3></div>
                                </article>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
                <?php endif; ?>

                <div id="comments" class="clearfix">
                    <div class="title-box"><h3><?= count($comments); ?> <strong><?= count($comments) === 1 ? 'Comment' : 'Comments'; ?></strong></h3></div>

                    <?php if (($_GET['comment'] ?? '') === 'success'): ?>
                        <div class="alert alert-success">Your comment was posted successfully.</div>
                    <?php endif; ?>
                    <?php if (!empty($commentError)): ?>
                        <div class="alert alert-danger"><?= e($commentError); ?></div>
                    <?php endif; ?>

                    <?php if ($comments): ?>
                        <ol class="commentlist list-unstyled clearfix">
                            <?php foreach ($comments as $comment): ?>
                                <li class="comment">
                                    <div class="comment-wrap">
                                        <div class="comment-author-avatar"><div class="comment-avatar-placeholder"><?= e(strtoupper(substr($comment['name'], 0, 1))); ?></div></div>
                                        <div class="comment-content">
                                            <div class="comment-meta"><h4><?= e($comment['name']); ?></h4><span><?= date('F j, Y \a\t g:i a', strtotime($comment['created_at'])); ?></span></div>
                                            <p><?= nl2br(e($comment['comment'])); ?></p>
                                        </div>
                                    </div>
                                </li>
                            <?php endforeach; ?>
                        </ol>
                    <?php else: ?>
                        <p>No comments yet. Be the first to comment.</p>
                    <?php endif; ?>

                    <div id="respond" class="clearfix">
                        <div class="title-box"><h3>Leave a <strong>Comment</strong></h3></div>
                        <div class="comment-form-box">
                            <form class="clearfix" method="post" id="commentform">
                                <p class="comment-notes">Your email address will not be published. Required fields are marked <span class="required">*</span></p>
                                <div class="form-group"><label>Comment<span class="required">*</span></label><textarea name="comment" rows="7" class="form-control" maxlength="3000" required></textarea></div>
                                <div class="form-group"><div class="row">
                                    <div class="col-sm-6"><label>Name<span class="required">*</span></label><input name="name" class="form-control" type="text" maxlength="100" required></div>
                                    <div class="col-sm-6"><label>Email<span class="required">*</span></label><input name="email" class="form-control" type="email" maxlength="100" required></div>
                                </div></div>
                                <div class="form-group"><button name="submit_comment" type="submit" class="btn btn-shutter-out-horizontal btn-lg">Submit Comment</button></div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <aside id="sidebar" class="col-md-4">
                <div class="widget-area">
                    <div class="widget">
                        <form action="blog.php" method="get">
                            <div class="input-group search-input-group"><input type="search" name="q" class="form-control" placeholder="Search articles"><span class="input-group-addon"><button type="submit"><i class="fa-solid fa-magnifying-glass"></i></button></span></div>
                        </form>
                    </div>

                    <div class="widget recent-posts">
                        <div class="title-box"><h3 class="widget-title">Recent <strong>Posts</strong></h3></div>
                        <ul class="list-unstyled">
                            <?php foreach ($recentPosts as $recent): ?>
                                <li class="clearfix">
                                    <div class="post-thumbnail"><a href="<?= e('/blog/' . rawurlencode($recent['slug'])); ?>"><img src="<?= e($recent['image']); ?>" alt="<?= e($recent['title']); ?>" loading="lazy"></a></div>
                                    <div class="post-content"><h3><a href="<?= e('/blog/' . rawurlencode($recent['slug'])); ?>"><?= e($recent['title']); ?></a></h3><div class="post-meta"><span><i class="fa-solid fa-calendar"></i> <?= date('M j', strtotime($recent['date'])); ?></span><span><i class="fa-solid fa-comments"></i> <?= (int) $recent['comment_count']; ?></span></div></div>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>

                    <div class="widget recent-comments">
                        <div class="title-box"><h3 class="widget-title">Recent <strong>Comments</strong></h3></div>
                        <?php if ($recentComments): ?>
                            <ul>
                                <?php foreach ($recentComments as $recentComment): ?>
                                    <li><a href="<?= e('/blog/' . rawurlencode($recentComment['slug'])); ?>#comments"><strong><?= e($recentComment['name']); ?>:</strong> <?= e(mb_strimwidth($recentComment['comment'], 0, 85, '...')); ?></a></li>
                                <?php endforeach; ?>
                            </ul>
                        <?php else: ?>
                            <p>No comments yet.</p>
                        <?php endif; ?>
                    </div>
                </div>
            </aside>
        </div>
    </div>
</div>

<?php include __DIR__ . '/footer.php'; ?>
