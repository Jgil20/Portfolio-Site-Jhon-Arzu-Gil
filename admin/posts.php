<?php
require_once __DIR__ . '/auth_check.php';

// Get all posts
$stmt = $pdo->query("SELECT id, slug, title, category, status, date, created_at 
                       FROM blog_posts 
                       ORDER BY created_at DESC");
$posts = $stmt->fetchAll();

$pageTitle = 'All Posts | Blog Admin';
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
        .admin-main { padding: 30px; }
        .content-card {
            background: #fff;
            border-radius: 10px;
            padding: 25px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
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
    </style>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar (same as dashboard) -->
            <div class="col-md-3 col-lg-2 admin-sidebar">
                <div class="logo">
                    <i class="fas fa-shield-alt fa-2x text-primary"></i>
                    <h5 class="mt-2">Blog Admin</h5>
                </div>
                <ul class="nav flex-column">
                    <li><a class="nav-link" href="dashboard.php"><i class="fas fa-tachometer-alt"></i> Dashboard</a></li>
                    <li><a class="nav-link active" href="posts.php"><i class="fas fa-file-alt"></i> All Posts</a></li>
                    <li><a class="nav-link" href="post-edit.php"><i class="fas fa-plus-circle"></i> New Post</a></li>
                    <li><a class="nav-link" href="categories.php"><i class="fas fa-folder"></i> Categories</a></li>
                    <li class="mt-4"><a class="nav-link" href="../blog.php" target="_blank"><i class="fas fa-external-link-alt"></i> View Blog</a></li>
                    <li><a class="nav-link" href="logout.php"><i class="fas fa-sign-out-alt"></i> Logout</a></li>
                </ul>
            </div>
            
            <div class="col-md-9 col-lg-10 admin-main">
                <div class="top-bar">
                    <h4>All Blog Posts</h4>
                    <a href="post-edit.php" class="btn btn-primary"><i class="fas fa-plus"></i> New Post</a>
                </div>
                
                <div class="content-card">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Title</th>
                                    <th>Category</th>
                                    <th>Status</th>
                                    <th>Date</th>
                                    <th>Created</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($posts as $post): ?>
                                <tr>
                                    <td><?php echo $post['id']; ?></td>
                                    <td><?php echo e($post['title']); ?></td>
                                    <td><span class="badge badge-info"><?php echo e($post['category']); ?></span></td>
                                    <td>
                                        <span class="status-badge status-<?php echo e($post['status']); ?>">
                                            <?php echo ucfirst(e($post['status'])); ?>
                                        </span>
                                    </td>
                                    <td><?php echo e($post['date']); ?></td>
                                    <td><?php echo e($post['created_at']); ?></td>
                                    <td>
                                        <a href="post-edit.php?slug=<?php echo e($post['slug']); ?>" class="btn btn-sm btn-primary"><i class="fas fa-edit"></i></a>
                                        <a href="../blog-posts/<?php echo e($post['slug']); ?>.php" target="_blank" class="btn btn-sm btn-info"><i class="fas fa-eye"></i></a>
                                        <a href="post-delete.php?slug=<?php echo e($post['slug']); ?>" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this post?')"><i class="fas fa-trash"></i></a>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
