<?php
require_once __DIR__ . '/../includes/config.php';

$pageTitle = 'Why Your Website is Slow & How to Fix It | Jhon Arzu-Gil';
$pageDescription = 'Practical tips to diagnose and fix slow website performance issues that hurt user experience and SEO.';
$pageKeywords = 'website speed, performance optimization, core web vitals, page speed';

$post = [
    'title' => 'Why Your Website is Slow & How to Fix It',
    'date' => 'May 8, 2026',
    'author' => 'Jhon Arzu-Gil',
    'category' => 'Web Development',
    'image' => '../images/blog/thumb/seospeed.webp',
    'excerpt' => 'A slow website kills conversions and hurts your Google rankings. Here\'s a practical guide to diagnosing and fixing performance issues.',
    'content' => '
        <p>A slow website kills conversions and hurts your Google rankings. If your pages take more than 3 seconds to load, you\'re losing visitors—period. Here\'s a practical guide to diagnosing and fixing the most common performance issues.</p>
        
        <h2>Diagnose First</h2>
        <p>Before fixing anything, you need data. Use these free tools:</p>
        <ul>
            <li><strong>Google PageSpeed Insights:</strong> Core Web Vitals scores and specific recommendations</li>
            <li><strong>GTmetrix:</strong> Waterfall charts showing what loads when</li>
            <li><strong>WebPageTest:</strong> Detailed breakdowns from multiple locations and devices</li>
            <li><strong>Chrome DevTools:</strong> Network tab and Lighthouse audits</li>
        </ul>
        
        <h2>Common Culprits & Fixes</h2>
        
        <h3>1. Unoptimized Images</h3>
        <p>Images are usually the biggest files on a page. Fix them by:</p>
        <ul>
            <li>Compressing with tools like TinyPNG or Squoosh</li>
            <li>Using modern formats: WebP or AVIF (with JPEG fallbacks)</li>
            <li>Implementing lazy loading for below-the-fold images</li>
            <li>Serving responsive images with <code>srcset</code></li>
        </ul>
        
        <h3>2. Render-Blocking Resources</h3>
        <p>CSS and JavaScript that block the page from rendering:</p>
        <ul>
            <li>Inline critical CSS and load the rest asynchronously</li>
            <li>Use <code>async</code> or <code>defer</code> for non-critical JavaScript</li>
            <li>Minify and combine CSS/JS files</li>
        </ul>
        
        <h3>3. Slow Server Response</h3>
        <p>If your server takes forever to respond, nothing else matters:</p>
        <ul>
            <li>Upgrade your hosting (shared hosting is often the bottleneck)</li>
            <li>Enable caching (browser cache, server cache, CDN cache)</li>
            <li>Optimize database queries if you\'re using a CMS</li>
            <li>Use a CDN for static assets</li>
        </ul>
        
        <h3>4. Excessive Third-Party Scripts</h3>
        <p>Analytics, ads, chat widgets, social buttons—they all add up:</p>
        <ul>
            <li>Audit which scripts you actually need</li>
            <li>Load non-essential scripts after the page is interactive</li>
            <li>Self-host critical fonts instead of Google Fonts API (sometimes)</li>
        </ul>
        
        <h2>Quick Wins</h2>
        <p>If you only have an hour, do these:</p>
        <ol>
            <li>Compress all images</li>
            <li>Enable Gzip or Brotli compression on your server</li>
            <li>Set up browser caching</li>
            <li>Minify CSS and JavaScript</li>
            <li>Remove unused CSS/JS</li>
        </ol>
        
        <p><em>Want a professional speed audit? <a href="../index.php#contact">I\'ll analyze your site</a> and give you a prioritized fix list.</em></p>
    '
];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, minimum-scale=1, maximum-scale=1"/>
    <title><?php echo e($pageTitle); ?></title>
    <meta name="description" content="<?php echo e($pageDescription); ?>">
    <meta name="keywords" content="<?php echo e($pageKeywords); ?>">
    <meta name="author" content="Jhon Arzu-Gil">
    
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
        .back-to-blog { margin-top: 40px; }
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
                            <span><i class="fas fa-calendar-alt"></i> <?php echo e($post['date']); ?></span>
                            <span><i class="fas fa-folder"></i> <?php echo e($post['category']); ?></span>
                        </div>
                        <h1 class="post-title"><?php echo e($post['title']); ?></h1>
                    </div>
                    
                    <img src="<?php echo e($post['image']); ?>" alt="<?php echo e($post['title']); ?>" class="featured-image">
                    
                    <div class="post-content">
                        <?php echo $post['content']; ?>
                    </div>
                    
                    <div class="back-to-blog">
                        <a href="../blog.php" class="btn btn-shutter-out-horizontal"><i class="fas fa-arrow-left"></i> Back to Blog</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <?php include "../footer.php"; ?>
</body>
</html>
