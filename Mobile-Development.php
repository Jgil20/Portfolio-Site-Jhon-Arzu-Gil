<?php
require_once __DIR__ . '/includes/config.php';

$pageTitle = 'Mobile App Developer | Android & iOS Development';
$pageDescription = 'Hire Jhon Arzu-Gil for custom Android, iOS, and cross-platform mobile app development, API integration, cloud backends, deployment, and ongoing support.';
$pageKeywords = 'mobile app developer, Android developer, iOS developer, mobile application development, cross-platform apps, Houston mobile developer, API integration';

$canonicalUrl = 'https://www.arzugil.com/mobile-development.php';
$shareTitle = 'Mobile App Development Services by Jhon Arzu-Gil';

if (!function_exists('e')) {
    function e($value): string
    {
        return htmlspecialchars((string) $value, ENT_QUOTES, 'UTF-8');
    }
}

if (!function_exists('mobileBlogImage')) {
    function mobileBlogImage($path): string
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
| Dynamic related blog posts
|--------------------------------------------------------------------------
| Uses the blog_posts schema:
| id, slug, title, date, category, tags, image, excerpt, status.
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
                    CASE WHEN LOWER(category) LIKE '%mobile%' THEN 100 ELSE 0 END
                    + CASE WHEN LOWER(category) LIKE '%android%' THEN 90 ELSE 0 END
                    + CASE WHEN LOWER(category) LIKE '%ios%' THEN 90 ELSE 0 END
                    + CASE WHEN LOWER(tags) LIKE '%mobile%' THEN 70 ELSE 0 END
                    + CASE WHEN LOWER(tags) LIKE '%android%' THEN 60 ELSE 0 END
                    + CASE WHEN LOWER(tags) LIKE '%ios%' THEN 60 ELSE 0 END
                    + CASE WHEN LOWER(title) LIKE '%mobile%' THEN 60 ELSE 0 END
                    + CASE WHEN LOWER(title) LIKE '%android%' THEN 50 ELSE 0 END
                    + CASE WHEN LOWER(title) LIKE '%ios%' THEN 50 ELSE 0 END
                    + CASE WHEN LOWER(title) LIKE '%app%' THEN 30 ELSE 0 END
                    + CASE WHEN LOWER(title) LIKE '%cloud%' THEN 20 ELSE 0 END
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
        error_log('Mobile development related-post query failed: ' . $exception->getMessage());
    }
}
?>

<?php include 'header.php'; ?>

<script type="application/ld+json">
<?= json_encode([
    '@context' => 'https://schema.org',
    '@type' => 'Service',
    'name' => 'Mobile App Development Services',
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
        'Android App Development',
        'iOS App Development',
        'Cross-Platform Mobile Development',
        'Mobile API Integration',
        'App Store Deployment'
    ]
], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT); ?>
</script>

