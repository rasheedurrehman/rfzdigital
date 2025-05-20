<?php
// Load configuration (loads sensitive credentials like DB name, user, password)
require_once 'config.php';

try {
    // DSN (Data Source Name): Contains the database type, host, and database name
    $dsn = "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=utf8mb4";

    // PDO options for error handling, fetch mode, and performance
    $options = [
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION, // Throws exceptions on errors
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,      // Fetch results as associative arrays
        PDO::ATTR_EMULATE_PREPARES   => false,                 // Use native prepared statements
    ];

    // Create a PDO instance (establishes a connection to the database)
    $pdo = new PDO($dsn, DB_USER, DB_PASS, $options);

} catch (PDOException $e) {
    // Log the error securely (not visible to the user)
    error_log("Database Connection Error: " . $e->getMessage(), 0);

    // Display a JavaScript alert for the user
    echo '<script>alert("Database Connection Failed.");</script>';

    // Optionally stop further execution
    exit();
}
?>
