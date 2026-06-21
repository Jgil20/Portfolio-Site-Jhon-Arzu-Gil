<?php
require_once __DIR__ . '/includes/config.php';

$pageTitle = 'Cloud Solutions & Consulting | Jhon Arzu-Gil';
$pageDescription = 'Hire Jhon Arzu-Gil for AWS, Azure, hybrid cloud, migration, hosting, backup, security, cost optimization, and managed cloud consulting.';
$pageKeywords = 'cloud solutions, cloud consulting, AWS consultant, Azure consultant, cloud migration, hybrid cloud, multi-cloud, cloud hosting, cloud security, Houston cloud consultant';

$canonicalUrl = 'https://www.arzugil.com/cloud-solutions.php';
$shareTitle = 'Cloud Solutions and Consulting by Jhon Arzu-Gil';

if (!function_exists('e')) {
    function e($value): string
    {
        return htmlspecialchars((string) $value, ENT_QUOTES, 'UTF-8');
    }
}

if (!function_exists('cloudBlogImage')) {
    function cloudBlogImage($path): string
    {
        $path = trim((string) $path);

        if ($path === '') {
            return '/images/blog/thumb/default-blog.webp';
        }

        if (preg_match('#^https?://#i', $path)) {
            return $path;
        }

        return '/' . ltrim($path, '/');
    }
}

/*
|--------------------------------------------------------------------------
| Dynamic cloud-related blog posts
|--------------------------------------------------------------------------
| Expected blog_posts fields:
| id, slug, title, date, category, tags, image, excerpt, status
*/
$relatedPosts = [];
$databaseFile = __DIR__ . '/includes/database.php';

if (is_file($databaseFile)) {
    require_once $databaseFile;
}

if (isset($pdo) && $pdo instanceof PDO) {
    try {
        $relatedSql = "
            SELECT
                id,
                slug,
                title,
                date,
                category,
                tags,
                image,
                excerpt,
                (
                    CASE WHEN LOWER(category) LIKE '%cloud%' THEN 120 ELSE 0 END
                    + CASE WHEN LOWER(category) LIKE '%aws%' THEN 100 ELSE 0 END
                    + CASE WHEN LOWER(category) LIKE '%azure%' THEN 100 ELSE 0 END
                    + CASE WHEN LOWER(tags) LIKE '%cloud%' THEN 80 ELSE 0 END
                    + CASE WHEN LOWER(tags) LIKE '%aws%' THEN 70 ELSE 0 END
                    + CASE WHEN LOWER(tags) LIKE '%azure%' THEN 70 ELSE 0 END
                    + CASE WHEN LOWER(tags) LIKE '%migration%' THEN 60 ELSE 0 END
                    + CASE WHEN LOWER(title) LIKE '%cloud%' THEN 70 ELSE 0 END
                    + CASE WHEN LOWER(title) LIKE '%aws%' THEN 60 ELSE 0 END
                    + CASE WHEN LOWER(title) LIKE '%azure%' THEN 60 ELSE 0 END
                    + CASE WHEN LOWER(title) LIKE '%migration%' THEN 50 ELSE 0 END
                    + CASE WHEN LOWER(title) LIKE '%hosting%' THEN 35 ELSE 0 END
                    + CASE WHEN LOWER(title) LIKE '%security%' THEN 25 ELSE 0 END
                ) AS relevance
            FROM blog_posts
            WHERE status = 'published'
              AND date <= CURDATE()
            ORDER BY relevance DESC, date DESC, id DESC
            LIMIT 3
        ";

        $relatedStatement = $pdo->query($relatedSql);
        $relatedPosts = $relatedStatement->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $exception) {
        error_log('Cloud related-post query failed: ' . $exception->getMessage());
    }
}

