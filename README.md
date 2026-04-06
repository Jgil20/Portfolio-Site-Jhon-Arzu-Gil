# www.arzugil.com – Personal Portfolio & Developer Blog

## Overview

Welcome to **www.arzugil.com**, the official personal portfolio website of **Jhon A. Arzu-Gil** – Application Developer, Cloud Computing Specialist, and Founder of Cloud Technology Computing Corporation.  

This site showcases Jhon’s professional experience, technical skillset, personal projects, certifications, and long-term journey in software development and cloud computing. It also includes a developer blog where Jhon shares insights on web development, cloud, AI, DevOps, and career growth.

The website is designed as both a living portfolio and a central hub to connect with potential employers, collaborators, clients, and the broader tech community.

![Portfolio Screenshot](/images/profile/CloudTechnology%20Computing.avif) <!-- Update with an actual screenshot from arzugil.com -->

---

## Table of Contents

- [Overview](#overview)  
- [Project Structure](#project-structure)  
- [Technologies Used](#technologies-used)  
- [Setup and Installation](#setup-and-installation)  
- [Usage](#usage)  
- [Features](#features)  
- [Deployment](#deployment)  
- [File Structure](#file-structure)  
- [Contributing](#contributing)  
- [License](#license)  
- [Contact](#contact)  

---

## Project Structure

The project is organized as a lightweight, performance-focused portfolio and blog:

- **Public-facing pages** for showcasing experience, projects, and services.
- **Blog templates** for long-form technical content and case studies.
- **PHP backend** for handling forms and dynamic content.
- **Planned/ongoing MySQL integration** for storing form submissions, comments, and other user-generated data.
- **SEO & analytics integration** to track traffic and optimize reach.

---

## Technologies Used

- **HTML5**  
  Structure and semantic layout of all portfolio and blog pages.

- **CSS3 & Bootstrap**  
  - Responsive layout for mobile, tablet, and desktop.  
  - Custom styles for typography, color scheme, and portfolio sections.  
  - Font Awesome icons where applicable.

- **JavaScript**  
  - Interactive UI components.  
  - jQuery for DOM manipulation and event handling.  
  - Plugins (e.g., carousels or lightbox scripts) where required.

- **PHP**  
  - Backend logic for forms (e.g., contact form).  
  - Dynamic includes and shared components (headers, footers, etc.).  

- **MySQL** (in progress / partially integrated)  
  - Planned usage for storing contact form submissions, newsletter sign-ups, and blog-related data.

- **Google Analytics / Tag Manager**  
  - Used for tracking traffic, user behavior, and engagement metrics.

- **Open Graph & Twitter Cards**  
  - Meta tags for rich previews when sharing Jhon’s portfolio and blog posts on social media.

---

## Setup and Installation

To run this website locally or host it on your own server:

1. **Clone the repository:**

   ```bash
   git clone https://github.com/Jgil20/Portfolio-Site-Jhon-Arzu-Gil.git
Navigate to the project directory:

bash
Copy code
cd Portfolio-Site-Jhon-Arzu-Gil
Run the site:

For basic testing, you can open index.php in a browser using a local PHP server.

For proper PHP execution, use a local stack such as:

XAMPP

MAMP

WAMP

or PHP’s built-in server:

bash
Copy code
php -S localhost:8000
(Optional) Database setup:

If using MySQL for contact form storage or comments:

Create a database and user.

Import any provided .sql schema.

Update database credentials in your PHP config file (e.g. includes/db.php).

Usage
Homepage (index.php)

Introduces Jhon, highlights his skills, certifications, and core technologies.

Provides quick links to projects, blog posts, and contact options.

About Page (about.html / about.php)

Shares Jhon’s background, career journey, education, certifications, and long-term goals.

Projects / Portfolio Page (portfolio.html)

Showcases real-world projects, apps, websites, and case studies.

May include links to live demos, GitHub repos, and write-ups.

Services / What I Do (services.html)

Describes areas of expertise: web development, cloud solutions, automation, AI, SEO, etc.

Blog / Articles (dynamic or static templates)

Used for publishing in-depth technical articles and personal dev journey content.

Contact Page (form.php or dedicated contact page)

Allows visitors to send messages or inquiries.

Backend PHP processes and optionally stores the submission.

Features
Responsive Layout
Fully responsive design that works across desktops, tablets, and smartphones.

SEO-Ready

Clean meta titles and descriptions.

Semantic HTML structure.

Open Graph and Twitter Card tags for better social previews.

Performance-Oriented

Optimized images where possible.

Lightweight front-end assets.

Caching and minification can be layered on via hosting/CDN.

Extensible Blog

Templates for adding new posts and technical write-ups.

Integration with PHP and MySQL for dynamic content is planned/expandable.

Analytics & Tracking

Google Analytics / Tag Manager integration for traffic insights and goal tracking.

Deployment
This website can be deployed to any standard PHP-capable hosting provider.

Typical deployment steps:

Upload files

Use FTP/SFTP or your hosting panel’s file manager to upload the project files to the public_html (or equivalent) directory.

Configure PHP & MySQL

Ensure your hosting supports at least PHP 7.x/8.x.

If you’re using a database, create a MySQL database and user, and update the connection details in includes/db.php or your config file.

Set file permissions

Make sure any directories that need write access (e.g., logs, cache, or uploads) have proper permissions.

Verify URLs & Paths

Confirm that asset paths (CSS, JS, images) are correct in your HTML/PHP files.

Ensure canonical URL settings and meta tags point to https://www.arzugil.com.

File Structure
plaintext
Copy code
project-root/
│
├── css/
│   ├── bootstrap.min.css
│   ├── fontawesome/
│   │   └── all.min.css
│   ├── owl.carousel.min.css
│   ├── owl.theme.default.min.css
│   ├── lightbox.min.css
│   ├── parallax.css
│   ├── style.css
│   └── responsive.css
│
├── images/
│   ├── logo.avif
│   ├── hackerJhon.png
│   └── ... (additional portfolio and blog images)
│
├── js/
│   ├── bootstrap.min.js
│   ├── jquery.min.js
│   ├── owl.carousel.min.js
│   ├── lightbox.min.js
│   └── script.js
│
├── index.php
├── about.html
├── services.html
├── portfolio.html
├── form.php
├── manifest.json
└── README.md
Note: The exact file list can be adjusted to match the current version of the arzugil.com project.

Contributing
Although this is a personal portfolio site, suggestions and improvements are welcome.

If you’d like to propose changes:

Fork the repository.

Create a new branch:

bash
Copy code
git checkout -b feature-branch-name
Make and test your changes.

Commit your updates:

bash
Copy code
git commit -m "Describe your feature or fix"
Push the branch:

bash
Copy code
git push origin feature-branch-name
Open a Pull Request with a clear description of your changes.

License
This project is licensed under the MIT License.
See the LICENSE file for full details.

Contact
For inquiries, collaborations, or opportunities, please contact:

Jhon A. Arzu-Gil

Email: jhongil@cloudtechnologycomputing.com

Portfolio: https://www.arzugil.com

Company: https://www.cloudtechnologycomputing.com

Phone: +1 (248) 938-5567

Thank you for visiting www.arzugil.com!
Feel free to explore the projects, read the blog, and reach out to connect or collaborate.

css
Copy code

If you want, I can tweak this to match your exact current file tree (once you paste `ls -R` or a tree output) so the File Structure section is 1:1 with your repo.
