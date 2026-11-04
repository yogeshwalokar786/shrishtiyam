<?php
/**
 * Database connection & setup helper for Laravel with XAMPP phpMyAdmin MySQL
 */
$host = '127.0.0.1';
$port = 3306;
$username = 'root';
$password = '';
$database = 'new_db';

header('Content-Type: text/html; charset=utf-8');

echo "<h2>Laravel & phpMyAdmin MySQL Setup</h2>";

try {
    // 1. Connect to MySQL server
    $pdo = new PDO("mysql:host={$host};port={$port}", $username, $password, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_TIMEOUT => 5
    ]);
    echo "<p style='color: green;'>&#10004; Connected to MySQL Server at <strong>{$host}:{$port}</strong> successfully as user <strong>{$username}</strong>.</p>";

    // 2. Create Database if not exists
    $pdo->exec("CREATE DATABASE IF NOT EXISTS `{$database}` CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;");
    echo "<p style='color: green;'>&#10004; Database <strong>`{$database}`</strong> is verified / created successfully.</p>";

    // 3. Connect directly to new_db
    $dbPdo = new PDO("mysql:host={$host};port={$port};dbname={$database}", $username, $password, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    ]);
    echo "<p style='color: green;'>&#10004; Successfully connected to database <strong>`{$database}`</strong>.</p>";

    echo "<hr>";
    echo "<h3>Laravel .env settings to use:</h3>";
    echo "<pre style='background: #f4f4f4; padding: 15px; border-radius: 6px; font-family: monospace;'>";
    echo "DB_CONNECTION=mysql\n";
    echo "DB_HOST=127.0.0.1\n";
    echo "DB_PORT=3306\n";
    echo "DB_DATABASE={$database}\n";
    echo "DB_USERNAME={$username}\n";
    echo "DB_PASSWORD={$password}\n";
    echo "</pre>";

    echo "<p>You can also view this database in phpMyAdmin at: <a href='http://localhost/phpmyadmin' target='_blank'>http://localhost/phpmyadmin</a></p>";

} catch (PDOException $e) {
    echo "<p style='color: red;'>&#10008; Database connection failed: " . htmlspecialchars($e->getMessage()) . "</p>";
    echo "<p><strong>Troubleshooting:</strong></p>";
    echo "<ul>";
    echo "<li>Open <strong>XAMPP Control Panel</strong> and make sure the <strong>MySQL</strong> module is running (Status: Green).</li>";
    echo "<li>Check if your MySQL port is 3306.</li>";
    echo "<li>If you set a password for the root user, update DB_PASSWORD in your .env file.</li>";
    echo "</ul>";
}
