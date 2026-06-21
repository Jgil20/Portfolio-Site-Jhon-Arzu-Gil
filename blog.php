<?php
require_once __DIR__ . '/includes/config.php';

if (!function_exists('e')) {
    function e($value): string
    {
        return htmlspecialchars((string) $value, ENT_QUOTES, 'UTF-8');
    }
}

$pageTitle = 'Blog | Jhon Arzu-Gil - Tech Insights & Tutorials';
$pageDescription = 'Read the latest insights on cloud computing, web development, AI, SEO, and business technology from Jhon Arzu-Gil.';
$pageKeywords = 'tech blog, cloud computing, web development, AI, SEO, business technology';

$postsPerPage = 6;
$currentPage = max(1, filter_input(INPUT_GET, 'page', FILTER_VALIDATE_INT) ?: 1);
$activeCategory = trim($_GET['category'] ?? 'all');
$activeTag = strtolower(trim($_GET['tag'] ?? ''));
$searchQuery = trim($_GET['search'] ?? '');

$whereConditions = ['`status` = :status'];
$queryParams = [':status' => 'published'];

if ($activeCategory !== 'all' && $activeCategory !== '') {
    $whereConditions[] = '`category` = :category';
    $queryParams[':category'] = $activeCategory;
}

if ($activeTag !== '') {
    $whereConditions[] = 'LOWER(`tags`) LIKE :tag';
    $queryParams[':tag'] = '%' . $activeTag . '%';
}

if ($searchQuery !== '') {
    $whereConditions[] = '(`title` LIKE :search_title OR `excerpt` LIKE :search_excerpt OR `content` LIKE :search_content OR `tags` LIKE :search_tags)';
    $searchParam = '%' . $searchQuery . '%';
    $queryParams[':search_title'] = $searchParam;
    $queryParams[':search_excerpt'] = $searchParam;
    $queryParams[':search_content'] = $searchParam;
    $queryParams[':search_tags'] = $searchParam;
}

$whereClause = 'WHERE ' . implode(' AND ', $whereConditions);

$countSql = "SELECT COUNT(*) FROM `blog_posts` {$whereClause}";
$countStmt = $pdo->prepare($countSql);
$countStmt->execute($queryParams);
$totalPosts = (int) $countStmt->fetchColumn();

$totalPages = max(1, (int) ceil($totalPosts / $postsPerPage));
$currentPage = min($currentPage, $totalPages);
$offset = ($currentPage - 1) * $postsPerPage;

$sql = "SELECT `id`, `slug`, `title`, DATE_FORMAT(`date`, '%M %e, %Y') AS formatted_date,
               `author`, `category`, `tags`, `image`, `excerpt`
        FROM `blog_posts`
        {$whereClause}
        ORDER BY `date` DESC
        LIMIT :limit OFFSET :offset";

$stmt = $pdo->prepare($sql);
foreach ($queryParams as $key => $value) {
    $stmt->bindValue($key, $value, PDO::PARAM_STR);
}
$stmt->bindValue(':limit', $postsPerPage, PDO::PARAM_INT);
$stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
$stmt->execute();
$posts = $stmt->fetchAll();

$catStmt = $pdo->query("SELECT DISTINCT `category` FROM `blog_posts` WHERE `status` = 'published' AND `category` IS NOT NULL AND `category` <> '' ORDER BY `category`");
$categories = $catStmt->fetchAll(PDO::FETCH_COLUMN);

$tagStmt = $pdo->query("SELECT `tags` FROM `blog_posts` WHERE `status` = 'published' AND `tags` IS NOT NULL AND `tags` <> ''");
$allTags = [];
while ($row = $tagStmt->fetch()) {
    foreach (array_map('trim', explode(',', (string) $row['tags'])) as $tag) {
        if ($tag !== '') {
            $allTags[] = strtolower($tag);
        }
    }
}
$allTags = array_values(array_unique($allTags));
sort($allTags);

function buildUrl(array $params): string
{
    $query = [];

    if (!empty($params['category']) && $params['category'] !== 'all') {
        $query['category'] = $params['category'];
    }
    if (!empty($params['tag'])) {
        $query['tag'] = $params['tag'];
    }
    if (!empty($params['search'])) {
        $query['search'] = $params['search'];
    }
    if (!empty($params['page']) && (int) $params['page'] > 1) {
        $query['page'] = (int) $params['page'];
    }

    return empty($query) ? 'blog.php' : 'blog.php?' . http_build_query($query);
}

