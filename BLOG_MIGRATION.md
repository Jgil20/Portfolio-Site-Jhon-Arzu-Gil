# Blog Database Migration Guide

## What was created

1. **SQL file**: `blog_posts.sql` - Run this in phpMyAdmin or MySQL CLI to create the table and insert all posts
2. **Dynamic blog.php** - Now fetches posts from database instead of hardcoded array
3. **Universal post template**: `blog-posts/post-template.php` - Single template that displays ANY post from database

## Setup Steps

### Step 1: Create the database table
Import `blog_posts.sql` into your MySQL database using phpMyAdmin or run:
```bash
mysql -u your_username -p your_database_name < blog_posts.sql
```

### Step 2: Update existing blog post files (Optional but recommended)
Replace each existing post file with a wrapper that uses the template:

For example, for `introduction-to-cloud-computing.php`:
```php
<?php
// This file now just loads the universal template with the right slug
$_GET['slug'] = 'introduction-to-cloud-computing';
require_once 'post-template.php';
```

Or use URL rewriting (add to .htaccess):
```apache
RewriteEngine On
RewriteRule ^blog-posts/([a-z0-9-]+)\.php$ blog-posts/post-template.php?slug=$1 [L,QSA]
```

### Step 3: Add new posts
Simply insert new rows into the `blog_posts` table. No new files needed!

```sql
INSERT INTO blog_posts (slug, title, date, category, tags, image, excerpt, content, status) 
VALUES ('your-new-post', 'Title', '2026-06-20', 'Category', 'tag1,tag2', 'image.webp', 'Excerpt', 'HTML content here', 'published');
```

## Features of the dynamic system

- **Category filtering** - Filter by any category
- **Tag filtering** - Click tags to filter posts
- **Search** - Full-text search across titles, excerpts, content, and tags
- **Pagination** - Automatic pagination with configurable posts per page
- **Related posts** - Shows related posts in same category on individual post pages
- **SEO metadata** - Dynamic Open Graph tags, descriptions, keywords from DB
- **Status control** - Posts can be published, draft, or archived

## Admin/Management (Future enhancement)

You could create an admin panel to:
- Add/edit posts via web interface
- Upload images
- Manage categories and tags
- View post analytics

Want me to create a simple admin panel too?
