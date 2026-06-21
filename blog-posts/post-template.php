<?php
require_once __DIR__ . '/../includes/config.php';

// Get slug from filename or URL parameter
$slug = basename(__FILE__, '.php');
if (isset($_GET['slug'])) {
    $slug = $_GET['slug'];
}

// Fetch post from database
$stmt = $pdo->prepare("SELECT *, DATE_FORMAT(date, '%M %e, %Y') as formatted_date 
                        FROM blog_posts 
                        WHERE slug = ? AND status = 'published'");
$stmt->execute([$slug]);
$post = $stmt->fetch();

// If post not found, redirect to blog
if (!$post) {
    header('Location: ../blog.php');
    exit;
}

// Set page metadata from database
$pageTitle = $post['title'] . ' | Jhon Arzu-Gil';
$pageDescription = $post['excerpt'];
$pageKeywords = $post['tags'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, minimum-scale=1, maximum-scale=1"/>
    <title><?php echo e($pageTitle); ?></title>
    <meta name="description" content="<?php echo e($pageDescription); ?>">
    <meta name="keywords" content="<?php echo e($pageKeywords); ?>">
    <meta name="author" content="<?php echo e($post['author']); ?>">
    
    <!-- Open Graph -->
    <meta property="og:site_name" content="Jhon Arzu-Gil Portfolio">
    <meta property="og:type" content="article">
    <meta property="og:url" content="https://www.arzugil.com/blog-posts/<?php echo e($post['slug']); ?>.php">
    <meta property="og:title" content="<?php echo e($post['title']); ?>">
    <meta property="og:description" content="<?php echo e($post['excerpt']); ?>">
    <meta property="og:image" content="https://www.arzugil.com/<?php echo e($post['image']); ?>">
    <meta property="article:published_time" content="<?php echo e($post['date']); ?>">
    <meta property="article:author" content="<?php echo e($post['author']); ?>">
    <meta property="article:section" content="<?php echo e($post['category']); ?>">
    <meta property="article:tag" content="<?php echo e($post['tags']); ?>">

    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/fontawesome/all.min.css">
    <link rel="stylesheet" href="../css/style.css" type="text/css">
    <link rel="stylesheet" href="../css/responsive.css" type="text/css">
    
    <style>
        .blog-post-single { padding: 100px 0 80px; }
        .blog-post-single .post-header { margin-bottom: 40px; }
        .blog-post-single .post-title { font-size: 2.5rem; margin-bottom: 15px; }
        .blog-post-single .post-meta { color: #666; margin-bottom: 30px; }
        .blog-post-single .post-meta span { margin-right: 20px; }
        .blog-post-single .featured-image { width: 100%; max-height: 500px; object-fit: cover; border-radius: 8px; margin-bottom: 40px; }
        .blog-post-single .post-content { font-size: 1.1rem; line-height: 1.8; }
        .blog-post-single .post-content h2 { margin-top: 40px; margin-bottom: 20px; font-size: 1.8rem; }
        .blog-post-single .post-content h3 { margin-top: 30px; margin-bottom: 15px; font-size: 1.4rem; }
        .blog-post-single .post-content ul { margin-bottom: 20px; }
        .blog-post-single .post-content li { margin-bottom: 10px; }
        .blog-post-single .post-content code { background: #f4f4f4; padding: 2px 6px; border-radius: 3px; font-size: 0.9em; }
        .blog-post-single .post-content strong { color: #333; }
        
        .post-tags { margin-top: 40px; padding-top: 30px; border-top: 1px solid #eee; }
        .post-tags h4 { margin-bottom: 15px; }
        .post-tags .tag-link {
            display: inline-block;
            padding: 5px 14px;
            margin: 3px;
            background: #f0f0f0;
            color: #555;
            border-radius: 20px;
            font-size: 0.85rem;
            text-decoration: none;
            transition: all 0.2s;
        }
        .post-tags .tag-link:hover {
            background: #007bff;
            color: #fff;
        }
        
        .back-to-blog { margin-top: 40px; }
        
        .related-posts { margin-top: 60px; padding-top: 40px; border-top: 2px solid #eee; }
        .related-posts h3 { margin-bottom: 30px; }
        .related-posts .related-grid { display: grid; grid-template-columns: repeat(auto-fill, minmax(300px, 1fr)); gap: 20px; }
        .related-posts .related-card {
            background: #f8f9fa;
            border-radius: 8px;
            overflow: hidden;
            transition: transform 0.3s;
        }
        .related-posts .related-card:hover {
            transform: translateY(-3px);
        }
        .related-posts .related-card img {
            width: 100%;
            height: 160px;
            object-fit: cover;
        }
        .related-posts .related-card-content {
            padding: 20px;
        }
        .related-posts .related-card-content h4 {
            font-size: 1.1rem;
            margin-bottom: 10px;
        }
        .related-posts .related-card-content a {
            color: #333;
            text-decoration: none;
        }
        .related-posts .related-card-content a:hover {
            color: #007bff;
        }
        .related-posts .related-card-content .date {
            color: #888;
            font-size: 0.85rem;
        }
    </style>
</head>
<body>
    <?php include "../header.php"; ?>
    
    <section class="blog-post-single">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2">
                    <div class="post-header">
                        <div class="post-meta">
                            <span><i class="fas fa-user"></i> <?php echo e($post['author']); ?></span>
                            <span><i class="fas fa-calendar-alt"></i> <?php echo e($post['formatted_date']); ?></span>
                            <span><i class="fas fa-folder"></i> <?php echo e($post['category']); ?></span>
                        </div>
                        <h1 class="post-title"><?php echo e($post['title']); ?></h1>
                    </div>
                    
                    <img src="../<?php echo e($post['image']); ?>" alt="<?php echo e($post['title']); ?>" class="featured-image">
                    
                    <div class="post-content">
                        <?php echo $post['content']; ?>
                    </div>
                    
                    <?php if (!empty($post['tags'])): ?>
                    <div class="post-tags">
                        <h4><i class="fas fa-tags"></i> Tags</h4>
                        <?php foreach (array_map('trim', explode(',', $post['tags'])) as $tag): ?
                        <a href="../blog.php?tag=<?php echo urlencode(strtolower($tag)); ?>" class="tag-link"><?php echo e($tag); ?></a>
                        <?php endforeach; ?>
                    </div>
                    <?php endif; ?>
                    
                    <div class="back-to-blog">
                        <a href="../blog.php" class="btn btn-shutter-out-horizontal"><i class="fas fa-arrow-left"></i> Back to Blog</a>
                    </div>
                </div>
            </div>
            
            <!-- Related Posts -->
            <?php
            // Fetch related posts (same category, different post)
            $relatedStmt = $pdo->prepare("SELECT slug, title, image, DATE_FORMAT(date, '%M %e, %Y') as formatted_date 
                                           FROM blog_posts 
                                           WHERE category = ? AND slug != ? AND status = 'published'
                                           ORDER BY date DESC LIMIT 3");
            $relatedStmt->execute([$post['category'], $post['slug']]);
            $relatedPosts = $relatedStmt->fetchAll();
            
            if (!empty($relatedPosts)):
            ?>
            <div class="row related-posts">
                <div class="col-lg-8 offset-lg-2">
                    <h3>Related Posts in <?php echo e($post['category']); ?></h3>
                    <div class="related-grid">
                        <?php foreach ($relatedPosts as $related): ?>
                        <div class="related-card">
                            <a href="<?php echo e($related['slug']); ?>.php">
                                <img src="../<?php echo e($related['image']); ?>" alt="<?php echo e($related['title']); ?>">
                            </a>
                            <div class="related-card-content">
                                <h4><a href="<?php echo e($related['slug']); ?>.php"><?php echo e($related['title']); ?></a></h4>
                                <span class="date"><i class="fas fa-calendar-alt"></i> <?php echo e($related['formatted_date']); ?></span>
                            </div>
                        </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
            <?php endif; ?>
        </div>
    </section>
    
    <?php include "../footer.php"; ?>
</body>
</html>
