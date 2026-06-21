<?php
require_once __DIR__ . '/auth_check.php';

// Get categories for dropdown
$catStmt = $pdo->query("SELECT name FROM blog_categories ORDER BY name");
$categories = $catStmt->fetchAll(PDO::FETCH_COLUMN);

$post = [
    'id' => '',
    'slug' => '',
    'title' => '',
    'date' => date('Y-m-d'),
    'author' => 'Jhon Arzu-Gil',
    'category' => '',
    'tags' => '',
    'image' => 'images/blog/thumb/seospeed.webp',
    'excerpt' => '',
    'content' => '',
    'status' => 'draft'
];

$isEditing = false;
$message = '';
$error = '';

// If editing existing post
if (isset($_GET['slug'])) {
    $stmt = $pdo->prepare("SELECT * FROM blog_posts WHERE slug = ?");
    $stmt->execute([$_GET['slug']]);
    $dbPost = $stmt->fetch();
    
    if ($dbPost) {
        $post = array_merge($post, $dbPost);
        $isEditing = true;
    }
}

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $post['slug'] = trim($_POST['slug'] ?? '');
    $post['title'] = trim($_POST['title'] ?? '');
    $post['date'] = $_POST['date'] ?? date('Y-m-d');
    $post['author'] = trim($_POST['author'] ?? 'Jhon Arzu-Gil');
    $post['category'] = $_POST['category'] ?? '';
    $post['tags'] = trim($_POST['tags'] ?? '');
    $post['image'] = trim($_POST['image'] ?? 'images/blog/thumb/seospeed.webp');
    $post['excerpt'] = trim($_POST['excerpt'] ?? '');
    $post['content'] = trim($_POST['content'] ?? '');
    $post['status'] = $_POST['status'] ?? 'draft';
    
    // Validation
    if (empty($post['title'])) {
        $error = 'Title is required.';
    } elseif (empty($post['slug'])) {
        $error = 'Slug is required.';
    } elseif (empty($post['content'])) {
        $error = 'Content is required.';
    } else {
        // Auto-generate slug if empty
        if (empty($post['slug'])) {
            $post['slug'] = strtolower(preg_replace('/[^a-z0-9]+/', '-', trim($post['title'])));
        }
        
        if ($isEditing) {
            // Update existing post
            $stmt = $pdo->prepare("UPDATE blog_posts SET 
                slug = ?, title = ?, date = ?, author = ?, category = ?, 
                tags = ?, image = ?, excerpt = ?, content = ?, status = ?
                WHERE id = ?");
            $stmt->execute([
                $post['slug'], $post['title'], $post['date'], $post['author'],
                $post['category'], $post['tags'], $post['image'], $post['excerpt'],
                $post['content'], $post['status'], $post['id']
            ]);
            $message = 'Post updated successfully!';
        } else {
            // Check if slug already exists
            $checkStmt = $pdo->prepare("SELECT COUNT(*) FROM blog_posts WHERE slug = ?");
            $checkStmt->execute([$post['slug']]);
            if ($checkStmt->fetchColumn() > 0) {
                $error = 'A post with this slug already exists. Please choose a different slug.';
            } else {
                // Insert new post
                $stmt = $pdo->prepare("INSERT INTO blog_posts 
                    (slug, title, date, author, category, tags, image, excerpt, content, status)
                    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
                $stmt->execute([
                    $post['slug'], $post['title'], $post['date'], $post['author'],
                    $post['category'], $post['tags'], $post['image'], $post['excerpt'],
                    $post['content'], $post['status']
                ]);
                $message = 'Post created successfully!';
                $isEditing = true;
            }
        }
    }
}

$pageTitle = ($isEditing ? 'Edit' : 'New') . ' Post | Blog Admin';
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
            padding: 30px;
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
        .form-group label {
            font-weight: 600;
            color: #555;
            margin-bottom: 8px;
        }
        .form-control {
            border: 2px solid #e0e0e0;
            border-radius: 8px;
            padding: 12px;
        }
        .form-control:focus {
            border-color: #007bff;
            box-shadow: none;
        }
        textarea.form-control {
            min-height: 200px;
        }
        .btn-save {
            padding: 12px 30px;
            font-size: 1rem;
            font-weight: 600;
        }
        .help-text {
            font-size: 0.85rem;
            color: #888;
            margin-top: 5px;
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
                    <li><a class="nav-link active" href="post-edit.php"><i class="fas fa-plus-circle"></i> New Post</a></li>
                    <li><a class="nav-link" href="categories.php"><i class="fas fa-folder"></i> Categories</a></li>
                    <li class="mt-4"><a class="nav-link" href="../blog.php" target="_blank"><i class="fas fa-external-link-alt"></i> View Blog</a></li>
                    <li><a class="nav-link" href="logout.php"><i class="fas fa-sign-out-alt"></i> Logout</a></li>
                </ul>
            </div>
            
            <div class="col-md-9 col-lg-10 admin-main">
                <div class="top-bar">
                    <h4><?php echo $isEditing ? 'Edit Post' : 'New Post'; ?></h4>
                    <a href="posts.php" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Back to Posts</a>
                </div>
                
                <?php if ($message): ?>
                <div class="alert alert-success"><i class="fas fa-check-circle"></i> <?php echo e($message); ?></div>
                <?php endif; ?>
                
                <?php if ($error): ?>
                <div class="alert alert-danger"><i class="fas fa-exclamation-circle"></i> <?php echo e($error); ?></div>
                <?php endif; ?>
                
                <div class="content-card">
                    <form method="POST" action="">
                        <div class="row">
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label for="title">Post Title *</label>
                                    <input type="text" class="form-control" id="title" name="title" value="<?php echo e($post['title']); ?>" required>
                                </div>
                                
                                <div class="form-group">
                                    <label for="content">Content (HTML) *</label>
                                    <textarea class="form-control" id="content" name="content" rows="15" required><?php echo e($post['content']); ?></textarea>
                                    <p class="help-text">Enter HTML content. Use &lt;h2&gt;, &lt;p&gt;, &lt;ul&gt;, &lt;li&gt; tags for formatting.</p>
                                </div>
                                
                                <div class="form-group">
                                    <label for="excerpt">Excerpt/Summary *</label>
                                    <textarea class="form-control" id="excerpt" name="excerpt" rows="3" required><?php echo e($post['excerpt']); ?></textarea>
                                </div>
                            </div>
                            
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="slug">URL Slug *</label>
                                    <input type="text" class="form-control" id="slug" name="slug" value="<?php echo e($post['slug']); ?>" <?php echo $isEditing ? 'readonly' : ''; ?> required>
                                    <p class="help-text">Used in URL: blog-posts/your-slug.php</p>
                                </div>
                                
                                <div class="form-group">
                                    <label for="status">Status</label>
                                    <select class="form-control" id="status" name="status">
                                        <option value="draft" <?php echo ($post['status'] === 'draft') ? 'selected' : ''; ?>>Draft</option>
                                        <option value="published" <?php echo ($post['status'] === 'published') ? 'selected' : ''; ?>>Published</option>
                                        <option value="archived" <?php echo ($post['status'] === 'archived') ? 'selected' : ''; ?>>Archived</option>
                                    </select>
                                </div>
                                
                                <div class="form-group">
                                    <label for="category">Category *</label>
                                    <select class="form-control" id="category" name="category" required>
                                        <option value="">-- Select Category --</option>
                                        <?php foreach ($categories as $cat): ?>
                                        <option value="<?php echo e($cat); ?>" <?php echo ($post['category'] === $cat) ? 'selected' : ''; ?>><?php echo e($cat); ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                
                                <div class="form-group">
                                    <label for="tags">Tags (comma-separated)</label>
                                    <input type="text" class="form-control" id="tags" name="tags" value="<?php echo e($post['tags']); ?>" placeholder="tag1, tag2, tag3">
                                </div>
                                
                                <div class="form-group">
                                    <label for="image">Featured Image Path</label>
                                    <input type="text" class="form-control" id="image" name="image" value="<?php echo e($post['image']); ?>">
                                    <p class="help-text">Path relative to site root, e.g., images/blog/thumb/image.webp</p>
                                </div>
                                
                                <div class="form-group">
                                    <label for="date">Publish Date</label>
                                    <input type="date" class="form-control" id="date" name="date" value="<?php echo e($post['date']); ?>">
                                </div>
                                
                                <div class="form-group">
                                    <label for="author">Author</label>
                                    <input type="text" class="form-control" id="author" name="author" value="<?php echo e($post['author']); ?>">
                                </div>
                                
                                <div class="form-group mt-4">
                                    <button type="submit" class="btn btn-primary btn-save btn-block">
                                        <i class="fas fa-save"></i> <?php echo $isEditing ? 'Update Post' : 'Create Post'; ?>
                                    </button>
                                </div>
                                
                                <?php if ($isEditing): ?>
                                <div class="form-group">
                                    <a href="../blog-posts/<?php echo e($post['slug']); ?>.php" target="_blank" class="btn btn-info btn-block">
                                        <i class="fas fa-eye"></i> Preview Post
                                    </a>
                                </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
    <script>
        // Auto-generate slug from title
        document.getElementById('title').addEventListener('blur', function() {
            var slugField = document.getElementById('slug');
            if (slugField.value === '' || slugField.hasAttribute('readonly')) {
                return;
            }
            var slug = this.value.toLowerCase()
                .replace(/[^a-z0-9]+/g, '-')
                .replace(/^-|-$/g, '');
            slugField.value = slug;
        });
    </script>
</body>
</html>
