-- Admin user table
CREATE TABLE IF NOT EXISTS `admin_users` (
    `id` INT AUTO_INCREMENT PRIMARY KEY,
    `username` VARCHAR(50) NOT NULL UNIQUE,
    `password_hash` VARCHAR(255) NOT NULL,
    `email` VARCHAR(100) NOT NULL,
    `name` VARCHAR(100) NOT NULL,
    `role` ENUM('admin','editor') NOT NULL DEFAULT 'editor',
    `last_login` DATETIME NULL,
    `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    `updated_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Insert default admin user (password: Admin123!)
-- Change this password after first login!
INSERT INTO `admin_users` (`username`, `password_hash`, `email`, `name`, `role`) VALUES
('admin', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'jgil20@me.com', 'Jhon Arzu-Gil', 'admin')
ON DUPLICATE KEY UPDATE id=id;

-- Categories table for better organization
CREATE TABLE IF NOT EXISTS `blog_categories` (
    `id` INT AUTO_INCREMENT PRIMARY KEY,
    `name` VARCHAR(100) NOT NULL UNIQUE,
    `slug` VARCHAR(100) NOT NULL UNIQUE,
    `description` TEXT,
    `post_count` INT DEFAULT 0,
    `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Insert default categories
INSERT INTO `blog_categories` (`name`, `slug`, `description`) VALUES
('Cloud Solutions', 'cloud-solutions', 'Articles about cloud computing and infrastructure'),
('AI & Automation', 'ai-automation', 'Artificial intelligence and automation technologies'),
('Web Development', 'web-development', 'Web development tips, tutorials, and best practices'),
('SAP Consulting', 'sap-consulting', 'SAP implementation and consulting services'),
('Mobile Development', 'mobile-development', 'Mobile app development trends and techniques')
ON DUPLICATE KEY UPDATE id=id;