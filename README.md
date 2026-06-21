# www.arzugil.com — Personal Portfolio & Developer Blog

[![Live Website](https://img.shields.io/badge/Live-www.arzugil.com-0A66C2?style=for-the-badge)](https://www.arzugil.com)
[![PHP](https://img.shields.io/badge/PHP-8.x-777BB4?style=for-the-badge&logo=php&logoColor=white)](https://www.php.net/)
[![MySQL](https://img.shields.io/badge/MySQL-Dynamic_Blog-4479A1?style=for-the-badge&logo=mysql&logoColor=white)](https://www.mysql.com/)
[![PWA](https://img.shields.io/badge/PWA-Enabled-5A0FC8?style=for-the-badge&logo=pwa&logoColor=white)](https://web.dev/progressive-web-apps/)

## Overview

Welcome to **[www.arzugil.com](https://www.arzugil.com)**, the personal portfolio, developer blog, and professional services website of **Jhon A. Arzu-Gil**.

Jhon is an application developer, cloud computing specialist, former IBM Application Developer Programming Specialist, and founder of **Cloud Technology Computing Corporation**. The website documents his professional experience, certifications, technical projects, software-development journey, and work across cloud computing, full-stack development, mobile applications, SAP analytics, artificial intelligence, SEO, and business technology.

The project is more than a static portfolio. It includes a database-driven blog, protected administration area, service pages, forms, comments, newsletter subscriptions, PayPal payment processing, a Gemini-powered chatbot, search-engine optimization, analytics integrations, and Progressive Web App support.

![ArzuGil Portfolio Screenshot](images/profile/CloudTechnology%20Computing.avif)

## Live Website

- **Portfolio:** [https://www.arzugil.com](https://www.arzugil.com)
- **Developer Blog:** [https://www.arzugil.com/blog.php](https://www.arzugil.com/blog.php)
- **Company:** [https://www.cloudtechnologycomputing.com](https://www.cloudtechnologycomputing.com)
- **LinkedIn:** [https://www.linkedin.com/in/jhongil](https://www.linkedin.com/in/jhongil)

## Table of Contents

- [Overview](#overview)
- [Live Website](#live-website)
- [Core Features](#core-features)
- [Service Pages](#service-pages)
- [Technology Stack](#technology-stack)
- [Project Architecture](#project-architecture)
- [Database](#database)
- [Local Setup](#local-setup)
- [Configuration](#configuration)
- [Blog Administration](#blog-administration)
- [Clean URLs](#clean-urls)
- [Progressive Web App](#progressive-web-app)
- [Security](#security)
- [SEO](#seo)
- [Deployment](#deployment)
- [Testing Checklist](#testing-checklist)
- [Project Structure](#project-structure)
- [Contributing](#contributing)
- [License](#license)
- [Contact](#contact)

## Core Features

### Personal Portfolio

- Professional background and career experience
- Technical skills and cloud expertise
- Certifications and digital badges
- Software projects and application showcases
- Resume and professional profile links
- Customer projects and case-study content
- Responsive portfolio galleries

### Dynamic Developer Blog

The blog is powered by PHP, PDO, and MySQL rather than a hard-coded article list.

Current blog functionality includes:

- Published, draft, and archived post statuses
- Clean slug-based article URLs
- Category filtering
- Tag filtering
- Keyword search
- Pagination
- Related posts
- Dynamic featured images
- Dynamic SEO metadata
- Open Graph and social-sharing data
- Blog comments
- Administrative post management

Example clean article URL:

```text
https://www.arzugil.com/blog/introduction-to-cloud-computing
```

The clean URL is internally routed to:

```text
single-blog.php?slug=introduction-to-cloud-computing
```

### Blog Administration

The `admin/` area provides tools for:

- Secure administrator login
- Dashboard statistics
- Creating blog posts
- Editing existing posts
- Deleting posts
- Publishing or archiving posts
- Managing blog categories
- Setting slugs, tags, authors, images, excerpts, and publication dates

### Forms and Lead Generation

The project includes backend handlers for:

- Contact inquiries
- Free quote requests
- Website project inquiries
- Newsletter subscriptions
- Service-page comments
- Blog comments

### PayPal Checkout

The site includes server-side PayPal REST API endpoints for:

- Creating PayPal orders
- Capturing approved orders
- Recording order information
- Accepting consultation and project deposits

PayPal secrets must remain server-side and must never be exposed in JavaScript or committed to Git.

### Gemini Chatbot

The website includes a Gemini-powered chatbot with:

- Front-end chatbot interface
- Server-side API communication
- Portfolio and service-related responses
- File and message handling support
- Material Symbols interface icons

The Gemini API key must be stored only in private server configuration.

### Progressive Web App

The project contains:

- `manifest.json`
- `sw.js`
- Multiple application icon sizes
- Standalone display configuration
- Static and dynamic cache handling

## Service Pages

The portfolio includes dedicated service pages for:

- **Full-Stack Development** — `Full-Stack-Developer.php`
- **Mobile App Development** — `Mobile-Development.php`
- **Cloud Solutions** — `Cloud-Solutions.php`
- **SAP Analytics and Consulting** — `Sap-Consultant.php`

The Apache configuration also supports clean aliases:

```text
/full-stack-developer
/mobile-development
/cloud-solutions
/sap-consultant
```

## Technology Stack

### Front End

- HTML5
- CSS3
- Bootstrap
- JavaScript
- jQuery
- Font Awesome
- Owl Carousel
- Lightbox
- Isotope
- Particles.js
- Responsive and mobile-first layouts

### Back End

- PHP 8.x
- PDO
- MySQL / MariaDB
- REST-style server endpoints
- Session-based admin authentication
- Apache URL rewriting

### Cloud and Third-Party Services

- AWS
- Microsoft Azure
- IBM Cloud
- Google Cloud
- Google Gemini API
- PayPal REST API
- Google Analytics
- Google Tag Manager
- Google Search Console
- Open Graph
- Twitter/X Cards

### Progressive Web App

- Web App Manifest
- Service Worker
- Browser caching
- Installable application icons
- Offline-capable application shell

## Project Architecture

The application uses reusable PHP components and separates major responsibilities:

- `header.php` and `footer.php` provide shared page layout.
- `includes/config.php` contains private application settings.
- `includes/database.php` creates the PDO database connection.
- `blog.php` lists and filters posts.
- `single-blog.php` loads a post by slug.
- `admin/` contains blog-management pages.
- `api/` contains PayPal order endpoints.
- `assets/js/` contains feature-specific JavaScript.
- `.htaccess` handles canonical URLs, security headers, caching, compression, and rewrites.

## Database

The supplied database schema includes the following application tables:

```text
blog_categories
blog_comments
blog_posts
comments
paypal_orders
quotes
quote_requests
website_inquiries
```

The admin setup also creates:

```text
admin_users
```

### Blog Post Fields

The dynamic blog expects fields such as:

```text
id
slug
title
date
author
category
tags
image
excerpt
content
status
```

### Database Import

Import the supplied SQL file through phpMyAdmin:

```text
Portfoliositedatabase.sql
```

Or use the MySQL command line:

```bash
mysql -u YOUR_DATABASE_USER -p YOUR_DATABASE_NAME < Portfoliositedatabase.sql
```

Import the admin schema when needed:

```bash
mysql -u YOUR_DATABASE_USER -p YOUR_DATABASE_NAME < admin/admin_setup.sql
```

## Local Setup

### Requirements

Install or enable:

- PHP 8.1 or newer
- MySQL 8.x or MariaDB
- Apache with `mod_rewrite`
- PHP PDO MySQL extension
- PHP cURL extension
- PHP OpenSSL extension
- PHP JSON extension
- A local stack such as MAMP, XAMPP, WAMP, Laravel Herd, or native PHP/MySQL

### 1. Clone the Repository

```bash
git clone https://github.com/Jgil20/Portfolio-Site-Jhon-Arzu-Gil.git
cd Portfolio-Site-Jhon-Arzu-Gil
```

### 2. Create the Database

```sql
CREATE DATABASE arzugil_portfolio
CHARACTER SET utf8mb4
COLLATE utf8mb4_unicode_ci;
```

Import the database schema and application data.

### 3. Configure Private Settings

Create or update the private configuration files with your own development credentials.

Never use production credentials in a local public repository.

### 4. Start a Local PHP Server

```bash
php -S localhost:8000
```

Open:

```text
http://localhost:8000
```

> PHP's built-in development server does not process `.htaccess`. Use Apache through MAMP, XAMPP, WAMP, or another Apache environment when testing clean URLs and rewrite rules.

## Configuration

The application currently references:

```text
includes/config.php
includes/database.php
```

Store only private local or production values in those files.

A recommended environment-based configuration pattern is:

```env
APP_ENV=production
APP_DEBUG=false

DB_HOST=localhost
DB_NAME=your_database_name
DB_USER=your_database_user
DB_PASS=your_database_password

PAYPAL_MODE=sandbox
PAYPAL_CLIENT_ID=your_paypal_client_id
PAYPAL_CLIENT_SECRET=your_paypal_client_secret

GEMINI_API_KEY=your_gemini_api_key
```

Do not commit `.env`, private configuration files, API keys, database passwords, private certificates, or live payment secrets.

## Blog Administration

After importing `admin/admin_setup.sql`, access the administrator login locally or on the deployed domain:

```text
/admin/login.php
```

Before using the admin panel in production:

1. Replace the default administrator password.
2. Remove any default user that is not needed.
3. Use a strong password hash created with `password_hash()`.
4. Enable HTTPS.
5. Add CSRF protection to all write actions.
6. Restrict repeated login attempts.
7. Disable PHP error display in production.
8. Back up the database before deleting or restructuring posts.

Example password hash command:

```bash
php -r "echo password_hash('REPLACE_WITH_A_STRONG_PASSWORD', PASSWORD_DEFAULT), PHP_EOL;"
```

## Clean URLs

The root `.htaccess` provides:

- HTTPS enforcement
- Canonical `www.arzugil.com`
- Homepage canonicalization
- Clean service aliases
- Clean blog article URLs
- Private-file protection
- Security headers
- Compression
- Browser caching

Important blog rewrite:

```apache
RewriteRule ^blog/([a-z0-9-]+)/?$ single-blog.php?slug=$1 [L,QSA,NC]
```

Legacy query-string URLs are redirected to their canonical clean equivalents.

## Progressive Web App

The manifest identifies the website as:

```text
ArzuGil Application Developer
```

The PWA icons are located in:

```text
images/icons/
```

Before deployment, verify that every file listed in `sw.js` exists. A missing precache asset can cause service-worker installation to fail.

When changing cached CSS, JavaScript, or application-shell files, update the cache version:

```javascript
var CACHE_STATIC_NAME = 'static-v5';
```

## Security

### Required Before Production

- Rotate all database passwords and API credentials.
- Remove secrets from Git history.
- Keep `includes/config.php` out of version control.
- Set `APP_DEBUG` to `false`.
- Use PayPal sandbox until checkout is fully tested.
- Use prepared statements for every database query.
- Escape output with `htmlspecialchars`.
- Validate uploaded files by extension, MIME type, and size.
- Add CSRF tokens to admin and public forms.
- Rate-limit login, comments, forms, and chatbot requests.
- Protect the admin directory with strong authentication.
- Maintain automated database and file backups.

The repository's `.gitignore` should include at minimum:

```gitignore
.env
.env.*
includes/config.php
includes/database.php
config.php
private/
*.key
*.pem
*.log
.DS_Store
```

If credentials were ever committed, deleting them from the latest file is not enough. Rotate the credentials and remove them from repository history.

## SEO

The project supports:

- Unique page titles and descriptions
- Canonical URLs
- Semantic heading structure
- Search-friendly slugs
- Dynamic blog metadata
- Open Graph tags
- Twitter/X Cards
- XML sitemap
- Image alternative text
- Mobile-responsive pages
- Structured data / JSON-LD
- Google Analytics and Tag Manager
- Search Console monitoring
- Internal links and related articles

### Recommended SEO Checks

- Keep page titles below approximately 65 characters.
- Use unique meta descriptions between approximately 150 and 165 characters.
- Use one descriptive H1 per page.
- Compress large JPEG and PNG files to AVIF or WebP.
- Use descriptive image filenames.
- Keep canonical URLs consistent.
- Update `sitemap.xml` whenever public routes change.
- Add newly published posts to internal navigation.
- Monitor indexing, Core Web Vitals, impressions, and clicks.

## Deployment

The application can run on any Apache-based hosting provider that supports PHP and MySQL.

### Production Checklist

1. Upload application files to `public_html`.
2. Upload the root `.htaccess`.
3. Create the production MySQL database and user.
4. Import the database schema.
5. configure private credentials.
6. Set production file permissions.
7. Set `APP_DEBUG` to `false`.
8. Verify HTTPS and canonical redirects.
9. Test clean blog and service URLs.
10. Test contact, quote, subscription, and comment forms.
11. Test PayPal with sandbox credentials.
12. Test the Gemini chatbot.
13. Verify the sitemap and robots directives.
14. Validate structured data.
15. Test the service worker and manifest.
16. Clear Cloudflare, browser, and service-worker caches after deployment.

### Suggested Permissions

```text
Directories: 755
Files:       644
Private configuration: 600 or 640 where supported
```

Do not use `777` permissions.

## Testing Checklist

### Public Pages

- [ ] Homepage loads without PHP warnings
- [ ] Navigation works on desktop and mobile
- [ ] Images have valid paths and alt text
- [ ] Service pages load correctly
- [ ] Contact forms return useful success and error messages
- [ ] Social links open correctly

### Blog

- [ ] Blog index loads published posts
- [ ] Search returns relevant posts
- [ ] Category filters work
- [ ] Tag filters work
- [ ] Pagination works
- [ ] Clean post URLs load
- [ ] Related posts display
- [ ] Comments load and submit
- [ ] Draft posts are not publicly visible

### Admin

- [ ] Login and logout work
- [ ] Unauthorized users are redirected
- [ ] Posts can be created and edited
- [ ] Slugs remain unique
- [ ] Categories can be managed
- [ ] Destructive actions require confirmation
- [ ] Default credentials have been replaced

### Integrations

- [ ] Gemini chatbot responds without exposing the API key
- [ ] PayPal create-order endpoint works
- [ ] PayPal capture-order endpoint works
- [ ] Payment records are stored correctly
- [ ] Analytics events appear
- [ ] Service worker installs successfully

## Project Structure

```text
project-root/
├── admin/
│   ├── login.php
│   ├── logout.php
│   ├── auth_check.php
│   ├── dashboard.php
│   ├── posts.php
│   ├── post-edit.php
│   ├── post-delete.php
│   ├── categories.php
│   ├── admin_setup.sql
│   └── README.md
│
├── api/
│   ├── paypal-create-order.php
│   └── paypal-capture-order.php
│
├── assets/
│   ├── books/
│   └── js/
│       ├── chatbot.js
│       └── paypal-service-checkout.js
│
├── blog-posts/
│   ├── post-template.php
│   ├── introduction-to-cloud-computing.php
│   ├── how-i-built-my-portfolio.php
│   ├── ai-chatbot-business.php
│   ├── mobile-app-trends-2026.php
│   ├── seo-best-practices-2026.php
│   ├── sap-consulting-guide.php
│   ├── website-speed-optimization.php
│   └── full-stack-vs-specialist.php
│
├── css/
│   ├── bootstrap.min.css
│   ├── fontawesome/
│   ├── lightbox.min.css
│   ├── owl.carousel.min.css
│   ├── owl.theme.default.min.css
│   ├── parallax.css
│   ├── responsive.css
│   └── style.css
│
├── images/
│   ├── background/
│   ├── blog/thumb/
│   ├── Certifications/
│   ├── customer/
│   ├── icons/
│   ├── portfolio/
│   ├── profile/
│   ├── service/
│   └── team/
│
├── includes/
│   ├── config.php
│   └── database.php
│
├── js/
│   ├── app.js
│   ├── bootstrap.min.js
│   ├── isotope.pkgd.min.js
│   ├── jquery-3.5.1.min.js
│   ├── lightbox.min.js
│   ├── main.js
│   ├── owl.carousel.min.js
│   ├── particles.min.js
│   ├── validator.min.js
│   └── waypoint.js
│
├── Cloud Layout/
├── Certification Layout/
├── Quiz/
├── help/
├── media/
│
├── index.php
├── blog.php
├── single-blog.php
├── Full-Stack-Developer.php
├── Mobile-Development.php
├── Cloud-Solutions.php
├── Sap-Consultant.php
├── header.php
├── footer.php
├── gemini-chat.php
├── quote-process.php
├── contact-process.php
├── submit-website-form.php
├── submit-comment.php
├── load-comments.php
├── subscribe.php
├── manifest.json
├── sw.js
├── sitemap.xml
├── favicon.ico
├── .htaccess
├── .gitignore
├── BLOG_MIGRATION.md
└── README.md
```

> Linux hosting is case-sensitive. Keep filename capitalization consistent between links and actual files.

## Contributing

This is a personal portfolio project, but constructive fixes and improvements are welcome.

1. Fork the repository.
2. Create a feature branch:

```bash
git checkout -b feature/descriptive-name
```

3. Make and test the changes.
4. Commit with a clear message:

```bash
git commit -m "Improve mobile service page accessibility"
```

5. Push the branch:

```bash
git push origin feature/descriptive-name
```

6. Open a pull request that explains:
   - What changed
   - Why it changed
   - How it was tested
   - Any database or configuration impact

Never include real credentials, production data, private customer information, or payment secrets in a pull request.

## License

A root `LICENSE` file is not currently included in the inspected project archive.

Until a license is added, the source code should be treated as **all rights reserved**. If the project is intended to use the MIT License, add an official `LICENSE` file before distributing or accepting outside contributions.

## Contact

**Jhon A. Arzu-Gil**

- Portfolio: [https://www.arzugil.com](https://www.arzugil.com)
- Company: [https://www.cloudtechnologycomputing.com](https://www.cloudtechnologycomputing.com)
- LinkedIn: [https://www.linkedin.com/in/jhongil](https://www.linkedin.com/in/jhongil)
- Email: [Jgil20@me.com](mailto:Jgil20@me.com)
- Phone: [713-870-9966](tel:+17138709966)

---

Thank you for visiting **www.arzugil.com**. Explore the projects, read the developer blog, review the certifications, or get in touch to discuss software development, cloud computing, mobile applications, SAP analytics, AI integration, and technology consulting.