<section id="single-page-banner" class="page-title page-title-image service-hbg">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h1>Mobile App Development</h1>
            </div>

            <div class="col-md-6">
                <ul class="breadcrumb">
                    <li><a href="/">Home</a></li>
                    <li><a href="services.php">Services</a></li>
                    <li class="active">Mobile App Development</li>
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
                            src="images/profile/mobileappdev.webp"
                            alt="Mobile app developer building Android and iOS applications"
                            width="1200"
                            height="800"
                            decoding="async"
                        >
                    </div>

                    <div class="title-box">
                        <h2 class="widget-title">
                            Hire Jhon Arzu-Gil <strong>Mobile App Developer</strong>
                        </h2>
                    </div>

                    <div class="service-content">
                        <p>
                            Turn your business idea into a fast, secure, and user-friendly mobile application.
                            Jhon Arzu-Gil develops custom <strong>Android, iOS, and cross-platform mobile apps</strong>
                            for businesses, startups, entrepreneurs, and organizations that need reliable digital
                            products built around real business goals.
                        </p>

                        <p>
                            Mobile development involves more than creating screens. A successful app needs clear
                            navigation, responsive layouts, secure authentication, dependable APIs, cloud-connected
                            data, analytics, testing, and a deployment plan. Each project is designed to deliver a
                            smooth user experience while remaining maintainable and ready for future growth.
                        </p>

                        <div class="row clearfix">
                            <div class="col-sm-6 col-xs-12">
                                <img
                                    src="images/profile/mobile.webp"
                                    alt="Android iOS and cross-platform mobile app development services"
                                    width="700"
                                    height="400"
                                    loading="lazy"
                                    decoding="async"
                                >
                            </div>

                            <div class="service-list col-sm-6 col-xs-12">
                                <ul class="list-unstyled">
                                    <li>Native Android App Development</li>
                                    <li>Native iOS App Development</li>
                                    <li>Cross-Platform Mobile Applications</li>
                                    <li>Responsive Mobile UI and UX</li>
                                    <li>REST API and Database Integration</li>
                                    <li>Cloud Backend Integration</li>
                                    <li>Push Notifications and Analytics</li>
                                    <li>Authentication and Secure Data Access</li>
                                    <li>Google Play and App Store Deployment</li>
                                    <li>App Maintenance and Feature Updates</li>
                                </ul>
                            </div>
                        </div>

                        <h3>Android App Development</h3>
                        <p>
                            Build Android applications that work across modern phones and tablets. Services can
                            include Java or Kotlin development, Android SDK integration, Material Design interfaces,
                            RESTful API connections, local storage, push notifications, user authentication, testing,
                            debugging, and Google Play Console deployment.
                        </p>

                        <h3>iOS App Development</h3>
                        <p>
                            Create polished iPhone and iPad experiences designed for Apple devices. iOS projects can
                            include Swift-based development, secure API integration, responsive layouts, app
                            configuration, TestFlight distribution, App Store Connect setup, privacy disclosures,
                            submission support, and post-launch improvements.
                        </p>

                        <h3>Cross-Platform and WebView Applications</h3>
                        <p>
                            Businesses that already have a strong responsive website may benefit from a
                            cross-platform or WebView-based app. This approach can shorten development time while
                            adding mobile features such as splash screens, offline handling, external-link support,
                            notifications, deep links, file uploads, and app-store distribution.
                        </p>

                        <h3>Mobile App Features</h3>
                        <div class="row">
                            <div class="col-sm-6">
                                <ul>
                                    <li>User registration and secure login</li>
                                    <li>Customer profiles and account management</li>
                                    <li>Appointment and service booking</li>
                                    <li>Payment and subscription integration</li>
                                    <li>Maps, location, and directions</li>
                                    <li>Camera and file-upload support</li>
                                </ul>
                            </div>

                            <div class="col-sm-6">
                                <ul>
                                    <li>Push notifications</li>
                                    <li>Admin dashboards</li>
                                    <li>Cloud-hosted databases</li>
                                    <li>Analytics and event tracking</li>
                                    <li>Offline caching</li>
                                    <li>Customer support and chatbot features</li>
                                </ul>
                            </div>
                        </div>

                        <h3>Technology and Development Skills</h3>
                        <ul class="list-unstyled">
                            <li><strong>Android:</strong> Java, Kotlin, Android SDK, Android Studio, Material Design</li>
                            <li><strong>iOS:</strong> Swift, Xcode, UIKit, App Store Connect, TestFlight</li>
                            <li><strong>Web and Cross-Platform:</strong> HTML, CSS, JavaScript, PHP, responsive WebView apps</li>
                            <li><strong>Back End:</strong> PHP, Node.js, Java, REST APIs, JSON, authentication</li>
                            <li><strong>Databases:</strong> MySQL, SQL, MongoDB, cloud-hosted data services</li>
                            <li><strong>Cloud:</strong> AWS, Azure, IBM Cloud, Google Cloud, scalable application hosting</li>
                            <li><strong>Delivery:</strong> Git, GitHub, debugging, testing, release management, app-store submission</li>
                        </ul>

                        <h3>Mobile App Development Process</h3>
                        <ol>
                            <li>
                                <strong>Discovery:</strong> Define the audience, business goal, required features,
                                supported devices, budget, and launch priorities.
                            </li>
                            <li>
                                <strong>Planning:</strong> Organize screens, navigation, data flows, APIs, security,
                                deployment requirements, and development milestones.
                            </li>
                            <li>
                                <strong>Design and Development:</strong> Build the interface, application logic,
                                integrations, database connections, and mobile-specific functionality.
                            </li>
                            <li>
                                <strong>Testing:</strong> Test layouts, forms, authentication, links, APIs, performance,
                                permissions, and behavior on multiple screen sizes.
                            </li>
                            <li>
                                <strong>Deployment:</strong> Prepare store listings, screenshots, privacy information,
                                release builds, and submission packages.
                            </li>
                            <li>
                                <strong>Support:</strong> Monitor the application, resolve issues, improve performance,
                                and add features as the business grows.
                            </li>
                        </ol>

                        <h3>Why Invest in a Custom Mobile App?</h3>
                        <p>
                            A custom mobile application can strengthen customer engagement, make services easier to
                            access, improve communication, simplify recurring tasks, and keep your brand visible on
                            customers' devices. The right solution can also connect with your existing website,
                            database, payment system, CRM, analytics tools, and cloud infrastructure.
                        </p>

                        <div class="service-cta-box">
                            <h3>Ready to Build Your Mobile App?</h3>
                            <p>
                                Request a consultation for an Android, iOS, cross-platform, or business WebView
                                application designed around your audience and goals.
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
                                <a href="full-stack-developer.php">
                                    <i class="fas fa-angle-double-left"></i>
                                    Full-Stack Development
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

                <section id="related-blog" class="blog" aria-labelledby="mobile-resources-title">
                    <div class="title-box">
                        <h3 id="mobile-resources-title">
                            Mobile Development <strong>Resources</strong>
                        </h3>
                    </div>

                    <div class="row">
                        <?php if ($relatedPosts): ?>
                            <?php foreach ($relatedPosts as $relatedPost): ?>
                                <?php
                                $relatedTitle = trim($relatedPost['title'] ?? 'Mobile Development Resource');
                                $relatedSlug = trim($relatedPost['slug'] ?? '');
                                $relatedUrl = '/blog/' . rawurlencode($relatedSlug);
                                $relatedImage = mobileBlogImage($relatedPost['image'] ?? '');
                                $relatedCategory = trim($relatedPost['category'] ?? 'Mobile Development');
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
                                    Mobile development resources are coming soon.
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
                            <a class="active" href="Mobile-Development.php" aria-current="page">
                                <i class="fas fa-mobile-alt"></i>
                                Mobile App Development
                            </a>
                        </li>

                        <li>
                            <a href="Cloud-Solutions.php">
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
                            <a href="https://www.arzugil.com/blog/seo-best-practices-2026">
                                <i class="fas fa-headset"></i>
                                SEO Best Practices for 2026
                            </a>
                        </li>
                    </ul>
                </div>

                <div class="service-brochure">
                    <div class="title-box">
                        <h3 class="widget-title">Free <strong>Developer Guides</strong></h3>
                    </div>

                    <ul class="brochure-menu list-unstyled">
                        <li>
                            <a href="assets/books/Cracking the Coding Interview.pdf">
                                Coding Interview Guide
                                <i class="fas fa-file-pdf"></i>
                            </a>
                        </li>
                        <li>
                            <a href="assets/books/cybersecurity.pdf">
                                Cybersecurity
                                <i class="fas fa-file-pdf"></i>
                            </a>
                        </li>
                        <li>
                            <a href="assets/books/pythontricks.pdf">
                                Python Tricks
                                <i class="fas fa-file-pdf"></i>
                            </a>
                        </li>
                        <li>
                            <a href="assets/books/SAA-C02 study guide.pdf">
                                AWS Solutions Architect
                                <i class="fas fa-file-pdf"></i>
                            </a>
                        </li>
                    </ul>
                </div>

                <div class="service-features">
                    <div class="title-box">
                        <h3 class="widget-title">Why <strong>Work With Me?</strong></h3>
                    </div>

                    <div class="accordion panel-group" id="mobileAccordion">

                        <div class="panel-default accordion-item">
                            <div class="panel-heading highlight">
                                <h2 class="accordion-header" id="mobileHeadingOne">
                                    <button
                                        class="accordion-button"
                                        type="button"
                                        data-bs-toggle="collapse"
                                        data-bs-target="#mobileCollapseOne"
                                        aria-expanded="true"
                                        aria-controls="mobileCollapseOne"
                                    >
                                        Business-Focused App Development
                                    </button>
                                </h2>
                            </div>

                            <div
                                id="mobileCollapseOne"
                                class="accordion-collapse collapse show"
                                aria-labelledby="mobileHeadingOne"
                                data-bs-parent="#mobileAccordion"
                            >
                                <div class="panel-body">
                                    Every feature should support a clear user or business goal. The app is planned
                                    around the audience, customer journey, services, operations, and measurable
                                    outcomes rather than technology alone.
                                </div>
                            </div>
                        </div>

                        <div class="panel-default accordion-item">
                            <div class="panel-heading">
                                <h2 class="accordion-header" id="mobileHeadingTwo">
                                    <button
                                        class="accordion-button collapsed"
                                        type="button"
                                        data-bs-toggle="collapse"
                                        data-bs-target="#mobileCollapseTwo"
                                        aria-expanded="false"
                                        aria-controls="mobileCollapseTwo"
                                    >
                                        Mobile, Web, Cloud, and API Skills
                                    </button>
                                </h2>
                            </div>

                            <div
                                id="mobileCollapseTwo"
                                class="accordion-collapse collapse"
                                aria-labelledby="mobileHeadingTwo"
                                data-bs-parent="#mobileAccordion"
                            >
                                <div class="panel-body">
                                    Mobile applications often depend on websites, APIs, databases, authentication,
                                    analytics, and cloud services. Full-stack and cloud experience makes it possible
                                    to support the complete solution instead of only the app interface.
                                </div>
                            </div>
                        </div>

                        <div class="panel-default accordion-item">
                            <div class="panel-heading">
                                <h2 class="accordion-header" id="mobileHeadingThree">
                                    <button
                                        class="accordion-button collapsed"
                                        type="button"
                                        data-bs-toggle="collapse"
                                        data-bs-target="#mobileCollapseThree"
                                        aria-expanded="false"
                                        aria-controls="mobileCollapseThree"
                                    >
                                        App Store Deployment Support
                                    </button>
                                </h2>
                            </div>

                            <div
                                id="mobileCollapseThree"
                                class="accordion-collapse collapse"
                                aria-labelledby="mobileHeadingThree"
                                data-bs-parent="#mobileAccordion"
                            >
                                <div class="panel-body">
                                    Support can include release builds, application identifiers, store listings,
                                    screenshots, privacy details, TestFlight or internal testing, submission, and
                                    updates required during the review process.
                                </div>
                            </div>
                        </div>

                        <div class="panel-default accordion-item">
                            <div class="panel-heading">
                                <h2 class="accordion-header" id="mobileHeadingFour">
                                    <button
                                        class="accordion-button collapsed"
                                        type="button"
                                        data-bs-toggle="collapse"
                                        data-bs-target="#mobileCollapseFour"
                                        aria-expanded="false"
                                        aria-controls="mobileCollapseFour"
                                    >
                                        Long-Term Maintenance
                                    </button>
                                </h2>
                            </div>

                            <div
                                id="mobileCollapseFour"
                                class="accordion-collapse collapse"
                                aria-labelledby="mobileHeadingFour"
                                data-bs-parent="#mobileAccordion"
                            >
                                <div class="panel-body">
                                    Mobile operating systems, devices, APIs, and app-store requirements change over
                                    time. Maintenance can include compatibility updates, bug fixes, monitoring,
                                    security improvements, and new features.
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="sidebar-cta-box">
                    <h3>Have a Mobile App Idea?</h3>
                    <p>
                        Get help planning, building, testing, and launching an Android, iOS, or cross-platform app.
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
                            <div class="help-block with-errors"></div>
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
                            <div class="help-block with-errors"></div>
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
                            <div class="help-block with-errors"></div>
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
                            <div class="help-block with-errors"></div>
                            <select
                                name="service"
                                id="quoteService"
                                class="form-control"
                                required
                            >
                                <option value="">Select a Service*</option>
                                <option value="Android App Development">Android App Development</option>
                                <option value="iOS App Development">iOS App Development</option>
                                <option value="Cross-Platform App Development">Cross-Platform App</option>
                                <option value="Mobile WebView App">Mobile WebView App</option>
                                <option value="Mobile App Maintenance">App Maintenance</option>
                                <option value="App Store Deployment">App Store Deployment</option>
                            </select>
                            <div class="input-group-icon"><i class="fas fa-cogs"></i></div>
                        </div>

                        <div class="form-group">
                            <textarea
                                name="message"
                                id="quoteMessage"
                                class="form-control"
                                rows="5"
                                placeholder="Describe your app idea, users, and required features"
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
                        Secure your mobile app consultation or project start with PayPal.
                    </p>

                    <div class="form-group">
                        <select id="paypalServiceSelect" class="form-control">
                            <option value="Mobile App Consultation Deposit" data-price="100.00">
                                Mobile App Consultation - $100
                            </option>
                            <option value="Mobile App Discovery and Planning" data-price="500.00">
                                App Discovery and Planning - $500
                            </option>
                            <option value="Mobile App Project Deposit" data-price="1500.00">
                                Mobile App Project Deposit - $1,500
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
            Have a question about mobile application development? Leave a comment below.
        </p>

        <form id="commentForm" class="comment-form">
            <input type="hidden" name="page_slug" value="mobile-development">

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

    const pageSlug = 'mobile-development';

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