$schema = [
    '@context' => 'https://schema.org',
    '@graph' => [
        [
            '@type' => 'Service',
            '@id' => $canonicalUrl . '#service',
            'name' => 'Cloud Solutions and Consulting',
            'description' => $pageDescription,
            'url' => $canonicalUrl,
            'provider' => [
                '@type' => 'Person',
                'name' => 'Jhon Arzu-Gil',
                'url' => 'https://www.arzugil.com/'
            ],
            'areaServed' => [
                '@type' => 'Country',
                'name' => 'United States'
            ],
            'serviceType' => [
                'AWS Cloud Consulting',
                'Azure Cloud Consulting',
                'Cloud Migration',
                'Hybrid and Multi-Cloud Architecture',
                'Cloud Hosting and Deployment',
                'Cloud Security and Cost Optimization'
            ]
        ],
        [
            '@type' => 'FAQPage',
            '@id' => $canonicalUrl . '#faq',
            'mainEntity' => [
                [
                    '@type' => 'Question',
                    'name' => 'What cloud platforms do you support?',
                    'acceptedAnswer' => [
                        '@type' => 'Answer',
                        'text' => 'Cloud consulting can cover AWS, Microsoft Azure, IBM Cloud, Google Cloud, hybrid environments, and traditional hosting platforms.'
                    ]
                ],
                [
                    '@type' => 'Question',
                    'name' => 'Can you migrate an existing website or application to the cloud?',
                    'acceptedAnswer' => [
                        '@type' => 'Answer',
                        'text' => 'Yes. Migration services can include discovery, backups, architecture planning, database and file migration, DNS changes, testing, monitoring, and post-migration optimization.'
                    ]
                ],
                [
                    '@type' => 'Question',
                    'name' => 'Can cloud services help reduce technology costs?',
                    'acceptedAnswer' => [
                        '@type' => 'Answer',
                        'text' => 'A properly designed cloud environment can improve cost visibility, remove unused resources, right-size workloads, automate backups, and match infrastructure spending to actual business demand.'
                    ]
                ]
            ]
        ]
    ]
];
?>

<?php include 'header.php'; ?>

<script type="application/ld+json">
<?= json_encode($schema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT); ?>
</script>

<section id="single-page-banner" class="page-title page-title-image service-hbg">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h1>Cloud Solutions &amp; Consulting</h1>
            </div>

            <div class="col-md-6">
                <ul class="breadcrumb">
                    <li><a href="/">Home</a></li>
                    <li><a href="services.php">Services</a></li>
                    <li class="active">Cloud Solutions</li>
                </ul>
            </div>
        </div>
    </div>
</section>

