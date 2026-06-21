<?php
require_once __DIR__ . '/../includes/config.php';

$pageTitle = 'How I Built My Portfolio Site | Jhon Arzu-Gil';
$pageDescription = 'A behind-the-scenes look at the technologies and decisions that went into building this portfolio website.';
$pageKeywords = 'portfolio, web development, PHP, cloud, full stack';

$post = [
    'title' => 'How I Built My Portfolio Site: Tech Stack & Decisions',
    'date' => 'May 15, 2026',
    'author' => 'Jhon Arzu-Gil',
    'category' => 'Web Development',
    'image' => '../images/blog/thumb/CertificationLayoutArzugilpng.avif',
    'excerpt' => 'A behind-the-scenes look at the technologies, design choices, and lessons learned while building this portfolio website.',
    'content' => '
        <p>Every developer needs a portfolio that showcases their skills. But a portfolio is also a project in itself—a chance to demonstrate what you can do. Here\'s the story of how I built mine, the technologies I chose, and why.</p>
        
        <h2>The Tech Stack</h2>
        <p>I built this site with a practical, proven stack:</p>
        <ul>
            <li><strong>PHP:</strong> Server-side rendering with reusable templates (header.php, footer.php)</li>
            <li><strong>Bootstrap:</strong> Responsive grid and components that work on all devices</li>
            <li><strong>Custom CSS:</strong> The Shiny template provides a solid foundation with parallax effects, smooth animations, and professional styling</li>
            <li><strong>JavaScript/jQuery:</strong> Interactive elements, carousel, lightbox, and the AI chatbot integration</li>
            <li><strong>MySQL:</strong> Backend database for contact forms and future dynamic features</li>
        </ul>
        
        <h2>Key Features</h2>
        <ul>
            <li><strong>AI Chatbot:</strong> Integrated with Google Gemini API for real-time visitor assistance</li>
            <li><strong>PayPal Integration:</strong> Accept payments for services directly on the site</li>
            <li><strong>Responsive Design:</strong> Looks great on phones, tablets, and desktops</li>
            <li><strong>SEO Optimized:</strong> Meta tags, structured data, fast loading times</li>
            <li><strong>Performance:</strong> Optimized images (WebP/AVIF), minified assets, CDN-ready</li>
        </ul>
        
        <h2>Design Decisions</h2>
        <p>I chose a dark theme with vibrant accents because it feels modern and professional. The parallax backgrounds and particle effects add visual interest without being distracting. Every section serves a purpose: services, portfolio, testimonials, pricing, and contact.</p>
        
        <h2>Lessons Learned</h2>
        <ul>
            <li>Keep it simple—visitors should understand what you offer in 5 seconds</li>
            <li>Performance matters more than fancy animations</li>
            <li>Mobile-first is not optional anymore</li>
            <li>Regular updates show you\'re active and engaged</li>
        </ul>
        
        <p><em>Building your own portfolio? <a href="../index.php#contact">I can help</a> you create something that stands out.</em></p>
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
        .blog-post-single .post-content ul { margin-bottom: 20px; }
        .blog-post-single .post-content li { margin-bottom: 10px; }
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
