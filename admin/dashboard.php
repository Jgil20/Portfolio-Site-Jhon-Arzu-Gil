<?php
// Check admin authentication
require_once __DIR__ . '/auth_check.php';

// Get statistics
$postCount = $pdo->query("SELECT COUNT(*) FROM blog_posts")->fetchColumn();
$publishedCount = $pdo->query("SELECT COUNT(*) FROM blog_posts WHERE status = 'published'")->fetchColumn();
$draftCount = $pdo->query("SELECT COUNT(*) FROM blog_posts WHERE status = 'draft'")->fetchColumn();
$categoryCount = $pdo->query("SELECT COUNT(*) FROM blog_categories")->fetchColumn();

// Get recent posts
$recentPosts = $pdo->query("SELECT slug, title, category, status, date 
                              FROM blog_posts 
                              ORDER BY created_at DESC LIMIT 5")->fetchAll();

$pageTitle = 'Dashboard | Blog Admin';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo e($pageTitle); ?></title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/fontawesome/all.min.css">
    <style>
        body { background: #f5f6fa; }
        
        .admin-sidebar {
            background: #2c3e50;
            min-height: 100vh;
            color: #fff;
            padding: 20px 0;
        }
        .admin-sidebar .logo {
            text-align: center;
            padding: 20px;
            border-bottom: 1px solid rgba(255,255,255,0.1);
            margin-bottom: 20px;
        }
        .admin-sidebar .logo i {
            font-size: 2.5rem;
            color: #3498db;
        }
        .admin-sidebar .logo h4 {
            margin-top: 10px;
            font-size: 1.2rem;
        }
        .admin-sidebar .nav-link {
            color: rgba(255,255,255,0.8);
            padding: 12px 20px;
            border-left: 3px solid transparent;
            transition: all 0.3s;
        }
        .admin-sidebar .nav-link:hover,
        .admin-sidebar .nav-link.active {
            color: #fff;
            background: rgba(255,255,255,0.1);
            border-left-color: #3498db;
        }
        .admin-sidebar .nav-link i {
            width: 25px;
            margin-right: 10px;
        }
        
        .admin-main {
            padding: 30px;
        }
        .stats-card {
            background: #fff;
            border-radius: 10px;
            padding: 25px;
            margin-bottom: 30px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
        }
        .stats-card .icon {
            font-size: 2.5rem;
            margin-bottom: 15px;
        }
        .stats-card .number {
            font-size: 2rem;
            font-weight: 700;
            margin-bottom: 5px;
        }
        .stats-card .label {
            color: #666;
            font-size: 0.9rem;
        }
        .stats-card.total { border-top: 4px solid #3498db; }
        .stats-card.published { border-top: 4px solid #2ecc71; }
        .stats-card.draft { border-top: 4px solid #f39c12; }
        .stats-card.categories { border-top: 4px solid #9b59b6; }
        
        .content-card {
            background: #fff;
            border-radius: 10px;
            padding: 25px;
            margin-bottom: 30px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
        }
        .content-card h3 {
            margin-bottom: 20px;
            padding-bottom: 10px;
            border-bottom: 2px solid #eee;
        }
        
        .table-actions a {
            margin-right: 8px;
            color: #666;
        }
        .table-actions a:hover {
            color: #007bff;
        }
        
        .status-badge {
            padding: 4px 10px;
            border-radius: 12px;
            font-size: 0.8rem;
            font-weight: 600;
        }
        .status-published { background: #d4edda; color: #155724; }
        .status-draft { background: #fff3cd; color: #856404; }
        .status-archived { background: #f8d7da; color: #721c24; }
        
        .top-bar {
            background: #fff;
            padding: 15px 30px;
            margin: -30px -30px 30px;
            border-bottom: 1px solid #eee;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .user-info {
            display: flex;
            align-items: center;
            gap: 10px;
        }
        .user-info img {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: #3498db;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #fff;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <div class="col-md-3 col-lg-2 admin-sidebar">
                <div class="logo">
                    <i class="fas fa-shield-alt"></i>
                    <h4>Blog Admin</h4>
                </div>
                
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link active" href="dashboard.php">
                            <i class="fas fa-tachometer-alt"></i> Dashboard
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="posts.php">
                            <i class="fas fa-file-alt"></i> All Posts
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="post-edit.php">
                            <i class="fas fa-plus-circle"></i> New Post
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="categories.php">
                            <i class="fas fa-folder"></i> Categories
                        </a>
                    </li>
                    <li class="nav-item mt-4">
                        <a class="nav-link" href="../blog.php" target="_blank">
                            <i class="fas fa-external-link-alt"></i> View Blog
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="logout.php">
                            <i class="fas fa-sign-out-alt"></i> Logout
                        </a>
                    </li>
                </ul>
            </div>
            
            <!-- Main Content -->
            <div class="col-md-9 col-lg-10 admin-main">
                <div class="top-bar">
                    <h4>Dashboard</h4>
                    <div class="user-info">
                        <div class="user-avatar" style="width: 40px; height: 40px; border-radius: 50%; background: #3498db; display: flex; align-items: center; justify-content: center; color: #fff; font-weight: bold;">
                            <?php echo strtoupper(substr($_SESSION['admin_name'], 0, 1)); ?>
                        </div>
                        <div>
                            <div><strong><?php echo e($_SESSION['admin_name']); ?></strong></div>
                            <div style="font-size: 0.85rem; color: #666;"><?php echo e($_SESSION['admin_role']); ?></div>
                        </div>
                    </div>
                </div>
                
                <!-- Stats Cards -->
                <div class="row">
                    <div class="col-md-3">
                        <div class="stats-card total">
                            <div class="icon text-primary"><i class="fas fa-file-alt"></i></div>
                            <div class="number"><?php echo $postCount; ?></div>
                            <div class="label">Total Posts</div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="stats-card published">
                            <div class="icon text-success"><i class="fas fa-check-circle"></i></div>
                            <div class="number"><?php echo $publishedCount; ?></div>
                            <div class="label">Published</div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="stats-card draft">
                            <div class="icon text-warning"><i class="fas fa-edit"></i></div>
                            <div class="number"><?php echo $draftCount; ?></div>
                            <div class="label">Drafts</div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="stats-card categories">
                            <div class="icon" style="color: #9b59b6;"><i class="fas fa-folder"></i></div>
                            <div class="number"><?php echo $categoryCount; ?></div>
                            <div class="label">Categories</div>
                        </div>
                    </div>
                </div>
                
                <!-- Recent Posts -->
                <div class="content-card">
                    <h3><i class="fas fa-clock"></i> Recent Posts</h3>
                    
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Title</th>
                                    <th>Category</th>
                                    <th>Status</th>
                                    <th>Date</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($recentPosts as $post): ?>
                                <tr>
                                    <td><?php echo e($post['title']); ?></td>
                                    <td><span class="badge badge-info"><?php echo e($post['category']); ?></span></td>
                                    <td>
                                        <span class="status-badge status-<?php echo e($post['status']); ?>">
                                            <?php echo ucfirst(e($post['status'])); ?>
                                        </span>
                                    </td>
                                    <td><?php echo e($post['date']); ?></td>
                                    <td class="table-actions">
                                        <a href="post-edit.php?slug=<?php echo e($post['slug']); ?>" title="Edit"><i class="fas fa-edit"></i></a>
                                        <a href="../blog-posts/<?php echo e($post['slug']); ?>.php" target="_blank" title="View"><i class="fas fa-eye"></i></a>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                    
                    <div class="text-right">
                        <a href="posts.php" class="btn btn-primary">View All Posts <i class="fas fa-arrow-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <script src="../js/jquery.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
</body>
</html>