<div id="service-single-content" class="service-single-content SectionMargin">
    <div class="container">
        <div class="row">

            <main class="col-md-8">
                <article class="service-detail">

                    <div class="post-image">
                        <img
                            src="images/profile/solutionscloud.webp"
                            alt="Cloud solutions consultant helping businesses with AWS Azure migration hosting security and cost optimization"
                            width="1200"
                            height="800"
                            decoding="async"
                        >
                    </div>

                    <div class="title-box">
                        <h2 class="widget-title">
                            Hire Jhon Arzu-Gil for <strong>Cloud Solutions</strong>
                        </h2>
                    </div>

                    <div class="service-content">
                        <p>
                            Build a faster, more secure, and more scalable technology foundation with professional
                            <strong>cloud consulting and cloud solutions</strong>. Jhon Arzu-Gil helps businesses,
                            startups, entrepreneurs, and organizations plan, migrate, deploy, and improve websites,
                            applications, databases, and digital services across modern cloud platforms.
                        </p>

                        <p>
                            Whether you are launching a new application, moving away from outdated hosting, improving
                            reliability, creating backups, or reducing unnecessary infrastructure costs, each cloud
                            project begins with your business needs. The goal is to select the right services,
                            architecture, security controls, and operating model without adding unnecessary
                            complexity.
                        </p>

                        <div class="row clearfix">
                            <div class="col-sm-6 col-xs-12">
                                <img
                                    src="images/profile/solutionscloud.webp"
                                    alt="AWS Azure hybrid cloud migration and managed cloud consulting services"
                                    width="700"
                                    height="400"
                                    loading="lazy"
                                    decoding="async"
                                >
                            </div>

                            <div class="service-list col-sm-6 col-xs-12">
                                <ul class="list-unstyled">
                                    <li>AWS and Azure Cloud Consulting</li>
                                    <li>Cloud Migration and Modernization</li>
                                    <li>Hybrid and Multi-Cloud Architecture</li>
                                    <li>Cloud Hosting and Deployment</li>
                                    <li>Backup and Disaster Recovery</li>
                                    <li>Cloud Security and Access Control</li>
                                    <li>Cloud Cost Optimization</li>
                                    <li>Database and Storage Solutions</li>
                                    <li>Monitoring and Performance Support</li>
                                    <li>Managed Cloud Guidance</li>
                                </ul>
                            </div>
                        </div>

                        <h3>AWS Cloud Consulting</h3>
                        <p>
                            AWS services can support websites, APIs, mobile applications, databases, backups,
                            analytics, automation, and scalable business systems. Solutions may use services such as
                            Amazon EC2, S3, RDS, Route 53, CloudFront, Lambda, CloudWatch, IAM, and other managed
                            services selected according to the project requirements.
                        </p>

                        <p>
                            Jhon holds the AWS Certified Solutions Architect – Associate certification and can help
                            businesses review architecture choices, improve reliability, strengthen security, plan
                            migrations, and understand cloud costs before deploying production workloads.
                        </p>

                        <h3>Microsoft Azure Solutions</h3>
                        <p>
                            Azure can help organizations connect cloud services with Microsoft tools, web
                            applications, identity systems, databases, virtual machines, storage, monitoring, and
                            automation. Services can include Azure architecture planning, application hosting,
                            migration support, identity and access configuration, and performance improvements.
                        </p>

                        <h3>Cloud Migration and Modernization</h3>
                        <p>
                            Moving an existing website, application, or database requires more than copying files.
                            A successful migration should include discovery, dependency review, backups, target
                            architecture, security controls, DNS planning, database migration, testing, rollback
                            planning, monitoring, and post-migration validation.
                        </p>

                        <p>
                            Cloud modernization can also include replacing manual infrastructure with managed
                            services, improving deployment workflows, separating application components, optimizing
                            databases, adding caching, creating APIs, and introducing automation that improves
                            reliability and reduces repetitive work.
                        </p>

                        <h3>Hybrid and Multi-Cloud Solutions</h3>
                        <p>
                            Not every workload belongs in one environment. A hybrid solution may combine cloud
                            services with an existing server, office network, private database, or third-party
                            platform. Multi-cloud planning can reduce vendor dependency or allow each workload to use
                            the platform that best fits its security, performance, and cost requirements.
                        </p>

                        <h3>Cloud Security and Business Continuity</h3>
                        <div class="row">
                            <div class="col-sm-6">
                                <ul>
                                    <li>Identity and access management</li>
                                    <li>Least-privilege permissions</li>
                                    <li>HTTPS and certificate configuration</li>
                                    <li>Secure network and firewall rules</li>
                                    <li>Encryption and protected storage</li>
                                    <li>Environment and secret management</li>
                                </ul>
                            </div>

                            <div class="col-sm-6">
                                <ul>
                                    <li>Automated backups</li>
                                    <li>Recovery planning</li>
                                    <li>Uptime and health monitoring</li>
                                    <li>Logging and alerting</li>
                                    <li>Patch and update planning</li>
                                    <li>Cloud security reviews</li>
                                </ul>
                            </div>
                        </div>

                        <h3>Cloud Cost Optimization</h3>
                        <p>
                            Cloud resources should support business value without creating unpredictable bills.
                            Cost optimization can include reviewing unused services, right-sizing compute resources,
                            selecting appropriate storage classes, using caching and content delivery networks,
                            scheduling non-production workloads, setting budgets and alerts, and matching service
                            levels to actual demand.
                        </p>

                        <h3>Cloud Technology Skills</h3>
                        <ul class="list-unstyled">
                            <li><strong>Platforms:</strong> AWS, Microsoft Azure, IBM Cloud, Google Cloud</li>
                            <li><strong>Compute:</strong> Virtual machines, containers, serverless functions, managed hosting</li>
                            <li><strong>Storage:</strong> Object storage, block storage, file storage, backup architecture</li>
                            <li><strong>Databases:</strong> MySQL, SQL, MongoDB, managed relational databases</li>
                            <li><strong>Networking:</strong> DNS, CDN, HTTPS, load balancing, firewalls, private networking</li>
                            <li><strong>DevOps:</strong> Docker, Git, GitHub, deployment workflows, Apache, Nginx</li>
                            <li><strong>Monitoring:</strong> Logs, uptime checks, metrics, alerts, performance analysis</li>
                            <li><strong>Applications:</strong> PHP, JavaScript, Node.js, Java, REST APIs, mobile backends</li>
                        </ul>

                        <h3>Cloud Consulting Process</h3>
                        <ol>
                            <li>
                                <strong>Discovery:</strong> Review your applications, data, hosting, users, risks,
                                business goals, budget, and expected growth.
                            </li>
                            <li>
                                <strong>Architecture:</strong> Select cloud services, deployment patterns, storage,
                                databases, networking, access controls, monitoring, and recovery requirements.
                            </li>
                            <li>
                                <strong>Migration or Deployment:</strong> Configure the environment, transfer data,
                                deploy applications, connect services, and document the implementation.
                            </li>
                            <li>
                                <strong>Testing:</strong> Validate performance, security, backups, integrations,
                                permissions, DNS, HTTPS, and application behavior.
                            </li>
                            <li>
                                <strong>Optimization:</strong> Review costs, performance, reliability, logs, and
                                opportunities to simplify or automate operations.
                            </li>
                            <li>
                                <strong>Ongoing Support:</strong> Monitor the environment, respond to issues, plan
                                updates, and improve the architecture as the business changes.
                            </li>
                        </ol>

                        <h3>Who Can Benefit from Cloud Solutions?</h3>
                        <p>
                            Cloud consulting is useful for small businesses, startups, software teams, professional
                            services firms, e-commerce businesses, content platforms, mobile applications, and
                            organizations that need secure remote access, reliable backups, scalable hosting,
                            improved performance, or a clearer technology strategy.
                        </p>

                        <div class="service-cta-box">
                            <h3>Ready to Improve Your Cloud Environment?</h3>
                            <p>
                                Request a consultation for AWS, Azure, cloud migration, hosting, backup, security,
                                cost optimization, or a new cloud-powered application.
                            </p>

                            <a href="#serviceQuoteForm" class="btn btn-shutter-out-horizontal">
                                Request a Free Quote
                            </a>

                            <a
                                href="https://www.cloudtechnologycomputing.com/form.php"
                                class="btn btn-shutter-out-horizontal"
                                target="_blank"
                                rel="noopener"
                            >
                                Book a Consultation
                            </a>
                        </div>
                    </div>

                    <div class="share-icon clearfix">
                        <span>Share this Page:</span>

                        <ul class="list-inline list-social">
                            <li>
                                <a
                                    href="https://www.facebook.com/sharer/sharer.php?u=<?= rawurlencode($canonicalUrl); ?>"
                                    class="social-icon social-icon-small social-icon-colored social-icon-facebook"
                                    target="_blank"
                                    rel="noopener noreferrer"
                                    aria-label="Share on Facebook"
                                >
                                    <i class="fab fa-facebook-f"></i>
                                    <i class="fab fa-facebook-f"></i>
                                </a>
                            </li>

                            <li>
                                <a
                                    href="https://twitter.com/intent/tweet?url=<?= rawurlencode($canonicalUrl); ?>&text=<?= rawurlencode($shareTitle); ?>"
                                    class="social-icon social-icon-small social-icon-colored social-icon-twitter"
                                    target="_blank"
                                    rel="noopener noreferrer"
                                    aria-label="Share on X"
                                >
                                    <i class="fab fa-twitter"></i>
                                    <i class="fab fa-twitter"></i>
                                </a>
                            </li>

                            <li>
                                <a
                                    href="https://www.linkedin.com/sharing/share-offsite/?url=<?= rawurlencode($canonicalUrl); ?>"
                                    class="social-icon social-icon-small social-icon-colored social-icon-linkedin"
                                    target="_blank"
                                    rel="noopener noreferrer"
                                    aria-label="Share on LinkedIn"
                                >
                                    <i class="fab fa-linkedin-in"></i>
                                    <i class="fab fa-linkedin-in"></i>
                                </a>
                            </li>

                            <li>
                                <a
                                    href="mailto:?subject=<?= rawurlencode($shareTitle); ?>&body=<?= rawurlencode($canonicalUrl); ?>"
                                    class="social-icon social-icon-small social-icon-colored"
                                    aria-label="Share by email"
                                >
                                    <i class="fas fa-envelope"></i>
                                    <i class="fas fa-envelope"></i>
                                </a>
                            </li>
                        </ul>
                    </div>

                </article>

                <nav class="post-navigation clearfix" aria-label="Service navigation">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="float-start">
                                <a href="mobile-development.php">
                                    <i class="fas fa-angle-double-left"></i>
                                    Mobile App Development
                                </a>
                            </div>

                            <div class="float-end">
                                <a href="#serviceQuoteForm">
                                    Request a Free Quote
                                    <i class="fas fa-angle-double-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </nav>

                <section id="related-blog" class="blog" aria-labelledby="cloud-resources-title">
                    <div class="title-box">
                        <h3 id="cloud-resources-title">
                            Cloud Computing <strong>Resources</strong>
                        </h3>
                    </div>

                    <div class="row">
                        <?php if ($relatedPosts): ?>
                            <?php foreach ($relatedPosts as $relatedPost): ?>
                                <?php
                                $relatedTitle = trim($relatedPost['title'] ?? 'Cloud Computing Resource');
                                $relatedSlug = trim($relatedPost['slug'] ?? '');
                                $relatedUrl = '/blog/' . rawurlencode($relatedSlug);
                                $relatedImage = cloudBlogImage($relatedPost['image'] ?? '');
                                $relatedCategory = trim($relatedPost['category'] ?? 'Cloud Computing');
                                ?>

                                <div class="col-sm-4">
                                    <article class="blog-wrap">
                                        <div class="blog-thumb">
                                            <a
                                                href="<?= e($relatedUrl); ?>"
                                                aria-label="Read <?= e($relatedTitle); ?>"
                                            >
                                                <img
                                                    src="<?= e($relatedImage); ?>"
                                                    alt="<?= e($relatedTitle . ' - ' . $relatedCategory); ?>"
                                                    width="600"
                                                    height="200"
                                                    loading="lazy"
                                                    decoding="async"
                                                >
                                            </a>
                                        </div>

                                        <div class="blog-title">
                                            <h3>
                                                <a
                                                    title="<?= e($relatedTitle); ?>"
                                                    href="<?= e($relatedUrl); ?>"
                                                >
                                                    <?= e($relatedTitle); ?>
                                                </a>
                                            </h3>
                                        </div>
                                    </article>
                                </div>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <div class="col-sm-12">
                                <p class="text-center">
                                    Cloud computing resources are coming soon.
                                </p>
                            </div>
                        <?php endif; ?>
                    </div>
                </section>
            </main>

            <aside class="col-md-4">

                <div class="service-list-menu">
                    <ul class="service-menu list-unstyled">
                        <li>
                            <a href="Sap-Consulting.php">
                                <i class="fas fa-chart-line"></i>
                                SAP Analytics &amp; Consulting
                            </a>
                        </li>

                        <li>
                            <a href="Full-Stack-Developer.php">
                                <i class="fas fa-code"></i>
                                Full-Stack Web Development
                            </a>
                        </li>

                        <li>
                            <a href="Mobile-Development.php">
                                <i class="fas fa-mobile-alt"></i>
                                Mobile App Development
                            </a>
                        </li>

                        <li>
                            <a class="active" href="Cloud-Solutions.php" aria-current="page">
                                <i class="fas fa-cloud"></i>
                                Cloud Solutions
                            </a>
                        </li>

                        <li>
                            <a href="https://www.arzugil.com/blog/website-speed-optimization">
                                <i class="fas fa-tachometer-alt"></i>
                                Website Speed &amp; SEO
                            </a>
                        </li>

                        <li>
                            <a href="https://www.arzugil.com/blog/full-stack-vs-specialist">
                                <i class="fas fa-headset"></i>
                                Full-Stack Developer vs. Specialist
                            </a>
                        </li>
                    </ul>
                </div>

                <div class="service-brochure">
                    <div class="title-box">
                        <h3 class="widget-title">Free <strong>Cloud Guides</strong></h3>
                    </div>

                    <ul class="brochure-menu list-unstyled">
                        <li>
                            <a href="assets/books/SAA-C02 study guide.pdf">
                                AWS Solutions Architect
                                <i class="fas fa-file-pdf"></i>
                            </a>
                        </li>
                        <li>
                            <a href="assets/books/cybersecurity.pdf">
                                Cloud Cybersecurity
                                <i class="fas fa-file-pdf"></i>
                            </a>
                        </li>
                        <li>
                            <a href="assets/books/LPI.pdf">
                                Linux Essentials
                                <i class="fas fa-file-pdf"></i>
                            </a>
                        </li>
                        <li>
                            <a href="assets/books/pythontricks.pdf">
                                Python Automation
                                <i class="fas fa-file-pdf"></i>
                            </a>
                        </li>
                    </ul>
                </div>

                <div class="service-features">
                    <div class="title-box">
                        <h3 class="widget-title">Why <strong>Work With Me?</strong></h3>
                    </div>

                    <div class="accordion panel-group" id="cloudAccordion">

                        <div class="panel-default accordion-item">
                            <div class="panel-heading highlight">
                                <h2 class="accordion-header" id="cloudHeadingOne">
                                    <button
                                        class="accordion-button"
                                        type="button"
                                        data-bs-toggle="collapse"
                                        data-bs-target="#cloudCollapseOne"
                                        aria-expanded="true"
                                        aria-controls="cloudCollapseOne"
                                    >
                                        Certified Cloud Knowledge
                                    </button>
                                </h2>
                            </div>

                            <div
                                id="cloudCollapseOne"
                                class="accordion-collapse collapse show"
                                aria-labelledby="cloudHeadingOne"
                                data-bs-parent="#cloudAccordion"
                            >
                                <div class="panel-body">
                                    Cloud recommendations are supported by hands-on development experience and
                                    certifications including AWS Certified Solutions Architect – Associate,
                                    AWS Certified Cloud Practitioner, and Microsoft Azure Fundamentals.
                                </div>
                            </div>
                        </div>

                        <div class="panel-default accordion-item">
                            <div class="panel-heading">
                                <h2 class="accordion-header" id="cloudHeadingTwo">
                                    <button
                                        class="accordion-button collapsed"
                                        type="button"
                                        data-bs-toggle="collapse"
                                        data-bs-target="#cloudCollapseTwo"
                                        aria-expanded="false"
                                        aria-controls="cloudCollapseTwo"
                                    >
                                        Full-Stack and Cloud Integration
                                    </button>
                                </h2>
                            </div>

                            <div
                                id="cloudCollapseTwo"
                                class="accordion-collapse collapse"
                                aria-labelledby="cloudHeadingTwo"
                                data-bs-parent="#cloudAccordion"
                            >
                                <div class="panel-body">
                                    Cloud infrastructure must support the application using it. Full-stack experience
                                    makes it possible to review websites, APIs, databases, deployment workflows,
                                    performance, and infrastructure as one connected solution.
                                </div>
                            </div>
                        </div>

                        <div class="panel-default accordion-item">
                            <div class="panel-heading">
                                <h2 class="accordion-header" id="cloudHeadingThree">
                                    <button
                                        class="accordion-button collapsed"
                                        type="button"
                                        data-bs-toggle="collapse"
                                        data-bs-target="#cloudCollapseThree"
                                        aria-expanded="false"
                                        aria-controls="cloudCollapseThree"
                                    >
                                        Security and Reliability First
                                    </button>
                                </h2>
                            </div>

                            <div
                                id="cloudCollapseThree"
                                class="accordion-collapse collapse"
                                aria-labelledby="cloudHeadingThree"
                                data-bs-parent="#cloudAccordion"
                            >
                                <div class="panel-body">
                                    Projects are planned with access control, HTTPS, backups, recovery, monitoring,
                                    logging, software updates, and operational visibility in mind.
                                </div>
                            </div>
                        </div>

                        <div class="panel-default accordion-item">
                            <div class="panel-heading">
                                <h2 class="accordion-header" id="cloudHeadingFour">
                                    <button
                                        class="accordion-button collapsed"
                                        type="button"
                                        data-bs-toggle="collapse"
                                        data-bs-target="#cloudCollapseFour"
                                        aria-expanded="false"
                                        aria-controls="cloudCollapseFour"
                                    >
                                        Business-Focused Cloud Decisions
                                    </button>
                                </h2>
                            </div>

                            <div
                                id="cloudCollapseFour"
                                class="accordion-collapse collapse"
                                aria-labelledby="cloudHeadingFour"
                                data-bs-parent="#cloudAccordion"
                            >
                                <div class="panel-body">
                                    The best cloud architecture is not always the most complicated one. Services are
                                    selected according to business value, risk, performance, growth, maintenance, and
                                    budget.
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="sidebar-cta-box">
                    <h3>Need a Better Cloud Strategy?</h3>
                    <p>
                        Get help with AWS, Azure, migration, hosting, security, backups, or cloud cost optimization.
                    </p>
                    <a href="#serviceQuoteForm" class="btn btn-shutter-out-horizontal">
                        Get a Free Quote
                    </a>
                </div>

                <div id="serviceQuoteForm" class="quoteForm-holder2">
                    <form
                        id="quoteForm"
                        name="free-quote"
                        data-toggle="validator"
                        class="quoteForm"
                        action="quote-process.php"
                        method="POST"
                    >
                        <h3 class="form-title">Get a Free Quote</h3>
                        <div id="msgQuoteSubmit" class="hidden" aria-live="polite"></div>

                        <div class="form-group">
                            <input
                                name="fname"
                                id="quoteName"
                                placeholder="Full Name*"
                                class="form-control"
                                required
                                autocomplete="name"
                                type="text"
                            >
                            <div class="input-group-icon"><i class="fas fa-user"></i></div>
                        </div>

                        <div class="form-group">
                            <input
                                name="email"
                                id="quoteEmail"
                                placeholder="Email Address*"
                                class="form-control"
                                required
                                autocomplete="email"
                                type="email"
                            >
                            <div class="input-group-icon"><i class="fas fa-envelope"></i></div>
                        </div>

                        <div class="form-group">
                            <input
                                name="phone"
                                id="quotePhone"
                                placeholder="Phone Number*"
                                class="form-control"
                                required
                                autocomplete="tel"
                                type="tel"
                            >
                            <div class="input-group-icon"><i class="fas fa-phone"></i></div>
                        </div>

                        <div class="form-group">
                            <select
                                name="service"
                                id="quoteService"
                                class="form-control"
                                required
                            >
                                <option value="">Select a Cloud Service*</option>
                                <option value="AWS Cloud Consulting">AWS Cloud Consulting</option>
                                <option value="Azure Cloud Consulting">Azure Cloud Consulting</option>
                                <option value="Cloud Migration">Cloud Migration</option>
                                <option value="Cloud Hosting and Deployment">Cloud Hosting and Deployment</option>
                                <option value="Cloud Security Review">Cloud Security Review</option>
                                <option value="Cloud Cost Optimization">Cloud Cost Optimization</option>
                                <option value="Backup and Disaster Recovery">Backup and Disaster Recovery</option>
                                <option value="Hybrid or Multi-Cloud">Hybrid or Multi-Cloud</option>
                            </select>
                            <div class="input-group-icon"><i class="fas fa-cloud"></i></div>
                        </div>

                        <div class="form-group">
                            <textarea
                                name="message"
                                id="quoteMessage"
                                class="form-control"
                                rows="5"
                                placeholder="Describe your current environment, goals, and cloud challenges"
                            ></textarea>
                        </div>

                        <div class="form-group bottomMargin0">
                            <button
                                type="submit"
                                id="quoteSubmit"
                                class="btn btn-shutter-out-horizontal"
                            >
                                Send Request
                            </button>
                        </div>

                        <span class="sub-text">* Required fields</span>
                    </form>
                </div>

                <div id="servicePaypalCheckout" class="quoteForm-holder2 mt-4">
                    <h3 class="form-title">Pay Project Deposit</h3>
                    <p class="small">
                        Secure your cloud consultation or project start with PayPal.
                    </p>

                    <div class="form-group">
                        <select id="paypalServiceSelect" class="form-control">
                            <option value="Cloud Consultation Deposit" data-price="100.00">
                                Cloud Consultation - $100
                            </option>
                            <option value="Cloud Assessment and Architecture Review" data-price="500.00">
                                Cloud Assessment - $500
                            </option>
                            <option value="Cloud Migration Project Deposit" data-price="1500.00">
                                Cloud Migration Deposit - $1,500
                            </option>
                            <option value="Cloud Optimization Project Deposit" data-price="1000.00">
                                Cloud Optimization Deposit - $1,000
                            </option>
                        </select>
                    </div>

                    <div class="checkout-summary mb-3">
                        <strong>Total: $<span id="paypalSelectedPrice">100.00</span></strong>
                    </div>

                    <div id="paypal-button-container"></div>
                    <div id="payment-message" class="mt-3" aria-live="polite"></div>
                </div>

            </aside>
        </div>
    </div>
