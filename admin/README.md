# Blog Admin Panel

## Setup Instructions

### Step 1: Run Admin Setup SQL
Import `admin/admin_setup.sql` into your database. This creates:
- `admin_users` table with default login
- `blog_categories` table for category management

### Step 2: Access Admin Panel
Navigate to: `https://your-site.com/admin/login.php`

**Default Login:**
- Username: `admin`
- Password: `Admin123!`

**⚠️ IMPORTANT: Change the default password immediately after first login!**

### Step 3: Update Password
Run this SQL to change the password:
```sql
UPDATE admin_users SET password_hash = '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi' WHERE username = 'admin';
```
Or use PHP to generate a new hash:
```php
password_hash('your-new-password', PASSWORD_BCRYPT);
```

## Features

### Dashboard
- View total posts, published, drafts, and categories
- See recent posts with quick actions

### Post Management
- **All Posts**: List view with edit/preview/delete
- **New Post**: Create posts with:
  - Title, slug, content (HTML)
  - Category selection
  - Tags (comma-separated)
  - Featured image path
  - Publish date
  - Status: Draft / Published / Archived
  - Author name

### Categories
- Add new categories with auto-generated slugs
- View post count per category
- Delete unused categories

## Security

- Session-based authentication
- Password protected admin area
- SQL injection prevention via prepared statements
- XSS protection via htmlspecialchars
- CSRF protection can be added if needed

## File Structure

```
admin/
├── login.php          # Login page
├── logout.php         # Logout handler
├── auth_check.php     # Authentication check (include in all pages)
├── dashboard.php      # Main dashboard
├── posts.php          # List all posts
├── post-edit.php      # Create/edit posts
├── post-delete.php    # Delete posts
├── categories.php     # Manage categories
└── admin_setup.sql    # Database setup
```

## Future Enhancements

- [ ] WYSIWYG editor (like TinyMCE) for content
- [ ] Image upload functionality
- [ ] Post scheduling
- [ ] SEO analysis tools
- [ ] Analytics dashboard
- [ ] Multiple user roles (editor, author)
- [ ] Post revisions/versioning
- [ ] Bulk actions (publish, delete, etc.)
