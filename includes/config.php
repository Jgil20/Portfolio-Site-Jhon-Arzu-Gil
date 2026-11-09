<?php
/**
 * Main configuration file for arzugil.com
 * Keep this file private.
 * Do not upload this file to GitHub.
 */

/* ============================
   SITE SETTINGS
============================ */

define('SITE_NAME', 'Jhon Arzu-Gil Portfolio');
define('SITE_URL', 'https://www.arzugil.com');
define('ADMIN_EMAIL', 'Jgil20@me.com');
define('FROM_EMAIL', 'noreply@arzugil.com');


/* ============================
   DATABASE SETTINGS
============================ */

define('DB_HOST', 'localhost');
define('DB_NAME', 'u249000411_Honeypot');
define('DB_USER', 'u249000411_Admin');
define('DB_PASS', 'Spiderman8085$');
define('DB_CHARSET', 'utf8mb4');


/* ============================
   PAYPAL SETTINGS
============================ */

/**
 * Keep sandbox while testing.
 * Change to live only after sandbox payments work.
 */
// define('PAYPAL_MODE', 'sandbox');
 define('PAYPAL_MODE', 'live');

/**
 * Use your PayPal REST App Client ID.
 * The Client ID can appear in the PayPal JavaScript SDK script.
 */
define('PAYPAL_CLIENT_ID', 'AYoTqqR5IeG21TPilb8pVWQMIc3JG4SHg1eeNGfb5V9wEzbiinotTr3YbhPgsSeEkSxj0L_TOv6JNwnQ');

/**
 * Never expose this in JavaScript.
 * Only PHP backend files should use this.
 */
define('PAYPAL_CLIENT_SECRET', 'EFSGwetEk8NNUxVLzMH0Yl4iM5cei_9VrOtsiKP5HFF9viT_yhHQiyhryNsNDW1gPROZnkoH9B5oiBJK');

define('PAYPAL_CURRENCY', 'USD');

if (PAYPAL_MODE === 'live') {
    define('PAYPAL_BASE_URL', 'https://api-m.paypal.com');
} else {
    define('PAYPAL_BASE_URL', 'https://api-m.sandbox.paypal.com');
}


/* ============================
   GEMINI SETTINGS
============================ */

define('GEMINI_API_KEY', 'AQ.Ab8RN6KNrCssf7GnPQiHRgq1qhVpo743oyuFeh_MPiWB5dzKXA');
define('GEMINI_MODEL', 'gemini-2.5-flash');


/* ============================
   SECURITY / DEBUG
============================ */

define('APP_DEBUG', true);

if (APP_DEBUG) {
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
} else {
    error_reporting(0);
    ini_set('display_errors', 0);
}


/* ============================
   DATABASE CONNECTION
============================ */




try {
    $pdo = new PDO(
        'mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=utf8mb4',
        DB_USER,
        DB_PASS,
        [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES => false
        ]
    );
} catch (PDOException $e) {
    exit('Database connection failed.');
}

/* ============================
   HELPER FUNCTION
============================ */

function e($value) {
    return htmlspecialchars((string) $value, ENT_QUOTES, 'UTF-8');
}



?>