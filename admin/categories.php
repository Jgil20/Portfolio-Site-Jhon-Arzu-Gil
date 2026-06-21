<?php
require_once __DIR__ . '/auth_check.php';

$message = '';
$error = '';

// Handle new category
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'add') {
    $name = trim($_POST['name'] ?? '');
    $slug = trim($_POST['slug'] ?? '');
    $description = trim($_POST['description'] ?? '');
    
    if (empty($name)) {
        $error = 'Category name is required.';
    } else {
        if (empty($slug)) {
            $slug = strtolower(preg_replace('/[^a-z0-9]+/', '-', $name));
        }
        
        try {
            $stmt = $pdo->prepare("INSERT INTO blog_categories (name, slug, description) VALUES (?, ?, ?)");
            $stmt->execute([$name, $slug, $description]);
            $message = 'Category added successfully!';
        } catch (PDOException $e) {
            $error = 'Category already exists or invalid slug.';
        }
    }
}

// Handle delete
if (isset($_GET['delete'])) {
    $catId = intval($_GET['delete']);
    $stmt = $pdo->prepare("DELETE FROM blog_categories WHERE id = ?");
    $stmt->execute([$catId]);
    $message = 'Category deleted.';
}

// Get all categories with post counts
$categories = $pdo->query("SELECT c.*, COUNT(p.id) as post_count 
                             FROM blog_categories c 
                             LEFT JOIN blog_posts p ON c.name = p.category 
                             GROUP BY c.id 
                             ORDER BY c.name")->fetchAll();

$pageTitle = 'Categories | Blog Admin';
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
            margin-bottom: 30px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
        }
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
            <!-- Sidebar -->
            <div class="col-md-3 col-lg-2 admin-sidebar">
                <div class="logo">
                    <i class="fas fa-shield-alt fa-2x text-primary"></i>
                    <h5 class="mt-2">Blog Admin</h5>
                </div>
                <ul class="nav flex-column">
                    <li><a class="nav-link" href="dashboard.php"><i class="fas fa-tachometer-alt"></i> Dashboard</a></li>
                    <li><a class="nav-link" href="posts.php"><i class="fas fa-file-alt"></i> All Posts</a></li>
                    <li><a class="nav-link" href="post-edit.php"><i class="fas fa-plus-circle"></i> New Post</a></li>
                    <li><a class="nav-link active" href="categories.php"><i class="fas fa-folder"></i> Categories</a></li>
                    <li class="mt-4"><a class="nav-link" href="../blog.php" target="_blank"><i class="fas fa-external-link-alt"></i> View Blog</a></li>
                    <li><a class="nav-link" href="logout.php"><i class="fas fa-sign-out-alt"></i> Logout</a></li>
                </ul>
            </div>
            
            <div class="col-md-9 col-lg-10 admin-main">
                <div class="top-bar">
                    <h4>Categories</h4>
                </div>
                
                <?php if ($message): ?>
                <div class="alert alert-success"><i class="fas fa-check-circle"></i> <?php echo e($message); ?></div>
                <?php endif; ?>
                
                <?php if ($error): ?>
                <div class="alert alert-danger"><i class="fas fa-exclamation-circle"></i> <?php echo e($error); ?></div>
                <?php endif; ?>
                
                <div class="row">
                    <div class="col-md-4">
                        <div class="content-card">
                            <h5><i class="fas fa-plus"></i> Add New Category</h5>
                            <form method="POST" action="">
                                <input type="hidden" name="action" value="add">
                                <div class="form-group">
                                    <label>Category Name</label>
                                    <input type="text" class="form-control" name="name" required>
                                </div>
                                <div class="form-group">
                                    <label>Slug (optional)</label>
                                    <input type="text" class="form-control" name="slug" placeholder="auto-generated">
                                </div>
                                <div class="form-group">
                                    <label>Description</label>
                                    <textarea class="form-control" name="description" rows="3"></textarea>
                                </div>
                                <button type="submit" class="btn btn-primary btn-block"><i class="fas fa-plus"></i> Add Category</button>
                            </form>
                        </div>
                    </div>
                    
                    <div class="col-md-8">
                        <div class="content-card">
                            <h5><i class="fas fa-list"></i> All Categories</h5>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Slug</th>
                                            <th>Posts</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($categories as $cat): ?>
                                        <tr>
                                            <td><strong><?php echo e($cat['name']); ?></strong></td>
                                            <td><?php echo e($cat['slug']); ?></td>
                                            <td><span class="badge badge-info"><?php echo $cat['post_count']; ?></span></td>
                                            <td>
                                                <a href="categories.php?delete=<?php echo $cat['id']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Delete this category?')">
                                                    <i class="fas fa-trash"></i>
                                                </a>
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
        </div>
    </div>
</body>
</html>