function postUrl(array $post): string
{
    return '/blog/' . rawurlencode((string) $post['slug']);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta content="IE=edge" http-equiv="X-UA-Compatible">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title><?= e($pageTitle); ?></title>
    <meta name="description" content="<?= e($pageDescription); ?>">
    <meta name="keywords" content="<?= e($pageKeywords); ?>">
    <meta name="author" content="Jhon Arzu-Gil">
    <link rel="canonical" href="https://www.arzugil.com/blog.php">

    <meta property="og:site_name" content="Jhon Arzu-Gil Portfolio">
    <meta property="og:type" content="website">
    <meta property="og:url" content="https://www.arzugil.com/blog.php">
    <meta property="og:title" content="<?= e($pageTitle); ?>">
    <meta property="og:description" content="<?= e($pageDescription); ?>">
    <meta property="og:image" content="https://www.arzugil.com/images/portfoliopict.png">

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/fontawesome/all.min.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/style.css" type="text/css">
    <link rel="stylesheet" href="css/responsive.css" type="text/css">
     <link rel="stylesheet" href="style.css" type="text/css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0&family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@48,400,1,0">
    <style>
        .blog-page { padding: 120px 0 80px; }
        .blog-page .page-title { text-align: center; margin-bottom: 20px; }
        .blog-page .page-subtitle { text-align: center; color: #666; margin-bottom: 40px; font-size: 1.1rem; }
        .search-container { max-width: 600px; margin: 0 auto 40px; position: relative; }
        .search-container input { width: 100%; padding: 15px 50px 15px 20px; border: 2px solid #e0e0e0; border-radius: 50px; font-size: 1rem; }
        .search-container button { position: absolute; right: 5px; top: 50%; transform: translateY(-50%); background: #007bff; color: #fff; border: none; border-radius: 50%; width: 40px; height: 40px; cursor: pointer; }
        .blog-grid { display: grid; grid-template-columns: repeat(auto-fill, minmax(350px, 1fr)); gap: 30px; }
        .blog-card { background: #fff; border-radius: 8px; overflow: hidden; box-shadow: 0 2px 15px rgba(0,0,0,.1); transition: transform .3s ease, box-shadow .3s ease; }
        .blog-card:hover { transform: translateY(-5px); box-shadow: 0 5px 25px rgba(0,0,0,.15); }
        .blog-card .card-image { width: 100%; height: 220px; object-fit: cover; }
        .blog-card .card-content { padding: 25px; }
        .blog-card .card-meta { font-size: .85rem; color: #888; margin-bottom: 12px; }
        .blog-card .card-meta span { margin-right: 15px; }
        .blog-card .card-meta i { margin-right: 5px; color: #007bff; }
        .blog-card .card-title { font-size: 1.3rem; margin-bottom: 12px; line-height: 1.4; }
        .blog-card .card-title a { color: #333; text-decoration: none; }
        .blog-card .card-excerpt { color: #666; line-height: 1.6; margin-bottom: 15px; }
        .category-badge { display: inline-block; background: #007bff; color: #fff; padding: 4px 12px; border-radius: 20px; font-size: .75rem; margin-bottom: 10px; }
        .tags-row { margin-top: 10px; }
        .tag-link { display: inline-block; padding: 4px 11px; margin: 3px; background: #f0f0f0; color: #555; border-radius: 15px; font-size: .78rem; text-decoration: none; }
        .category-filter, .tag-cloud, .post-count, .pagination-container, .active-filters { text-align: center; }
        .category-filter { margin-bottom: 30px; }
        .filter-btn { display: inline-block; padding: 10px 24px; margin: 5px; border: 2px solid #007bff; border-radius: 30px; color: #007bff; text-decoration: none; font-weight: 600; }
        .filter-btn.active, .filter-btn:hover, .tag-link.active, .tag-link:hover { background: #007bff; color: #fff; }
        .tag-cloud { margin-bottom: 40px; padding: 20px; background: #f8f9fa; border-radius: 8px; }
        .active-filters { margin-bottom: 30px; padding: 15px; background: #e7f3ff; border-radius: 8px; }
        .active-filters span { display: inline-block; margin: 5px; padding: 5px 15px; background: #007bff; color: #fff; border-radius: 20px; }
        .active-filters span a { color: #fff; margin-left: 8px; }
        .pagination-container { margin-top: 50px; }
        .pagination { display: inline-flex; list-style: none; padding: 0; margin: 0; flex-wrap: wrap; justify-content: center; }
        .pagination li { margin: 5px; }
        .pagination li a, .pagination li span { display: inline-block; padding: 10px 18px; border: 2px solid #007bff; border-radius: 8px; color: #007bff; text-decoration: none; font-weight: 600; }
        .pagination li.active span { background: #007bff; color: #fff; }
        .pagination li.disabled span { opacity: .5; }
        .no-results { text-align: center; padding: 60px 20px; color: #666; }
        @media (max-width: 768px) { .blog-grid { grid-template-columns: 1fr; } }
    </style>
</head>
<body>
	<header id="header" class="header fixed-top headerbg-darkcolor nav-container">
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
					<!-- Navigation Menu -->
					<nav class="navbar navbar-expand-lg navbar-light mgsbsnavbar">
						<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation" onclick="mgsChangeMenubar(this)">
							<span class="menubar1"></span>
							<span class="menubar2"></span>
							<span class="menubar3"></span>
						</button>
						<a class="navbar-brand d-md-block d-lg-none" href="https://cloudtechnologycomputing.com">
							<img class="logo logo-color" src="images/logo.avif" alt="Jhon Arzu-Gil">
				            <img class="logo logo-white" src="images/logo.avif" alt="Jhon Arzu-Gil">
						</a>
						<div class="collapse navbar-collapse" id="navbarSupportedContent">
							<a class="navbar-brand d-none d-sm-none d-md-none d-lg-block" href="https://cloudtechnologycomputing.com">
				            <img class="logo logo-color" src="images/logo.avif" alt="Jhon Arzu-Gil">
				            <img class="logo logo-white" src="images/logo.avif" alt="Jhon Arzu-Gil">
							</a>
							<ul class="navbar-nav ml-auto">
								<li class="nav-item">
									<a class="nav-link active" href="/">Home</a>

								</li>
								<li class="nav-item">
									<a class="nav-link" href="/#about">About</a>
								</li>
								<li class="nav-item">
									<a class="nav-link" href="https://www.cloudtechnologycomputing.com">Tech-Startup</a>
								</li>
								<li class="nav-item">
									<a class="nav-link" href="/#service">Service</a>
								</li>
								<li class="nav-item">
									<a class="nav-link" href="/#pricing">Pricing</a>
								</li>
								<li class="nav-item">
									<a class="nav-link" href="/#portfolio">Portfolio</a>
								</li>
								<li class="nav-item">
									<a class="nav-link" href="blog.php">Blog</a>
								</li>
								<li class="nav-item">
									<a class="nav-link" href="/#contact">Contact</a>
								</li>
							</ul>
						</div>
					</nav>
					<!-- end Navigation Menu -->
				</div><!--End col-sm-12 -->
			</div><!-- end row -->
		</div><!--End container -->
	</header>
<section class="blog-page">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="title-wrap">
                    <div class="title-border-svg">
                        <h1 class="section-title page-title">Latest <span>Blog Posts</span></h1>
                        <svg height="76" width="100%" xmlns="http://www.w3.org/2000/svg"><rect class="title-border-svg-shape" height="76" width="100%"/></svg>
                    </div>
                </div>
                <p class="page-subtitle">Insights on cloud computing, web development, AI, SEO, and business technology.</p>
            </div>
        </div>

        <form class="search-container" method="get" action="blog.php">
            <input type="search" name="search" placeholder="Search blog posts..." value="<?= e($searchQuery); ?>">
            <?php if ($activeCategory !== 'all'): ?><input type="hidden" name="category" value="<?= e($activeCategory); ?>"><?php endif; ?>
            <?php if ($activeTag !== ''): ?><input type="hidden" name="tag" value="<?= e($activeTag); ?>"><?php endif; ?>
            <button type="submit" aria-label="Search"><i class="fas fa-search"></i></button>
        </form>

        <?php if ($searchQuery !== '' || $activeCategory !== 'all' || $activeTag !== ''): ?>
            <div class="active-filters">
                Filters:
                <?php if ($searchQuery !== ''): ?>
                    <span>Search: "<?= e($searchQuery); ?>" <a href="<?= e(buildUrl(['category' => $activeCategory, 'tag' => $activeTag])); ?>">×</a></span>
                <?php endif; ?>
                <?php if ($activeCategory !== 'all'): ?>
                    <span>Category: <?= e($activeCategory); ?> <a href="<?= e(buildUrl(['tag' => $activeTag, 'search' => $searchQuery])); ?>">×</a></span>
                <?php endif; ?>
                <?php if ($activeTag !== ''): ?>
                    <span>Tag: <?= e(ucwords($activeTag)); ?> <a href="<?= e(buildUrl(['category' => $activeCategory, 'search' => $searchQuery])); ?>">×</a></span>
                <?php endif; ?>
                <a href="blog.php">Clear All</a>
            </div>
        <?php endif; ?>

        <div class="category-filter">
            <a href="<?= e(buildUrl(['tag' => $activeTag, 'search' => $searchQuery])); ?>" class="filter-btn <?= $activeCategory === 'all' ? 'active' : ''; ?>">All Posts</a>
            <?php foreach ($categories as $category): ?>
                <a href="<?= e(buildUrl(['category' => $category, 'search' => $searchQuery])); ?>" class="filter-btn <?= $activeCategory === $category ? 'active' : ''; ?>"><?= e($category); ?></a>
            <?php endforeach; ?>
        </div>

        <?php if (!empty($allTags)): ?>
            <div class="tag-cloud">
                <h4><i class="fas fa-tags"></i> Popular Tags</h4>
                <?php foreach ($allTags as $tag): ?>
                    <a href="<?= e(buildUrl(['tag' => $tag, 'category' => $activeCategory, 'search' => $searchQuery])); ?>" class="tag-link <?= $activeTag === $tag ? 'active' : ''; ?>"><?= e(ucwords($tag)); ?></a>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>

        <p class="post-count">Showing <?= count($posts); ?> of <?= $totalPosts; ?> post<?= $totalPosts === 1 ? '' : 's'; ?></p>

        <div class="blog-grid">
            <?php if (empty($posts)): ?>
                <div class="no-results" style="grid-column:1/-1;">
                    <i class="fas fa-search"></i>
                    <h3>No posts found</h3>
                    <p>Try adjusting your search or filters.</p>
                    <a href="blog.php" class="btn btn-shutter-out-horizontal">View All Posts</a>
                </div>
            <?php else: ?>
                <?php foreach ($posts as $post): ?>
                    <article class="blog-card">
                        <a href="<?= e(postUrl($post)); ?>">
                            <img src="<?= e($post['image'] ?: 'images/blog/default-blog.webp'); ?>" alt="<?= e($post['title']); ?>" class="card-image" loading="lazy">
                        </a>
                        <div class="card-content">
                            <span class="category-badge"><?= e($post['category']); ?></span>
                            <div class="card-meta">
                                <span><i class="fas fa-user"></i><?= e($post['author']); ?></span>
                                <span><i class="fas fa-calendar-alt"></i><?= e($post['formatted_date']); ?></span>
                            </div>
                            <h2 class="card-title"><a href="<?= e(postUrl($post)); ?>"><?= e($post['title']); ?></a></h2>
                            <p class="card-excerpt"><?= e($post['excerpt']); ?></p>
                            <?php if (!empty($post['tags'])): ?>
                                <div class="tags-row">
                                    <?php foreach (array_map('trim', explode(',', $post['tags'])) as $tag): ?>
                                        <?php if ($tag !== ''): ?><a href="<?= e(buildUrl(['tag' => strtolower($tag), 'category' => $activeCategory])); ?>" class="tag-link"><?= e($tag); ?></a><?php endif; ?>
                                    <?php endforeach; ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    </article>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>

        <?php if ($totalPages > 1): ?>
            <div class="pagination-container">
                <ul class="pagination">
                    <?php if ($currentPage > 1): ?>
                        <li><a href="<?= e(buildUrl(['page' => $currentPage - 1, 'category' => $activeCategory, 'tag' => $activeTag, 'search' => $searchQuery])); ?>"><i class="fas fa-chevron-left"></i></a></li>
                    <?php else: ?>
                        <li class="disabled"><span><i class="fas fa-chevron-left"></i></span></li>
                    <?php endif; ?>

                    <?php
                    $startPage = max(1, $currentPage - 2);
                    $endPage = min($totalPages, $currentPage + 2);
                    for ($i = $startPage; $i <= $endPage; $i++):
                    ?>
                        <?php if ($i === $currentPage): ?>
                            <li class="active"><span><?= $i; ?></span></li>
                        <?php else: ?>
                            <li><a href="<?= e(buildUrl(['page' => $i, 'category' => $activeCategory, 'tag' => $activeTag, 'search' => $searchQuery])); ?>"><?= $i; ?></a></li>
                        <?php endif; ?>
                    <?php endfor; ?>

                    <?php if ($currentPage < $totalPages): ?>
                        <li><a href="<?= e(buildUrl(['page' => $currentPage + 1, 'category' => $activeCategory, 'tag' => $activeTag, 'search' => $searchQuery])); ?>"><i class="fas fa-chevron-right"></i></a></li>
                    <?php else: ?>
                        <li class="disabled"><span><i class="fas fa-chevron-right"></i></span></li>
                    <?php endif; ?>
                </ul>
            </div>
        <?php endif; ?>
    </div>
</section>

<?php include __DIR__ . '/footer.php'; ?>
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>
