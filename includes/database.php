<?php

$databaseHost = 'localhost';
$databaseName = 'u249000411_Honeypot';
$databaseUser = 'u249000411_Admin';
$databasePassword = 'Spiderman8085$';

$dsn = sprintf(
    'mysql:host=%s;dbname=%s;charset=utf8mb4',
    $databaseHost,
    $databaseName
);

$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

try {
    $pdo = new PDO(
        $dsn,
        $databaseUser,
        $databasePassword,
        $options
    );
} catch (PDOException $exception) {
    error_log('Database connection failed: ' . $exception->getMessage());

    // Do not expose database credentials or internal details.
    http_response_code(500);
    exit('The website is temporarily unable to load.');
}