</div>

<section id="comments" class="comment-section container mt-5">
    <div class="comment-box">
        <h3>Leave a Comment</h3>
        <p class="comment-intro">
            Have a question about cloud computing or this service? Leave a comment below.
        </p>

        <form id="commentForm" class="comment-form">
            <input type="hidden" name="page_slug" value="cloud-solutions">

            <div class="form-group">
                <input
                    type="text"
                    name="name"
                    id="commentName"
                    class="form-control"
                    placeholder="Your Name*"
                    required
                >
            </div>

            <div class="form-group">
                <input
                    type="email"
                    name="email"
                    id="commentEmail"
                    class="form-control"
                    placeholder="Your Email (optional)"
                >
            </div>

            <div class="form-group">
                <textarea
                    name="comment"
                    id="commentText"
                    class="form-control"
                    placeholder="Write your comment*"
                    rows="5"
                    required
                ></textarea>
            </div>

            <button type="submit" class="btn btn-shutter-out-horizontal">
                Post Comment
            </button>

            <div id="commentMessage" class="comment-message" aria-live="polite"></div>
        </form>
    </div>

    <div class="recent-comments">
        <h4>Recent Comments</h4>
        <div id="commentsList">Loading comments...</div>
    </div>
</section>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const quoteForm = document.getElementById('quoteForm');
    const quoteMessage = document.getElementById('msgQuoteSubmit');
    const quoteButton = document.getElementById('quoteSubmit');

    if (quoteForm) {
        quoteForm.addEventListener('submit', async function (event) {
            event.preventDefault();

            quoteMessage.classList.remove('hidden');
            quoteMessage.textContent = 'Sending your request...';
            quoteButton.disabled = true;

            try {
                const response = await fetch('quote-process.php', {
                    method: 'POST',
                    body: new FormData(quoteForm)
                });

                const responseText = await response.text();

                if (!response.ok) {
                    throw new Error(responseText || 'The request could not be sent.');
                }

                quoteMessage.innerHTML = responseText;
                quoteForm.reset();
            } catch (error) {
                console.error('Quote form error:', error);
                quoteMessage.textContent =
                    'There was a problem sending your request. Please try again.';
            } finally {
                quoteButton.disabled = false;
            }
        });
    }

    const paypalServiceSelect = document.getElementById('paypalServiceSelect');
    const paypalSelectedPrice = document.getElementById('paypalSelectedPrice');

    function updatePaypalPrice() {
        if (!paypalServiceSelect || !paypalSelectedPrice) return;

        const option = paypalServiceSelect.options[paypalServiceSelect.selectedIndex];
        paypalSelectedPrice.textContent = option.dataset.price || '0.00';
    }

    if (paypalServiceSelect) {
        paypalServiceSelect.addEventListener('change', updatePaypalPrice);
        updatePaypalPrice();
    }

    const commentForm = document.getElementById('commentForm');
    const commentsList = document.getElementById('commentsList');
    const commentMessage = document.getElementById('commentMessage');

    if (!commentForm || !commentsList) return;

    const pageSlug = 'cloud-solutions';

    function escapeHtml(text) {
        const div = document.createElement('div');
        div.textContent = text == null ? '' : String(text);
        return div.innerHTML;
    }

    function formatDate(dateString) {
        const date = new Date(dateString);

        if (Number.isNaN(date.getTime())) {
            return '';
        }

        return date.toLocaleDateString(undefined, {
            year: 'numeric',
            month: 'short',
            day: 'numeric'
        });
    }

    async function loadComments() {
        commentsList.innerHTML = '<p>Loading comments...</p>';

        try {
            const response = await fetch(
                'load-comments.php?page_slug=' + encodeURIComponent(pageSlug)
            );

            const data = await response.json();

            if (!response.ok || !data.success) {
                throw new Error(data.message || 'Could not load comments.');
            }

            if (!Array.isArray(data.comments) || data.comments.length === 0) {
                commentsList.innerHTML =
                    '<p>No comments yet. Be the first to comment.</p>';
                return;
            }

            commentsList.innerHTML = data.comments.map(function (item) {
                return `
                    <div class="comment-card">
                        <div class="comment-header">
                            <strong>${escapeHtml(item.name)}</strong>
                            <span>${escapeHtml(formatDate(item.created_at))}</span>
                        </div>
                        <p>${escapeHtml(item.comment).replace(/\n/g, '<br>')}</p>
                    </div>
                `;
            }).join('');
        } catch (error) {
            console.error('Comment loading error:', error);
            commentsList.innerHTML = '<p>Comments could not be loaded.</p>';
        }
    }

    commentForm.addEventListener('submit', async function (event) {
        event.preventDefault();

        commentMessage.className = 'comment-message info-message';
        commentMessage.textContent = 'Posting your comment...';

        try {
            const response = await fetch('submit-comment.php', {
                method: 'POST',
                body: new FormData(commentForm)
            });

            const data = await response.json();

            if (!response.ok || !data.success) {
                throw new Error(data.message || 'Could not post comment.');
            }

            commentMessage.className = 'comment-message success-message';
            commentMessage.textContent = data.message || 'Comment submitted.';
            commentForm.reset();
            await loadComments();
        } catch (error) {
            commentMessage.className = 'comment-message error-message';
            commentMessage.textContent = error.message;
        }
    });

    loadComments();
});
</script>

<?php include 'footer.php'; ?>
